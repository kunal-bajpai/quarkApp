<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    if(sizeof($_POST)>0)//board brand cpu device manufacturer model product name model2 problem version
    {
        $body[]="Board : ".$_POST['board'];
        $body[]="Brand : ".$_POST['brand'];
        $body[]="CPU : ".$_POST['cpu'];
        $body[]="Device : ".$_POST['device'];
        $body[]="Manufacturer : ".$_POST['manufacturer'];
        $body[]="Model : ".$_POST['model'];
        $body[]="Model2 : ".$_POST['model2'];
        $body[]="Product : ".$_POST['product'];
        $body[]="Version : ".$_POST['version'];
        $body[]="Problem : ".$_POST['problem'];
        echo mail("ayushkr19@gmail.com,vandan.umstechlabs@gmail.com","Quark app bug",implode("\r\n",$body),"From:Quark App <no-reply@quarkapp.com>");
    }
?>