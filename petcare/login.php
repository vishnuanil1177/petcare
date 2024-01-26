<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   
</head>
<body>
  <style>body {
            background-color: rgb(106, 138, 205); /* Background color for pet care theme */
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin: 20px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #009688; /* Green submit button color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007567; /* Darker green on hover */
        }
    </style>
    <div class="container">
    <form action="login.php" method="post">
        <h3> LOGIN</h3>
  <div class="form-group">
    <label>username:</label>
    <input type="text" name="usname" class="form-control" placeholder="Enter username" id="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="pass" required>
  </div>
 <input type="submit" name="submit" class="btn btn-primary" value="login">
</form>
</div>


</body>
</html>
<?php
include('connection.php');
if(isset($_POST['submit']))
{
 $username=$_POST['usname'];
 $password=$_POST['pass'];
 $query=mysqli_query($connect,"select * from signup where username='$username' AND password='$password'");
 if($query){
    if(mysqli_num_rows($query)>0){
        $_SESSION['usname']=$username;
        header('location:admin-dash.php ');
    }else{
        echo "<script> alert('invalid credentails,please try again')</script>";
    }
 }
}
?>