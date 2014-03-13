<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $workshops=Workshop::find_all();
    if(is_array($workshops))
        foreach($workshops as $workshop)
        {
            $resultObj['id']=$workshop->id;
            $resultObj['venue']=$workshop->venue;
            $resultArr[]=$resultObj;
        }
    echo give_json($resultArr);
?>