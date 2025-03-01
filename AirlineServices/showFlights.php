<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php
    include "headerfiles.html";
    include_once "connection.php";
    ?>
</head>
<script src="index.js"></script>

<body>
<?php
include "publicHeader.php";
$sourceCity = $_REQUEST['sourceCity'];
$destinationCity =$_REQUEST['destinationCity'];
$dateofTravel = $_REQUEST['dateofTravel'];
$day = strtolower(date('l', strtotime($dateofTravel)));
$s = "SELECT *,(SELECT cityCredentials.cityname FROM cityCredentials WHERE cityCredentials.id=sourcecity) as sourcecityname,(SELECT cityCredentials.cityname FROM citycredentials WHERE citycredentials.id=destinationcity) as destinationcityname FROM `flight`";
$result = mysqli_query($con,$s);
$row = mysqli_fetch_array($result);
?>
<!-- banner -->
<div class="inner_page_about">
    <?php
    include "searchForm.php";
    ?>
</div>
<!--//banner -->
<!--About-->
<div class="about" id="about">
    <div class="container">
        <h5 class="headerText">You are Looking for Flights from <i><?php echo $row['sourcecityname'] ?></i> To
            <i><?php echo $row['destinationcityname'] ?></i> on <i><?php echo $dateofTravel; ?> (<?php echo $day ?>)</i></h5>
        <div class="about-inner-grids">
            <div class="table-responsive">
                <?php
                $sql = "SELECT *,(SELECT cityCredentials.cityname FROM cityCredentials WHERE cityCredentials.id=sourcecity) as sourcecityname,(SELECT cityCredentials.cityname FROM cityCredentials WHERE cityCredentials.id=destinationcity) as destinationcityname FROM `flight` WHERE `sourcecity`='$sourceCity' and `destinationcity`='$destinationCity' and $day='yes'";
                $sql_result = mysqli_query($con, $sql);
                if (mysqli_num_rows($sql_result) > 0) {
                    ?>
                    <table class="table">
                        <tr>
                            <th rowspan="2">Sr No.</th>
                            <th rowspan="2">Flight Name</th>
                            <th colspan="2">Price</th>
                            <th colspan="2">Timings</th>
                            <th colspan="2" rowspan="2">Timings</th>
                        </tr>
                        <tr>
                            <th>Business</th>
                            <th>Economy</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                        </tr>
                        <?php
                        $num=1;
                        while ($sql_row=mysqli_fetch_array($sql_result)){
                            ?>
                            <tr>
                                <td><?php echo $num++; ?></td>
                                <td><?php echo $sql_row['flightname']; ?></td>
                                <td><?php echo $sql_row['businessClass']; ?></td>
                                <td><?php echo $sql_row['economyClass']; ?></td>
                                <td><?php echo $sql_row['starttime']; ?></td>
                                <td><?php echo $sql_row['endtime']; ?></td>
                                <td><a href="chooseSeat.php?q=<?php echo $sql_row['fid'] ?>&dateofTravel=<?php echo $dateofTravel ?>" class="text-primary">View Details</a> </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
                    echo "No Data Found";
                }
                ?>
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