<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mobappclub/quark/includes/init.php");
    $session->require_login();
    if(sizeof($_POST)>0)
    {
        $sponsor=new Sponsor();
        $sponsor->get_values();
        if(isset($_FILES))
            $files=File::get_files();
        else
            $sponsor->image=DEFAULT_IMAGE;
        $dp=$files[0];
        $dp->name=str_replace(' ','',$dp->name);
        if($dp->is_image())
        {
            $dp->rename_if_exists_in(UPLOAD_DIR);
            $dp->save_file();
            $sponsor->image=$dp->name;
        }
        else
            $sponsor->image=DEFAULT_IMAGE;
        $sponsor->save();
        LogReadable::log_action("Sponsor #{$sponsor->id} {$sponsor->name} added");
        gcm::send_add_sponsor($sponsor);
        echo "Sponsor added";
    }
?>
<html>
    <body>
    <?php require_once(SITE_ROOT."/admin/header.php");?>
        <form method='POST' enctype='multipart/form-data'>
            Name <input type='text' name='name' /><br/>
            Image <input type='file' accepts='images/*' name='dp'/><br/>
            Website <input type='text' name='website'/><br/>
            <input type='submit' />
        </form>
    </body>
</html>