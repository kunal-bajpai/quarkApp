<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    require_once(SITE_ROOT."/admin/header.php");
    $session->require_login();
    $users=User::find_all();
    if(is_array($users))
    {
        echo "Registered admins <ul>";
        foreach($users as $user)
                echo "<li>{$user->username}</li>";
        echo "</ul>";
    }
    else
        echo "No admins added";
?>