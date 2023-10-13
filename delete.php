<?php

require 'db.php';

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];

    $stmt = $conectare->prepare("DELETE FROM taskuri WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
       header("Location:index.php");
    } else {
        echo "Eroare la ștergerea intrării.";
    }
}
?>