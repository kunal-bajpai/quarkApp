<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $updates=Update::find_valid();
    if(is_array($updates))
        foreach($updates as $update)
            unset($update->fields);
    echo give_json($updates);
?>