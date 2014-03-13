<?php
class Update extends databaseObject{
    protected static $tableName='Updates';
      
    public static function find_valid()
    {
        $time=time()+TIME_DIFF;
        return self::find_by_sql('SELECT * FROM '.self::$tableName.' WHERE expiry>='.$time);
    }
    
}
?>