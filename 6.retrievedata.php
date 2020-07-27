<!DOCTYPE html> 
<html lang="en">     
    <head>         
        <meta charset="utf-8">         
        <meta http-equiv="X-UA-Compatible" content="IE=edge">         
        <meta name="viewport" content="width=device-width, initial-scale=1">         
        <title>Retrieve data</title>
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
                    <h1>Retrieve data from a table:</h1>
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
                    
                    <h3>Retrieve data from database:</h3>
                    <?php
                        $sql = "SELECT * FROM $tableName";
//                      $sql = "SELECT * FROM $tableName WHERE firstName ='RITA'";
//                      $sql = "SELECT * FROM $tableName ORDER BY lastName";
//                      $sql = "SELECT * FROM $tableName ORDER BY lastName DESC";
                    
                        if($result = mysqli_query($connect,$sql)){
                            print_r($result);
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table-stripped table-hover table-condensed table-border'>
                                    <tr> 
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                    </tr>    
                                ";
                                
//                                $row_num = 0;
                                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
//                                    $row_num++;
//                                    echo "<p>Row number: $row_num</p>";
//                                    print_r($row);
                                    echo "<tr>";
                                    
                                    echo "<td>" . $row["ID"] . "</td>";
                                    echo "<td>" . $row["firstName"] . "</td>";
                                    echo "<td>" . $row["lastName"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["password"] . "</td>";
                                    
                                    echo "</tr>";
                                }
                                
                                echo "</table>";
                                // close the result set
                                mysqli_free_result($result);
                            }else{
                                echo "<p>mySQL returned an empty result set.</p>";
                            }
                        }else{
                            echo "<p>ERROR: Unable to execute: $sql. ". mysqli_error($connect).  "</p>";
                        }
                    ?>
                </div>     
            </div>
        </div> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j query.min.js"></script>         
        <script src="js/bootstrap.min.js"></script>  
    </body> 
</html> 