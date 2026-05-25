<?php
    $host = 'localhost';
    $port = '5432';
    $dbname = 'mylibrary';
    $user = 'postgres';
    $pass = '123456789';

    $dsn = "pgsql:host=$host;port=$port; dbname=$dbname";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        echo "Conexión con PostgreSQL exitosa";
    }catch(PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
    }
?>  
