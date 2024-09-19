<?php

session_start();
if (isset($_SESSION["UserName"])) {
    include("navbar.php");
    $con = mysqli_connect("localhost", "root", "", "hostel");
    if (!$con)
        die("Server could not connected");
    $sql = "select * from student where email='" . $_GET["email"] . "'";
    $rs = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($rs);

    $sql1 = "select * from hostel_detail where email='" . $_GET["email"] . "'";
    $rs1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($rs1);

    $sql2 = "select * from meal_detail where email='" . $_GET["email"] . "'";
    $rs2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($rs2);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid" style="margin-top:72px; background-color: rgb(219, 214, 214)">
        <div class="row pt-3">
            <div class="col-md-3">
                <img src="image/<?php echo $row["img"]; ?>" width="200px" height="200px" alt="" style="border-radius:25px;">
            </div>
            <div class="col-md-8">
                <div class="row mt-4">
                    <div class="col-md-3 ">
                        <h6>Name : </h6>
                    </div>
                    <div class="col-md-4 "><?php echo $row["name"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3 r">
                        <h6>Registration Number : </h6>
                    </div>
                    <div class="col-md-4 "><?php echo $row["reg_no"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3 ">
                        <h6> Branch : </h6>
                    </div>
                    <div class="col-md-4 "><?php echo $row["branch"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3 ">
                        <h6> Contact Number : </h6>
                    </div>
                    <div class="col-md-4 "><?php echo $row["mobile"]; ?></div>
                </div>
                <div class="row mt-3">
                    <?php if($row1["remainingamount"]<1000){?>
                        <marquee behavior="alternate" height="40" width="75%" direction="left" class="bg-danger text-light rounded-lg"><h4>Your mess fund is to low refil as soon as possible</h4></marquee>
                    <?php }else{ ?>
                        <marquee behavior="alternate" height="40" width="75%" direction="left" class="bg-success text-light rounded-lg"><h4>Your current mess fund is <?Php echo $row1["remainingamount"];?> </h4></marquee>
                    <?php } ?>

                </div>
            </div>
        </div>
        <hr class="mb-5">
        <h5 class="text-danger">Personal Details</h5>
        <hr class="mb-2">
        <div class="row">
            <div class="col-md-3 ml-5">Name : </div>
            <div class="col-md-5 ml-5"><?php echo $row["name"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Mother Name : </div>
            <div class="col-md-5 ml-5"><?php echo $row["mname"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Father Name : </div>
            <div class="col-md-5 ml-5"><?php echo $row["fname"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Mobile no. : </div>
            <div class="col-md-5 ml-5"><?php echo $row["mobile"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Email : </div>
            <div class="col-md-5 ml-5"><?php echo $row["email"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Emergency Contact : </div>
            <div class="col-md-5 ml-5"><?php echo $row["econtact"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Corresponding Address : </div>
            <div class="col-md-5 ml-5"><?php echo $row["coaddr"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Permanent Address : </div>
            <div class="col-md-5 ml-5"><?php echo $row["praddr"]; ?></div>
        </div>
        <hr class="mb-3">

        <h5 class="text-danger">Hostel Details</h5>
        <hr class="mb-3">
        <div class="row">
            <div class="col-md-3 ml-5">Hostel Name :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["hostelname"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Room no. :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["room"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Amount Paid For Accomodation :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["hostelamount"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Amount Paid For Meal :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["mealamount"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Amount Consumed :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["amountconsumed"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">Remaining Amount :</div>
            <div class="col-md-5 ml-5"><?php echo $row1["remainingamount"]; ?></div>
        </div>
        <hr class="mb-3">

        <h5 class="text-danger">Meal Details</h5>
        <hr class="mb-3">
        <div class="row">
            <div class="col-md-3 ml-5">January :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["jan"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">February :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["feb"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">March:</div>
            <div class="col-md-5 ml-5"><?php echo $row2["mar"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">April :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["apr"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">May :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["may"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">June :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["june"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">July :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["july"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">August :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["aug"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">September :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["sep"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">October :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["oct"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">November :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["nov"]; ?></div>
        </div>
        <div class="row">
            <div class="col-md-3 ml-5">December :</div>
            <div class="col-md-5 ml-5"><?php echo $row2["dece"]; ?></div>
        </div>
        <hr class="mb-3">
    </div>
    <?php include("foot.php"); ?>
</body>

</html>
