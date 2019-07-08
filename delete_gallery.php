<?php
require 'dbconnect.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM gallery WHERE id= :id";
    $query = $pdo->prepare($query);

    $query->execute(['id' => $id]);


    header("Location: gallery.php");