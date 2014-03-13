<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");	
    $session->require_login();
?>
<html>
    <body>
        <?php require_once(SITE_ROOT."/admin/header.php");?>
        <table id="workshops" border="1">
            
        </table>
    </body>
    <script src="../javascript/viewWorkshops.js" type="text/javascript"></script>
</html>