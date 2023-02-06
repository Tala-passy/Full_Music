<?php

class Database
{
    private static $dbhost="localhost";
    private static $dbname="memdjo_tala";
    private static $dbUser="root";
    private static $dbPassword="";
    private static $connexion=null;
   public static function connect(){
        try{
          self::$connexion=new PDO("mysql:host=". self:: $dbhost.";dbname=". self::$dbname, self::$dbUser, self::$dbPassword);
          }catch(PDOException $e){
              die($e->getMessage());
          }
          return  self::$connexion;
    }
   public static function disconnect(){
    self:: $connexion=null;
    }

}
Database::connect();
?>
