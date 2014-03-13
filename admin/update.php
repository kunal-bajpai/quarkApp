<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    if(sizeof($_POST)>0 && isset($_POST['expiry']))
    {
        $update = new Update();
        $update->get_values();
        $update->expiry=strtotime($update->expiry);
        $update->timestamp=time()+TIME_DIFF;
        if($update->for_ev_ws==0)
            $update->ev_ws=0;
        $update->save();
        LogReadable::log_action("Update #{$update->id} {$update->head} sent");
        gcm::send_update($update);
        echo "Update #{$update->id} sent";
    }
?>
<html>
    <script language="javascript" type="text/javascript" src="../javascript/datetimepicker.js"></script>
    <script language="javascript" type="text/javascript" src="../javascript/update.js"></script>
    <body>
        <?php require_once(SITE_ROOT."/admin/header.php");?>
        <form method='POST'>
            Head <input type='text' name='update_head' required/><br/>
            Body <br/><textarea name='update_body' style="height:200px;width:800px;" required></textarea><br/>
            For <select onchange='populate(this.value);' name='for_ev_ws' id='for_ev_ws'><option value='0'>General</option><option value='1'>Event</option><option value='2'>Workshop</option></select>
            <select name='ev_ws' id='ev_ws'></select><br/>
            Expires <input name='expiry' id="demo2" type="text" size="25" value="10-Feb-2014 11:59:59 PM" required><a href="javascript:NewCal('demo2','ddmmmyyyy',true,12)"><img src="../images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a><br/>
            <input type='submit' />
        </form>
    </body>
</html>