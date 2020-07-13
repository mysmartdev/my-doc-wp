/**
 * Creates a table from the my-doc api, with all absence times inside.
 
 * @author Dominique Börner (dominiqueboerner@outlook.de)
 */
//<!--
jQuery(document).ready(function( $ )
{
  $.getJSON("https://my-doc.net/?module=mydoc&sektion=show_doctor&uuid=" + my_doc_config.api_key + "&return=json", function($data)
  {
    if($data["success"])
    {
      var $prev_dow = "";
      var $weekday = {"monday": "Montag", "tuesday": "Dienstag", "wednesday": "Mittwoch", "thursday": "Donnerstag", "friday": "Freitag"};
      var $bt = $data["data"]['EmergencyServices'];
      var $az = $data["data"]["AbsencePeriods"];

      $.each($bt, function($key, $value)
      {
        if($value["type"] != $prev_dow)
        {
          var $dow = $weekday[$value["type"].toLowerCase()];
          var $tablerow = "<td><h4>" + $dow + "</h4><div>";
          $.each($bt, function($key2, $value2)
          {
            if($value["type"] == $value2["type"])
            {

              $tablerow += "<div ><span >von " + Date.create($value2["from"], "de").format("{dd}.{MM}.{yyyy} {HH}:{mm}", "de") + "</span><span > bis </span><span >" + Date.create($value2["to"], "de").format("{dd}.{MM}.{yyyy} {HH}:{mm}", "de") + "</span><p >" + $value2["comment"] + "</p></div>";


            }
          });
          $tablerow += "</div></td>";
          var $tr = $($tablerow);
          $(".lb-table").append($tr);
          $prev_dow = $value["type"];
        };
      });
      if(!$bt.length)
        $(".lb-table").append('<tr><td>Keine Zeiten hinterlegt</td></tr>');

      $.each($az, function($key, $value)
      {
        var $tablerow = "<tr><td><div>" + Date.create($value["from"], "de").format("{dd}.{MM}.{yyyy}", "de") + "&ndash;" + Date.create($value["to"], "de").format("{dd}.{MM}.{yyyy}", "de");
        if($value['id_doctor_substitute'])
        {
          $tablerow += "<div>Vertretung:" + $value['SubstituteDoctor']['full_name'] + "</div>";
        }
        $tablerow += "</div></td></tr>";
        var $tr = $($tablerow);
        $(".mydoc-opening-times-absence").append($tr);
      });
      if(!$az.length)
        $(".mydoc-opening-times-absence").append('<tr><td>Keine Zeiten hinterlegt</td></tr>');
    }
  });
});
