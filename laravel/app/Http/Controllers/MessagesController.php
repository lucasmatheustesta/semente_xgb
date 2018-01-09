<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mail;

class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();
        // todas as mensagens do usuário (enviadas e recebidas)
        //$threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // mensagens não visualizadas do usuário
        $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();

        $type       = $this->getTypeUser();
        return view('messenger.index', compact('threads', 'currentUserId', 'type'));
    }

    public function sends()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        $type       = $this->getTypeUser();
        return view('messenger.index', compact('threads', 'currentUserId', 'type'));
    }

    public function lixeira()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        //$threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        //$threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        $threads = Thread::forUserWithNewMessages($currentUserId)->withTrashed()->latest('updated_at')->get();
        $type       = $this->getTypeUser();
        return view('messenger.index', compact('threads', 'currentUserId', 'type'));
    }

    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        $type       = $this->getTypeUser();
        return view('messenger.show', compact('thread', 'users', 'type'));
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        
        $type       = $this->getTypeUser();

        if ($type == 'Admin') {
            $users = User::where('id', '!=', Auth::id())->get();
        }
        else{
            $users = User::where('id', '=', 1)->get()->first();
        }

        return view('messenger.create', compact('users', 'type'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();

        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }
        return redirect('messages');
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect('messages/' . $id);
    }

    public function getQtdeNews(Thread $thread)
    {
        $qtde = Thread::join('participants', 'threads.id', '=', 'participants.thread_id')
        ->where('user_id', Auth::id())
        ->where('last_read','=', null)->count();

        if ($qtde > 0) {
            return response()->json(['success' => true, 'data' => $qtde]);
        }
            
        return response()->json(['success' => false]);
    }

    public function deletar($id)
    {
        $registro = Participant::where('user_id', Auth::user()->id)->where('thread_id', $id)->get()->first();
        $registro->delete($id);
        
        return response()->json(['success' => true, 'message' => 'Mensagem excluída com sucesso!']);
    }
}