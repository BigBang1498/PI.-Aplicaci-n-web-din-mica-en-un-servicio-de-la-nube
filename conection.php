<?php
    $host = 'dpg-d89sg5egvqtc73c9s7pg-a';
    $port = '5432';
    $dbname = 'mylibrary_dbr0';
    $user = 'mylibrary_dbr0_user';
    $pass = 'FpkCgff0UQ2sY5uFO3T2RVAJxjqzQh98';

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
