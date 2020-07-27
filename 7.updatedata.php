<!DOCTYPE html> 
<html lang="en">     
    <head>         
        <meta charset="utf-8">         
        <meta http-equiv="X-UA-Compatible" content="IE=edge">         
        <meta name="viewport" content="width=device-width, initial-scale=1">         
        <title>Update data</title>
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
                    <h1>Update data in a table:</h1>
                    <h3>Connect to database</h3>
                     <?php
                          // variables for MySQL 
                          $host = "localhost";
                          $user = "alimasor_user";
                          $password = "Md5YXgrgwe";  
                          $dB = "alimasor_users";
                          $tableName = "users";
                    
                          // connect to database:
                          $connect = mysqli_connect($host,$user,$password,$dB)or 
                              die("ERROR: Unable to connect ". $mysqli_connect_error());
    
                          echo "<p>Connected successfully to  " . $dB . " database, with user " . $user . "</p>";
                    ?>
                    
                    <h3>Update data:</h3>
                    <?php
                       $sql ="UPDATE $tableName SET lastName = 'Wilson' WHERE firstName = 'Andrius'";
                       $sql ="UPDATE $tableName SET email = 'newemail@inbox.lt' WHERE firstName = 'Andrius' AND email='andritaltd@gmail.com'";
                    
                        if(mysqli_query($connect,$sql)){
                            echo "<p>Data was updated successfully!</p>";
                        }else{
                            echo "<p>ERROR: Unable to execute $sql. " . mysqli_error($connect) . "</p>";
                        }
                    ?>
                </div>     
            </div>
        </div> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j query.min.js"></script>         
        <script src="js/bootstrap.min.js"></script>  
    </body> 
</html> 