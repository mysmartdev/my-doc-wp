/**
 * Creates a table from the my-doc api, with all local opening times inside.
 
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
      var $ot = $data["data"]["DoctorOffices"][0];
      var $ot2 = $data["data"]["DoctorOffices"][1];
      var $bt = $data["data"]['EmergencyServices'];
      var $az = $data["data"]["AbsencePeriods"];

      if($ot2 == undefined)
        $(".mydoc-opening-times-local").append('<tr><td>Keine Zeiten hinterlegt</td></tr>');
      else
      {
        $.each($ot2['OpeningTimes'], function($key, $value)
        {
          if($value["type"] != $prev_dow)
          {
            var $dow = $weekday[$value["type"].toLowerCase()];
            var $tablerow = "<td><h4>" + $dow + "</h4><div>";
            $.each($ot2["OpeningTimes"], function($key2, $value2)
            {
              if($value["type"] == $value2["type"])
              {
                var $from = moment($value2["from"], "HH:mm:ss", "de").format("HH:mm", "de") || "";
                var $to = moment($value2["to"], "HH:mm:ss", "de").format("HH:mm", "de") || "";
                $tablerow += "<div><span class='test'>" + $from + "</span><span > &ndash; </span><span >" + $to + "</span></div>";
              }
            });

            if($value["comment"])
              $tablerow += "<p class='comment'>" + $value["comment"] + "</p></div></td>";

            var $tr = $($tablerow);
            $(".mydoc-opening-times-local").append($tr);
            $prev_dow = $value["type"];
          };;
        });
        if($ot2.name)
          $(".mydoc-opening-times-local").append($('<caption></caption>').text($ot2.name));
      }
    }
  });
});
