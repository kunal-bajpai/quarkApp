<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $events=Event::find_all();
    if(is_array($events))
        foreach($events as $event)
        {
            $resultObj['id']=$event->id;
            $resultObj['venue']=$event->venue;
            $resultArr[]=$resultObj;
        }
    echo give_json($resultArr);
?>