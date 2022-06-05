<?php
    require('db_connect.php');

    $id = $_GET['id'];

    $pdo = db_connect();

    try {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
      
        // main.phpにリダイレクト
        header("Location: main.php");
        exit;
      } catch (PDOException $e) {
        echo $e->getMessage();
        die();
      }
?>