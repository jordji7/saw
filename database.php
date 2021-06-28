<?php
 define('HOST','localhost');
 define('DB_NAME','test');
 define('USER','root');
 define('PASS','');

 try{
   $db = new PDO("mysql:host=localhost; dbname=test", 'root' ,'');
   // set the PDO error mode to exception
   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

   echo "\nConesso con successo";
  
 }catch(PDOException $e){
   echo "Non sei collegato".$e->getmessage();
 }
?>