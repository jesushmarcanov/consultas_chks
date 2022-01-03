<?php 
    $dsn = 'mysql:dbname=php_multiple;host:127.0.0.1';
    $user = 'root';
    $password = 'root';
    try{

        $pdo = new PDO( $dsn,
                        $user,
                        $password
                        );
        //echo 'Conexión Correcta';

    }catch( PDOException $e ){
        echo 'Error al conectarnos: '.$e->getMessage();
    }