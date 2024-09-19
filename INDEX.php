<?php
  session_start();
  $con=mysqli_connect("localhost","root","","hostel");
  if(!$con)
  die("Server could not connected");
    if(isset($_SESSION["UserName"])){
        $sql1="select * from student where email='".$_SESSION["UserName"]."'";
        $rs1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($rs1);
    }

  include("student_head.php");
  $sql="select * from notice order by date desc, time desc limit 4";
  $rs=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cotainer-fluid my-5">
        <div class="row">
            <div class="col-md-1 bg-warning text-center"><span>NOTICE.....</span></div>
            <div class="col-md-10 bg-light">
                <marquee direction="left" onmouseout="this.start();" onmouseover="this.stop();">
                    <?php
                        while($row=mysqli_fetch_assoc($rs)){;
                    ?>
                    <span class="text-danger m-3 px-1 border border-dark"><?php echo $row["date"]; ?></span>
                    <a href="notice.php?filename=<?php echo $row["FileName"]; ?>" class="text-success"><?php echo $row["title"];  ?> </a>
                    <?php }; ?>
                </marquee>
            </div>
            <div class="col-md-1 bg-warning text-center"><a href="noticelist.php" class="text-body">more.....</a></div>
        </div>
    </div>

        <?php include("hostel.php"); ?>
        <?php include("foot.php"); ?>

</body>
</html>
