<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['users']))
		if(is_array($_POST['users']))
			foreach($_POST['users'] as $id)
			{
				$user=Code::find_by_id($id);
               	 LogReadable::log_action("Code breaker #{$user->id} {$user->name} deleted");
				$user->delete();
			}
	$users=Code::find_all();
	echo "<h2>Code breakers</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($users))
		foreach($users as $user)
        {
		    $time=date('d M Y H:i:s',$user->time);
            echo "<input type='checkbox' name='users[]' value='{$user->id}' id='check{$user->id}'/><label for='check{$user->id}'>{$time} {$user->name} | {$user->phone} | {$user->serial}</label><br/>";
        }
	else
		echo "Code not broken yet<br/>";			
	echo "<input type='submit' value='Remove user' /></form>";
?>