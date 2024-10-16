<?php

 // REVISADO - OK

 // Servidor Local

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "colorado";

 // Cria Conexão

 $con = new mysqli($servername, $username, $password, $dbname);


		   
 // Verifica Conexão

 if ($con->connect_error) {
                              die("Falha na Conexão com o BD: " . $con->connect_error);
                             } 

 ?> 