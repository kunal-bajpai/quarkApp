<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
	GcmLog::clear_logs();
	echo GcmLog::show_logs();
?>