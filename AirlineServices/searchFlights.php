<?php
include_once "connection.php";
?>
<div class="container searchDiv">
    <div class="row">
        <div class="col-md-12 m-5">
            <h3 class="text-white" style="color: white">Look for your Flight here</h3>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <select class="form-control" name="sourcecity" id="sourcecity" onchange="chooseDestination(this.value)">
                <option value="">Source City</option>
                <?php
                $city = "SELECT * FROM `flight` INNER JOIN citycredentials ON citycredentials.id=flight.sourcecity GROUP BY citycredentials.cityname";
                $city_result = mysqli_query($con, $city);
                while ($city_row = mysqli_fetch_array($city_result)){
                    ?>
                    <option value="<?php echo $city_row['id'] ?>"><?php echo $city_row['cityname'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="destinationcity" id="destinationcity">
                <option value="">Destination City</option>

                <?php
                $city = "SELECT * FROM `flight` INNER JOIN citycredentials ON citycredentials.id=flight.sourcecity GROUP BY citycredentials.cityname";
                $city_result = mysqli_query($con, $city);
                while ($city_row = mysqli_fetch_array($city_result)){
                    ?>
                    <option value="<?php echo $city_row['id'] ?>"><?php echo $city_row['cityname'] ?></option>
                    <?php
                }
                ?>

            </select>
        </div>
        <div class="col-md-3">
            <input type="text" readonly class="form-control" name="dateofPickup" id="dateofPickup"
                   placeholder="Date of Travel">
        </div>
        <div class="col-md-1">
            <input type="button" class="btn btn-info" value="Go" onclick="searchFlights()">
        </div>
    </div>
</div>