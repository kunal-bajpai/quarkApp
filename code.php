<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/mobappclub/quark/includes/init.php');
	if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['serial']))
	{
		$user = new Code();
		$user->get_values();
        $user->time=time()+TIME_DIFF;
		$user->save();
	}
	echo 1;
?>
