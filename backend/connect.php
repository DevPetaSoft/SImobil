<?php

   $hostname = "localhost";
   $dbname = "db_simobil";
   $username = "root";
   $password = "";
   MYSQL_CONNECT($hostname, $username, $password) or die("Nao pode conectar");
   @mysql_select_db("$dbname") or die("Nao foi possivel conectar no banco de dados");
?>