<!DOCTYPE html> 
<html lang="en">     
    <head>         
        <meta charset="utf-8">         
        <meta http-equiv="X-UA-Compatible" content="IE=edge">         
        <meta name="viewport" content="width=device-width, initial-scale=1">         
        <title>Add a table to database</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">         
        <style>             
            h1{                
                color:purple;                
            }             
            h3{                 
                color:#42d5ce;                
            }             
            .containingDiv{                 
                border:1px solid #7c73f6;                 
                margin-top: 100px;                
                border-radius: 15px;             
            }
        </style>
    </head> 
    <body> 
        <div class="container-fluid">     
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10 containingDiv">
                    <h1>Add a table to database:</h1>
                    <h3>Connect to database</h3>
                     <?php
                          $link = @mysqli_connect("localhost","alimasor_user","Md5YXgrgwe","alimasor_users")or 
                              die("Error: Unable to connect" . mysqli_connect_error());
                    
                    echo "<p>Connected successfully to the database.</p>";
                    ?>
                     <h3>Create table</h3>
                     <?php
                         $sql = "CREATE TABLE users(
                         ID INT(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         firstName CHAR(20) NOT NULL,
                         lastName CHAR(20) NOT NULL,
                         email VARCHAR(30),
                         password VARCHAR(40) NOT NULL)";
                    
                    if(mysqli_query($link,$sql)){
                        echo "<p>Table users created successfully!</p>";
                    }else{
                        echo "ERROR: Unable to execute $sql " . mysqli_error($link);
                    }
                    ?>
                </div>     
            </div>
        </div> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j query.min.js"></script>         
        <script src="js/bootstrap.min.js"></script>  
    </body> 
</html> 