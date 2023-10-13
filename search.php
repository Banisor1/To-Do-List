<?php
    require 'db.php';
    
    if(isset($_POST['search']))
    {
        $name = htmlspecialchars($_POST['search']);
        $sql = "SELECT * FROM taskuri WHERE nume like '%$name' ";
        $rows = $conectare -> query($sql);
    }
?>
<html>
    <head>
        <title> To do list </title>
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
            <div class = "col-md-12 text-center">
                <p>Cauta task - ul</p>
                <form action="search.php" method = "POST" class = " form-group">
                    <input type="text" placeholder="Search" name = "search" class = "form-control" >
                </form>
            </div>
            <div class ="row" style ="margin-top : 70px">
                <center><h1>To Do List</h1></center>
                <div class ="col-md-10 col-md-offset-1">
                <?php if($rows->rowCount() < 1): ?>
                        <h2 class = "text-danger text-center">N - ai nimic aici bos </h2>
                        <a href="index.php" class = "btn btn-warning" >Mergi la pagina principala sef</a>
                    <?php else: ?>
                        <table class="table">
                                <button type ="button" data-target = "#myModal" data-toggle ="modal" class ="btn btn-success">Add Task</button>
                                <button type ="button" class ="btn btn-default pull-right" onclick="print()">Print</button>
                                <hr><br>
                            <thead>
                                <tr>
                                <th scope="col">Numar</th>
                                <th scope="col">Task</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                <?php foreach ($rows as $row): ?>
                                    
                                        <th><?php echo $row['id'] ?></th>
                                        <td class = "col-md-10"><?php echo $row['nume'] ?></td>
                                        <td><a href = "update.php?id= <?php echo $row['id']; ?> " class ="btn btn-success">Edit</td></a>
                                        <td><a href = "delete.php?id= <?php echo $row['id']; ?> "class ="btn btn-danger">Delete</td></a>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    <?php endif; ?>           
                  
                   
                       
                </div>
            </div>

        </div>
                  <!-- Modal -->
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">!Add Tasks!</h4>
                        </div>
                        <div class="modal-body">
                          <form method = "POST" action ="add.php">
                              <div class = "form-group">
                                  <label> Task's name :</label>
                                  <input type = "text" required name ="task" class = "form-control">
                              </div>
                              <input type="submit" name ="send" value = "Trimite bos" class = "btn btn-success">
                              <a href = "index.php" class = "btn btn-warning">Back</a>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
    </body>
    
    
</html>