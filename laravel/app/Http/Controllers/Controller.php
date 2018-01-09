<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Clinica;

//Auth::loginUsingId(1);

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getMonth($m)
    {
        switch($m){
            case "Jan": $month = "Janeiro"; break;
            case "Feb": $month = "Fevereiro"; break;
            case "Mar": $month = "Março"; break;
            case "Apr": $month = "Abril"; break;
            case "May": $month = "Maio"; break;
            case "Jun": $month = "Junho"; break;
            case "Jul": $month = "Julho"; break;
            case "Aug": $month = "Agosto"; break;
            case "Sep": $month = "Setembro"; break;
            case "Oct": $month = "Outubro"; break;
            case "Nov": $month = "Novembro"; break;
            case "Dec": $month = "Dezembro"; break;
            default: $month = "Unknown"; break;
        }

        return $month;
    }

    public function saveFile($data, $name, $path = 'tmp/', $uid = true) {

        // Add trailing slash if omitted
        if (substr($path, -1) !== '/') {
            $path .= '/';
        }
        
        // Test if directory already exists
        if(!is_dir($path)){
            mkdir($path, 0755);
        }

        // Let's put a unique id in front of the filename so we don't accidentally overwrite older files
        if ($uid) {
            $name = uniqid() . '_' . $name;
        }

        $path = $path . $name;

        // store the file
        $this->save($data, $path);

        // return the files new name and location
        return array(
            'name' => $name,
            'path' => $path
        );
    }

    public function save($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb"); 

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1])); 
        fclose($ifp); 

        return $output_file; 
    }

    public function getTypeUser()
    {
        if (User::hasAdmin()) {
            $type = "Admin";
        }
        elseif(User::hasClinica()){
            $type = "Clínica";
            $registro = Clinica::where('user_id', Auth::user()->id)->get()->first();
            if ($registro->accepted == 0) {
                return view('dashboard.index', compact('registro', 'type'));
            }
        }
        else{
            $type = "Consultor";
        }

        return $type;
    }
}
