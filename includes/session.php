<?php

class Session{

private $user, $loggedIn;

function __construct()
{
  session_start();
  $this->update_session();
}

public function require_login() //redirect to a certain page if not logged in
{
  if(!$this->loggedIn)
    header("location:".LOGIN_PAGE);
}

public function logged_in_user() //return logged in user
{
  if($this->loggedIn)
    return $this->user;
  else
    return false;
}

public function login($user) //log in a user
{
  $_SESSION['id']=$user->username;
  $this->user=$user;
  $this->loggedIn=true;
  Log::log_action("Logged in");
}

public function logout() //log out a user
{
  Log::log_action("Logged out");
  unset($_SESSION['id']);
  unset($this->user);
  $this->loggedIn=false;
}

public function update_session() //update attributes of session object according to session state
{
  if(isset($_SESSION['id']))
  {
    $result_user=User::find_by_sql("SELECT * FROM Users WHERE username='".$_SESSION['id']."'");
    $this->user=$result_user[0];
    $this->loggedIn=true;
  }
  else
  {
    unset($this->user);
    $this->loggedIn=false;
  }
}

public function is_logged_in() //return true if a user is logged in
{
  return $this->loggedIn;
}
}
$session=new Session();
?>