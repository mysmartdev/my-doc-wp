/**
* Renders the uploaded files from the doctors office.
*
* @author Dominique Börner (dominiqueboerner@outlook.de)
*/
//<!--
jQuery(document).ready(function( $ )
{
 $.getJSON("https://my-doc.net/?module=mydoc&sektion=show_doctor&uuid=" + my_doc_config.api_key + "&return=json", function($data)
 {
   if($data["success"])
   {
     var $files = $data['data']['File'];

     if ($files === undefined) {
       $('.mydoc-doctor-office-files').append(`<h5>Keine Formulare hinterlegt.</h5>`);
     } else {
       $.each($files, function($key, $file)
       {
         $('.mydoc-doctor-office-files').append(`<h5>${$file.name}</h5>`);
         $('.mydoc-doctor-office-files').append(`<a href="${$file._url}">${$file.filename}</p>`);
       });
     }
   };
 });
});
