<?php
    session_start();
    include("navbar.php");

    $error=0;

    $con=mysqli_connect("localhost","root","","hostel");

    if(!$con)
    die("Server could not connected");

    if(isset($_SESSION["UserName"]))
    {
       $sql="select * from student WHERE email='".$_SESSION["UserName"]."'";
       $rs=mysqli_query($con,$sql);
       $row=mysqli_fetch_assoc($rs);
       $email=$row["email"];
       $name=$row["name"];
    }

    if(isset($_POST["login"])){
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from student WHERE email='".$email."'";
        $rs=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($rs);

        if($row["password"]==$password)
        {
            $_SESSION["UserName"]=$email;

        header("location:index.php");
        }
        else
            $error=1;
    }

    if(isset($_POST["admin_login"])){
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from admin WHERE email='".$email."'";
        $rs=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($rs);

        if($row["password"]==$password)
        {
            $_SESSION["AdminName"]=$email;

        header("location:admin.php");
        }
        else
            $error=1;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="login.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-image:url('wall_img/h4.jpg'); background-repeat:no-repeat;  background-size: 100% 100%">
    <div class="container-fluid">
        <div class="row" style="margin:120px 0px 85px;">
            <div class="col-md-4 col-sm-12 border mx-auto" style="background-color: black; opacity:0.9 ">

                <div class=" btn-group d-flex" style="margin: 50px 0px;">
                    <button type="button" class="btn btn-default text-white" id="student" style="background-color: orange; border-radius: 15px 0px 0px 15px;"
                        onclick="student();">STUDENT</button>
                    <button type="button" class="btn btn-default text-white" id="admin" style="background-color: green; border-radius: 0px 15px 15px 0px;"
                        onclick="admin();">ADMIN</button>
                </div>
                <h3 id="head" class="text-warning text-center my-5">
                    Login as Student...
                </h3>

                <form action="<?php $_PHP_SELF ?>" method="post">
                    <div class="input-group my-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent text-white border-right-0"><i class="fa fa-user"></i></span>
                      </div>
                      <input type="email" name="email" id="email" class="form-control bg-transparent text-white border-left-0" placeholder="Email" required>
                    </div>
                  
                    <div class="input-group my-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent text-white border-right-0"><i class="fa fa-lock "></i></span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control bg-transparent text-white border-left-0 border-right-0" placeholder="Password" required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-white border-left-0" onclick="show();">
                                <i id="eye" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <input type="submit" name="login" id="login" value="Login as Student" class="btn btn-primary text-white form-control my-5">
                    </div>

                    <div class="text-center mb-5">
                        <a id="pass" href="#?data=student">Forget password ?</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a id="acc" href="#?data=student">Reset password</a>
                    </div>
                </form>
                  <?php
                    if($error==1){
                        echo"<div class='row'>
                        <p class='mx-auto text-danger' style='font-size:20px;'>User name or password is incorrect...</p>";
                    }?>
            </div>
        </div>
    </div>
</body>

</html>
