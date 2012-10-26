<?php

function ago($time)
{
   $periods = array("seconde", "minute", "heure", "jour", "semaine", "mois", "année", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1 && $periods[$j]!='mois') {
       $periods[$j].= "s";
   }

   return "Il y a $difference $periods[$j]";
}