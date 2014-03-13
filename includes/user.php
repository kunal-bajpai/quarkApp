<?php

class User extends databaseObject{

    protected static $tableName='Users';
    
    public function authenticate()
    {
      global $db;  
      $pass=$db->fetch_array($db->query("SELECT password FROM ".self::$tableName." WHERE username='".$this->username."' LIMIT 1"));
      if(md5($this->password)==$pass[0][0])
      {
        $result_id=$db->fetch_array($db->query("SELECT ID FROM ".self::$tableName." WHERE username='".$this->username."' LIMIT 1"));
        $this->id=$result_id[0][0];
        return true;
      }
      else
        return false;
    }


    public static function find_by_username($username)
    {
      $result_object= User::find_by_sql("SELECT * FROM ".self::$tableName." WHERE username='{$username}';"); 
      return $result_object[0];
    }
 
}

?>
