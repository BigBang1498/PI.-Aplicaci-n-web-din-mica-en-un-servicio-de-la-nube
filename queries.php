<?php
    include 'conection.php';

    $accion = $_POST['accion'];
    $autor = $_POST['autor'] ?? '';
    $titulo = $_POST['titulo'] ?? '';
    $url = $_POST['url'];

    function agregar_libro($pdo, $autor, $titulo, $url){
        try{
            $stmt = $pdo->prepare("INSERT INTO books (autor, titulo, url_pdf) VALUES (:autor, :titulo, :url_pdf)");

            $stmt->execute([
                ':autor' => $autor,
                ':titulo' => $titulo,
                'url_pdf' => $url
            ]);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }

    }
?>