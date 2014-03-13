<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    require_once(SITE_ROOT."/admin/header.php");
	if(isset($_POST['sponsors']))
		if(is_array($_POST['sponsors']))
			foreach($_POST['sponsors'] as $id)
			{
				$sponsor=Sponsor::find_by_id($id);
				if(file_exists(UPLOAD_DIR.$sponsor->image) && $sponsor->image!=DEFAULT_IMAGE_SPONSOR)
					unlink(UPLOAD_DIR.$sponsor->image);
                gcm::send_remove_sponsor($sponsor);
                LogReadable::log_action("Sponsor #{$sponsor->id} {$sponsor->name} sent");
				$sponsor->delete();			
			}
	$sponsors=Sponsor::find_all_alpha();
	echo "<h2>Sponsors</h2><br/>";	
	echo "<form method='POST'>";
	if(is_array($sponsors))
		foreach($sponsors as $sponsor)
			echo "<img src='http://www.mobappclub.com/quark/images/sponsors/{$sponsor->image}' height=50 width=50><input type='checkbox' name='sponsors[]' value='{$sponsor->id}' id='check{$sponsor->id}'/><label for='check{$sponsor->id}'>{$sponsor->name}</label><br/>";
	else
		echo "No sponsors added.<br/>";			
	echo "<input type='submit' value='Remove sponsor' /></form>";
?>
