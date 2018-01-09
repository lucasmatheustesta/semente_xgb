jQuery(document).ready(function ($) {
  jQuery("#filer_input").filer({
      limit: 1,
      showThumbs: true,
      addMore: false,
      extensions: ["pdf"],
      allowDuplicates: true,
      captions: {
            button: "Selecione um Contrato",
            feedback: "Selecione um arquivo para upload",
            feedback2: "arquivos",
            removeConfirmation: "Tem certeza que deseja apagar este arquivo?",
            errors: {
                filesLimit: "Somente {{fi-limit}} arquivos são permitidos de serem enviados.",
                filesType: "Somente pdf's são permitidos de serem enviados.",
                filesSize: "{{fi-name}} é muito grande! Faça o upload de arquivos de até {{fi-fileMaxSize}} MB.",
                filesSizeAll: "O arquivos que vosê escolheu é muito grande! Selecione arquivos de até {{fi-maxSize}} MB.",
                folderUpload: "Você não tem permissão para fazer upload de pastas."
            }
        },
        uploadFile: {
          url: "components/com_ead/assets/libs/form_upload.php",
          data: null,
          type: "POST",
          enctype: "multipart/form-data",
          synchron: true,
          success: function(data, itemEl, listEl, boxEl, newInputEl, inputEl, id){
          jQuery("#input_contrato").val(data);
          alert("Contrato enviado com sucesso");
        },
        statusCode: null,
        onProgress: null,
        onComplete: null,
        onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
          jQuery("#input_contrato").val();
            jQuery.post("components/com_ead/assets/libs/ajax_remove_file.php", {file: file.name});
        }
      }
    });
})