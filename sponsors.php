<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/mobappclub/quark/includes/init.php');
    $sponsors=Sponsor::find_all();
    foreach($sponsors as $sponsor)
        $sponsor->image=IMAGES.$sponsor->image;
    echo give_json($sponsors);
?>