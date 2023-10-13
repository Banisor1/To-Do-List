<?php 
    require 'db.php';
    if(isset($_POST['send']))
    {
        $name = htmlspecialchars($_POST['task']);
        $sql = "INSERT INTO taskuri(nume) VALUES(:name)";
        $stmt = $conectare->prepare($sql);
        $stmt -> bindParam(':name', $name);
        $val = $stmt -> execute();
        if($val)
            header('Location: index.php');
    }
?>