<?php
     define('DB_DSN','mysql:host=sql301.infinityfree.com;dbname=if0_37810847_webdev2project;charset=utf8');
     define('DB_USER','if0_37810847');
     define('DB_PASS','UgND3UwWEL');     
     
     try {
         // Try creating new PDO connection to MySQL.
         $db = new PDO(DB_DSN, DB_USER, DB_PASS);

     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); // Force execution to stop on errors.
         
     }
 ?>
