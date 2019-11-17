<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "headerfiles.html";
    ?>
    <script src="index.js"></script>
</head>

<body>
<?php
include "publicHeader.php";
include "connection.php";

$fid = $_REQUEST['q'];
$dateofTravel = $_REQUEST['dateofTravel'];
$day = strtolower(date('l', strtotime($dateofTravel)));
$s = "SELECT *,(SELECT citycredentials.cityname FROM citycredentials WHERE citycredentials.id=sourcecity) as sourcecityname,(SELECT citycredentials.cityname FROM citycredentials WHERE citycredentials.id=destinationcity) as destinationcityname FROM `flight` where fid='$fid'";
$result = mysqli_query($con,$s);
$row = mysqli_fetch_array($result);
?>
<!-- banner -->
<div class="inner_page_about">



</div>
<!--//banner -->
<!--About-->
<div class="about" id="about">
    <div class="container">
        <h5 class="headerText">You are Looking for Flights from <i><?php echo $row['sourcecityname'] ?></i> To
            <i><?php echo $row['destinationcityname'] ?></i> on <i><?php echo $dateofTravel; ?> (<?php echo $day ?>)</i>
        </h5>
        <br>
        <br>

        <div class="about-inner-grids">
            <div class="row">
                <div class="col-md-7"><?php include "airlineLayout.php"; ?></div>
                <div class="col-md-5">
                    <br><br>
                    <h3 class="text-center">Your Booking Details</h3>
                    <br><br>
                    <div class="panel panel-info">
                        <div class="panel-heading">Your Choosen Seats</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Seat No.</th>
                                        <th>Class</th>
                                        <th>Price</th>
                                    </tr>
                                    <tbody id="seatsContent"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <b>Grand Total: </b> <span id="grandTotal"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>