<?php
/*
POST : reg_id,serial
ACTION : Saves reg id in devices table
*/
    require_once($_SERVER['DOCUMENT_ROOT'].'/mobappclub/quark/includes/init.php');
    $devices = Device::find_by_sql("SELECT * FROM Devices WHERE reg_id='".$_POST['reg_id']."'");
    $device=$devices[0];
    if(!isset($device))
    {
        $device=Device::find_by_serial($_POST['serial']);
        if(!isset($device))
            $device = new Device();
    }
    $device->get_values();
    $device->save();
    LogReadable::log_action("New device registration ".$device->serial." | ".$device->reg_id);
    echo 1;
?>