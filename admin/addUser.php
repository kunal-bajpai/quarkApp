<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    if(sizeof($_POST)>0)
        if($_POST['repPass']==$_POST['password'])
    	{
            $user=User::find_by_username(str_replace(' ','',$_POST['username']));
            if(!isset($user))
            {
        		$user=new User();
        		$user->get_values();
                $user->username=str_replace(' ','',$user->username);
        		unset($user->repPass);
                $user->password=md5($user->password);
        		$user->save();
                LogReadable::log_action("User #{$user->id} {$user->username} added");
        		echo "User added";
            }
            else
                echo "Username taken";
    	}
    	else
    		echo "Passwords mismatched";
?>
<html>
    <body>
        <?php require_once(SITE_ROOT."/admin/header.php");?>
    	<form method='POST' required>
        	Username : <input type='text' name='username' size='20'/><br />
        	Password : <input type='password' name='password' size='20'/><br />
        	Repeat Password : <input type='password' name='repPass' size='20'/><br />
        	<input type='submit' value='Add User' /><br/>
    	
        </form>
    </body>
</html>