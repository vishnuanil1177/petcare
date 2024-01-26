<html>
    <head></head>
        <body>
            welcome
            <?php
            include 'connection.php';
    
             $uname=$_GET["username"];
             $em=$_GET["email"];
             $pass=$_GET["password"];
             $cpass=$_GET["confirm_password"];
             echo $uname,$em,$pass,$cpass;
             $query="insert into user_data(username,email,password) VALUES($uname,$em,$pass)";
             $connect-> query($query);
             
             ?>
        </body>
</html>