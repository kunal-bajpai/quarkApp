<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    if(isset($_POST['id']) && isset($_POST['venue']))
    {
        $workshop = Workshop::find_by_id($_POST['id']);
        $workshop->venue=$_POST['venue'];
        $workshop->save();
        LogReadable::log_action("Workshop {$workshop->name} venue updated to {$workshop->venue}");
        gcm::send_workshop_venue($workshop);
        echo 1;
    }
?>