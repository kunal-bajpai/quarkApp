<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    if(sizeof($_POST)>0)
        if($_POST['repPass']==$_POST['password'])
        {
            $user=$session->logged_in_user();
            if($user->password==md5($_POST['oldPass']))
            {
                $user->password=md5($_POST['password']);
        		$user->save();
                LogReadable::log_action("Password changed");
        		echo "Password changed";
            }
            else
                echo "Incorrect current password";
    	}
    	else
    		echo "Passwords mismatched";
?>
<html>
    <body>
        <?php require_once(SITE_ROOT."/admin/header.php");?>
    	<form method='POST' required>
        	Current password : <input type='password' name='oldPass' size='20'/><br />
        	New password : <input type='password' name='password' size='20'/><br />
        	Repeat password : <input type='password' name='repPass' size='20'/><br />
        	<input type='submit' value='Change password' /><br/>
    	</form>
    </body>
</html>