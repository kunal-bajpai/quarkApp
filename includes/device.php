<?php
    class Device extends DatabaseObject {
        protected static $tableName='Devices';
        
        public static function find_by_serial($serial)
        {
            $result= self::find_by_sql("SELECT * FROM ".self::$tableName." WHERE serial='{$serial}'");
            return $result[0];
        }
        
        public static function find_by_reg_id($regId)
        {
            $result= self::find_by_sql("SELECT * FROM ".self::$tableName." WHERE reg_id='{$regId}'");
            return $result[0];
        }
    }
?>