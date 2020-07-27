<!DOCTYPE html> 
<html lang="en">     
    <head>         
        <meta charset="utf-8">         
        <meta http-equiv="X-UA-Compatible" content="IE=edge">         
        <meta name="viewport" content="width=device-width, initial-scale=1">         
        <title>Populate table</title>
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
                    <h1>Populate table using form:</h1>
                    <h3>Connect to database</h3>
                     <?php
                          // variables for MySQL 
                          $host = "localhost";
                          $user = "alimasor_user";
                          $password = "Md5YXgrgwe";  
                          $dB = "alimasor_users";
                    
                          // connect to database:
                          $connect = mysqli_connect($host,$user,$password,$dB)or 
                              die("ERROR: Unable to connect ". $mysqli_connect_error());
    
                          echo "<p>Connected successfully to  " . $dB . " database, with user " . $user . "</p>";
                    ?>
                    
                    <h3>Send data to database</h3>
                    <?php
                     // get all the user inputs
                      $ID = $_POST["ID"];
                      $firstName = $_POST["firstName"];
                      $lastName = $_POST["lastName"];
                      $email = $_POST["email"];
                      $password = $_POST["password"];
                    
                    // error messages:
                    $missingFirstName = "<p><strong>Please enter your first name!</strong></p>";
                    $missingLastName = "<p><strong>Please enter your last name!</strong></p>";
                    $missingEmail = "<p><strong>Please enter your email!</strong></p>";
                    $invalidEmail = "<p><strong>Please enter a valid email address!</strong></p>";
                    $missingPassword ="<p><strong>Please enter your password!</strong></p>";
                    
                    $errors = "";
                    if($_POST["submit"]){
                        // check for errors
                        
                        // First Name
                        if(!$firstName){
                            $errors .= $missingFirstName;
                        }else{
                            $firstName = filter_var($firstName,FILTER_SANITIZE_STRING);
                        }
                        
                        // Last Name
                        if(!$lastName){
                            $errors .= $missingLastName;
                        }else{
                            $lastName = filter_var($lastName,FILTER_SANITIZE_STRING);
                        }
                        
                        // Email
                        if(!$email){
                            $errors .= $missingEmail;
                        }else{
                            $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                            
                            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                                $errors .= $invalidEmail;
                            }
                        }
                        
                        // Password
                        if(!$password){
                            $errors .= $missingPassword;
                        }
                        
                        // CHECK If we have any errors , then we create result message
                        if($errors){
                            $resultMessage = '<div class="alert alert-danger">'. $errors .'</div>';
                            echo $resultMessage;
                        }else{
                            // No errors:
                            // prepare variables for query 
                            $tableName = "users";
                            $firstName = mysqli_real_escape_string($connect,$firstName);
                            $lastName = mysqli_real_escape_string($connect,$lastName);
                            $email = mysqli_real_escape_string($connect,$email);
                            $password = mysqli_real_escape_string($connect,$password);
                            
                            // store password in secure way with hash
                            $password = md5($password);
                            
                            if(!$ID){ // if we are missing id we automatically increment 
                                $sql = "INSERT INTO users (firstName, lastName, email, password)
                                VALUES ('$firstName','$lastName','$email','$password')";    
                            }else{  // else we just put value was inserted
                                 $sql = "INSERT INTO users (ID,firstName, lastName, email, password)
                                VALUES ('$ID', '$firstName','$lastName','$email','$password')";    
                            }
                            
                            // execute insert query
                            if(mysqli_query($connect,$sql)){
                                $resultMessage = '<div class="alert alert-success">Data added successfully to the '.$dB. ' database, table '. $tableName . '</div>';
                            }else{
                                 $resultMessage = '<div class="alert alert-warning">ERROR: Unable to execute: '.$sql.'. ' .mysqli_error($connect) .'</div>';
                            }
                            echo $resultMessage;
                        }
                    }
                    ?>
                    
                    <form action="5.populatetableusingform.php" method="post">
                        <div class="form-group">
                                <label for="ID">ID:</label>
                                <input type="number" id="ID" placeholder="ID" class="form-control" name="ID" maxlength="4">
                        </div>
                           <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" id="firstName" placeholder="First Name" class="form-control" name="firstName" maxlength="20">
                        </div>
                           <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" id="lastName" placeholder="Last Name" class="form-control" name="lastName" maxlength="20">
                        </div>
                          <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" placeholder="Email" class="form-control" name="email" maxlength="30">
                        </div>
                           <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" placeholder="Password" class="form-control" name="password" maxlength="40">
                        </div>
                        
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Data">
                    </form>
                </div>     
            </div>
        </div> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/j query.min.js"></script>         
        <script src="js/bootstrap.min.js"></script>  
    </body> 
</html> 