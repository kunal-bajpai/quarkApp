<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    echo <<<END
    <style>
    #navcontainer ul
    {
    margin: 0;
    padding: 0;
    list-style-type: none;
    text-align: center;
    }
    
    #navcontainer ul li { display: inline; }
    
    #navcontainer ul li a
    {
    text-decoration: none;
    padding: .2em 1em;
    color: #fff;
    background-color: #036;
    }
    
    #navcontainer ul li a:hover
    {
    color: #fff;
    background-color: #369;
    }
    </style>
    <div id='navcontainer'>
        <h1>Quark app</h1><br/>
END;
	echo count(Device::find_all())." devices registered. <br/>";
    if($session->is_logged_in())
        echo "Logged in as ".$session->logged_in_user()->username;
    echo <<<END
        <ul>
            <li><a href='update.php'>Send update</a></li>
            <li><a href='removeUpdate.php'>Remove update</a></li>
            <li><a href='addSponsor.php'>Add sponsor</a></li>
            <li><a href='removeSponsor.php'>Remove sponsor</a></li>
            <li><a href='viewEvents.php'>Event venue</a></li>
            <li><a href='viewWorkshops.php'>Workshop venue</a></li>
            <li><a href='code.php'>Code breakers</a></li>
            <li><a href='addUser.php'>Add user</a></li>
            <li><a href='admins.php'>View users</a></li>
            <li><a href='viewLog.php'>View logs</a></li>
            <li><a href='changePass.php'>Change password</a></li>
            <li><a href='index.php'>Logout</a></li>
        </ul>
    </div>
END;
?>
