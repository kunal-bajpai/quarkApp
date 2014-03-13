<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    if($_POST['for_ev_ws']==0)
        echo "";
    if($_POST['for_ev_ws']==1)
        $result=Event::find_all();
    if($_POST['for_ev_ws']==2)
        $result=Workshop::find_all();
    if(isset($result))
        foreach($result as $item)
            echo "<option value='{$item->id}'>{$item->name}</option>";
?>