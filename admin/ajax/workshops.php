<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $workshops=Workshop::find_all();
    if(is_array($workshops))
        foreach($workshops as $workshop)
            unset($workshop->fields);
    echo give_json($workshops);
?>