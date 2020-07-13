/**
* Render the doctor's title.
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
     var $title = $data["data"]["title"];
     $(".mydoc-doctor-title").text($title);
   }
 });
});
