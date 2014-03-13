<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $events=Event::find_all();
    if(is_array($events))
        foreach($events as $event)
            unset($event->fields);
    echo give_json($events);
?>