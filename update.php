<?php
   require 'db.php';
   
   if(isset($_GET['id']))
    {
       $id = (int)$_GET['id'];
       $sql = "SELECT * FROM taskuri WHERE id = :id";
       $stmt = $conectare -> prepare($sql);
       $stmt -> bindParam(':id', $id);
       $stmt -> execute();
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
       if(isset($_POST['send']) && isset($row))
       {
            $task = htmlspecialchars($_POST['task']);
            $sql2 = "UPDATE taskuri set nume = :task WHERE id = :id";
            $stmt2 = $conectare->prepare($sql2);
            $stmt2->bindParam(':task', $task);
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();
            header('Location: index.php');
       }
   }
?>
<html>
    <head>
        <title> Update To do list </title>
        <style>
            body {
                  color: white;
            }
        </style>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body bgcolor = "black">
        <div class="container">

            <div class ="row" style ="margin-top : 70px">
                <center><h1>To Do List</h1></center>
                <div class ="col-md-10 col-md-offset-1">
                    <table class="table">     
                    </table>
                </div>
            </div>
        </div>        
            <form method = "POST" >
                <div class = "form-group">
                        <label> Numele task - ului : </label>
                        <input type="text" value="<?php echo isset($row['nume']) ? $row['nume'] : ''; ?>" required name="task" class="form-control">
                </div>
                        <input type = "submit" name = "send" value = "Trimite bos" class = "btn btn-success">
                        
            </form>
                            
    </body>
</html>