<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['updates']))
		if(is_array($_POST['updates']))
			foreach($_POST['updates'] as $id)
			{
				$update=Update::find_by_id($id);
                gcm::send_remove_update($update);
                LogReadable::log_action("Update #{$update->id} ({$update->update_head} : {$update->update_body}) removed");
				$update->delete();
			}
	$updates=Update::find_all();
	echo "<h2>Updates</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($updates))
		foreach($updates as $update)
        {
            $sent = strftime("%d/%m/%Y %H:%M:%S",intval($update->timestamp));
            $expires = strftime("%d/%m/%Y %H:%M:%S",intval($update->expiry));
			echo "<input type='checkbox' name='updates[]' value='{$update->id}' id='check{$update->id}'/><label for='check{$update->id}'>#{$update->id} {$update->update_head} : {$update->update_body} | (Sent {$sent} | Expires {$expires})</label><br/>";
        }
	else
		echo "No updates sent.<br/>";			
	echo "<input type='submit' value='Remove update' /></form>";
?>
