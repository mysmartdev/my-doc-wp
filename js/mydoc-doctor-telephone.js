/**
* Render the doctor's phone number
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
     var $phone = $data["data"]["telefon"];
     $(".mydoc-doctor-telephone").text($phone);
   }
 });
});
