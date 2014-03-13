<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    if(isset($_POST['id']) && isset($_POST['venue']))
    {
        $event = Event::find_by_id($_POST['id']);
        $event->venue=$_POST['venue'];
        $event->save();
        LogReadable::log_action("Event {$event->name} venue updated to {$event->venue}");
        gcm::send_event_venue($event);
        echo 1;
    }
?>