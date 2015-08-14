<?php
class sql
{
    public static $db 		= false;
    private $database_host 	= 'localhost';
    private $database_user 	= 'root';
    private $database_pass 	= 'root';
    private $database_db 	= 'fsc2015_wp1';
    private $database_type  = 'mysql';

    function __construct()
    {
        if (self::$db === false) {
            $this->connect();
        }
    }

    private function connect()
    {
        $dsn = $this->database_type . ":dbname=" . $this->database_db . ";host=" . $this->database_host;
        try {
            self::$db = new PDO($dsn, $this->database_user, $this->database_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            var_dump(self::$db);
        } catch (PDOException $e) {
            
            //your log handler
        }
    }

}
?>