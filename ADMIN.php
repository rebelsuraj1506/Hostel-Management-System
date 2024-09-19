<?php
    session_start();
    if(isset($_SESSION["AdminName"])){

        include("admin_head.php");
        $con=mysqli_connect("localhost","root","","hostel");
        if(!$con)
        die("Server could not connected");
        $sql="select * from notice order by date desc, time desc limit 4";
        $rs=mysqli_query($con,$sql);

    }
    else
    header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-1 bg-warning text-center"><span>NOTICE.....</span></div>
            <div class="col-md-10 bg-light">
                <marquee direction="left" onmouseout="this.start();" onmouseover="this.stop();">
                    <?php
                        while($row=mysqli_fetch_assoc($rs)){;
                    ?>
                    <span class="text-danger mx-3 px-1 border border-dark"><?php echo $row["date"]; ?></span>
                    <a href="notice.php?filename=<?php echo $row["FileName"]; ?>" class="text-success"><?php echo $row["title"];  ?> </a>
                    <?php }; ?>
                </marquee>
            </div>
            <div class="col-md-1 bg-warning text-center"><a href="add.php" class="text-body">ADD NOTICE</a></div>
        </div>
    </div>
    <?php include("grievancelist.php"); ?>
</body>
</html>
