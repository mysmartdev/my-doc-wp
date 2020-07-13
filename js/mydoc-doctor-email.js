/**
* Render the doctor's email
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
     var $email = $data["data"]["email"];
     $(".mydoc-doctor-email").text($email);
   }
 });
});
