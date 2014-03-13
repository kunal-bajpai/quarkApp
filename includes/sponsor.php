<?php
    class Sponsor extends DatabaseObject {
    
        protected static $tableName='Sponsors';
        
        public function find_all_alpha()
    	{
			return self::find_by_sql("SELECT * FROM ".self::$tableName." ORDER BY name ASC");
		}
    }
?>