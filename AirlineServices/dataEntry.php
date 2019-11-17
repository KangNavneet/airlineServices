<?php
include_once "connection.php";


if (isset($_POST["cityEntry"])) {

    $cityname = $_POST["cityname"];
    $airportcode = $_POST["airportCode"];


    /*DUPLICATE CHECK*/
    $query = "select * from cityCredentials where cityname='$cityname' and airportcode='$airportcode'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "DUPLICATE DATA EXIST";
    } else {


        /*FILE UPLOAD*/
        $name = $_FILES["photoUpload"]["name"];
        $temppath = $_FILES["photoUpload"]["tmp_name"];
        // echo $name,"<br>";
        //echo $temppath,"<br>";
        $filesize = round($_FILES["photoUpload"]["size"] / 1024, 2);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $filepath = "cityUploads/$name";
        if ($ext != "jpg" and $ext != "png") {
            echo "please select jpg or png file only";
        } elseif ($filesize > 500000) {
            echo "File size must be less than or equalto 50 KB";
        } else {
            move_uploaded_file($temppath, $filepath);
            $query = "insert into cityCredentials values(null,'$cityname','$airportcode','$filepath')";
            mysqli_query($con, $query);
            echo "<h1>CITY ADDED</h1>";
            echo "<img src='$filepath' style='width:200px ;height:200px'>";
        }

        /*FILE UPLOAD ENDS HERE*/
    }
}


if (isset($_POST["viewCity"])) {
    $query = "SELECT * from cityCredentials";
    $result = mysqli_query($con, $query);
    $ar = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($ar, $row);
    }
    echo json_encode($ar);
}

if (isset($_POST['deleteCityData'])) {
    $cityid = $_POST["id"];
    $query = "delete from citycredentials where id=$cityid";
    echo $query;
    $result = mysqli_query($con, $query);
    echo "Data Deleted";

}

if (isset($_POST['updateCityDetail'])) {
    $cityid = $_POST["cityId"];

    $cityname = $_POST["cityname"];
    $airportcode = $_POST["airportCode"];


    /*FILE UPLOAD*/
    if (isset($_FILES["photoUpload"])) {
        $name = $_FILES["photoUpload"]["name"];


        $temppath = $_FILES["photoUpload"]["tmp_name"];
        // echo $name,"<br>";
        //echo $temppath,"<br>";
        $filesize = round($_FILES["photoUpload"]["size"] / 1024, 2);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $filepath = "cityUploads/$name";
        if ($ext != "jpg" and $ext != "png") {
            echo "please select jpg or png file only";
        } elseif ($filesize > 500000) {
            echo "File size must be less than or equalto 50 KB";
        } else {
            move_uploaded_file($temppath, $filepath);
            $query = "update citycredentials set photo='$filepath',cityname='$cityname',airportcode='$airportcode' where id=$cityid";
            mysqli_query($con, $query);
            echo "DATA UPDATED";
        }
    } else {
        $query = "update citycredentials set cityname='$cityname',airportcode='$airportcode' where id=$cityid";
        mysqli_query($con, $query);
        echo "DATA UPDATED";
    }
}


if (isset($_POST["btnFlightCheck"])) {
    $flightName = $_POST["flightName"];
    $destinationCity = $_POST["destinationCity"];
    $sourceCity = $_POST["sourceCity"];
    $businessPrice = $_POST["businessPrice"];
    $economyPrice = $_POST["economyPrice"];
    $monday = $_POST["monday"];
    $tuesday = $_POST["tuesday"];
    $wednesday = $_POST["wednesday"];
    $thursday = $_POST["thursday"];
    $friday = $_POST["friday"];
    $saturday = $_POST["saturday"];
    $sunday = $_POST["sunday"];
    $startTime = date("H:i:s", strtotime($_POST["startTime"]));
    $endTime = date("H:i:s", strtotime($_POST["endTime"]));
    $aircraft = $_POST["aircraft"];


    if ($sourceCity == $destinationCity) {
        echo "Source City And Destination City Cannot Be Same!";

    } elseif ($startTime == $endTime) {
        echo "Start-Time and End-Time Cannot Be Same!";
    } else {
        /*DUPLICATE CHECK*/
        $query = "select * from flight where flightname='$flightName' and sourcecity=$sourceCity and destinationCity=$destinationCity and startTime='$startTime' and endTime='$endTime'";
        //print_r($query);
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "DUPLICATE DATA EXIST";

        } else {
            $query = "insert into flight values(null,'$flightName',$sourceCity,$destinationCity,$businessPrice,$economyPrice,'$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$sunday','$startTime','$endTime','$aircraft')";
            // print_r($query);
            mysqli_query($con, $query);
            echo "Data Inserted";
        }
    }
}



    if (isset($_POST["viewFlightData"])) {
        $sourceCity=$_POST["sourceCity"];
        $destinationCity=$_POST["destinationCity"];
        $query="select *,(select citycredentials.cityname from citycredentials where citycredentials.id=sourcecity)as sourcecityName,(Select citycredentials.cityname from citycredentials where citycredentials.id=destinationCity)as destinationCityName from flight where sourcecity='$sourceCity' and destinationCity='$destinationCity'";

        $result = mysqli_query($con, $query);
        $ar = array();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($ar, $row);
        }
        echo json_encode($ar);
    }






if (isset($_POST["planeEntryData"])) {

    $flightname = $_POST["flightname"];
    /*DUPLICATE CHECK*/
    $query ="select * from planeinfo where planeName='$flightname'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "DUPLICATE DATA EXIST";
    } else {


        /*FILE UPLOAD*/
        $name = $_FILES["photoUpload"]["name"];
        $temppath = $_FILES["photoUpload"]["tmp_name"];
        // echo $name,"<br>";
        //echo $temppath,"<br>";
        $filesize = round($_FILES["photoUpload"]["size"] / 1024, 2);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $filepath = "flightInfo/$name";
        if ($ext != "jpg" and $ext != "png") {
            echo "please select jpg or png file only";
        } elseif ($filesize > 500) {
            echo "File size must be less than or equalto 50 KB";
        } else {
            move_uploaded_file($temppath, $filepath);
            $query = "insert into planeinfo values(null,'$flightname','$filepath')";
            mysqli_query($con, $query);
            echo "<h1>FLIGHT INFO ADDED</h1>";
            echo "<img src='$filepath' style='width:200px ;height:200px'>";
        }

        /*FILE UPLOAD ENDS HERE*/
    }
}



if (isset($_POST["viewPlane"])) {
    $query = "SELECT * from planeInfo";
    $result = mysqli_query($con, $query);
    $ar = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($ar, $row);
    }
    echo json_encode($ar);
}

if (isset($_POST['deletePlaneData'])) {
    $flightname = $_POST["flightname"];
    $pid = $_POST["pid"];
    $query = "delete from planeInfo where pid=$pid";
    echo $query;
    $result = mysqli_query($con, $query);
    echo "Data Deleted";

}

if (isset($_POST['updatePlaneDetail'])) {
    $flightname = $_POST["flightname"];
    $pid = $_POST["pid"];
    /*FILE UPLOAD*/
    if (isset($_FILES["photoUpload"])) {
        $name = $_FILES["photoUpload"]["name"];
        $temppath = $_FILES["photoUpload"]["tmp_name"];
        // echo $name,"<br>";
        //echo $temppath,"<br>";
        $filesize = round($_FILES["photoUpload"]["size"] / 1024, 2);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $filepath = "flightInfo/$name";
        if ($ext != "jpg" and $ext != "png") {
            echo "please select jpg or png file only";
        } elseif ($filesize > 500) {
            echo "File size must be less than or equalto 50 KB";
        } else {
            move_uploaded_file($temppath, $filepath);
            $query = "update planeinfo set planePhoto='$filepath' , planeName='$flightname' where pid=$pid ";
            echo $query;
            mysqli_query($con, $query);
            echo "DATA UPDATED";
        }
    } else {
        $query = "update planeinfo set planeName='$flightname' where pid=$pid";
        mysqli_query($con, $query);
        echo "DATA UPDATED";
    }
}



if (isset($_POST['btnUpdateFlight'])) {
    $flightname = $_POST["flightName"];
    $fid = $_POST["fid"];
    $sourceCity = $_POST["sourceCity1"];
    $destinationCity = $_POST["destinationCity1"];
    $businessPrice = $_POST["businessPrice"];
    $economyPrice = $_POST["economyPrice"];
    $monday = $_POST["monday"];
    $tuesday = $_POST["tuesday"];
    $wednesday = $_POST["wednesday"];
    $thursday = $_POST["thursday"];
    $friday = $_POST["friday"];
    $saturday = $_POST["saturday"];
    $sunday = $_POST["sunday"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $aircraft = $_POST["aircraft"];

    /*FILE UPLOAD*/
    if (isset($_FILES["photoUpload"])) {
        $name = $_FILES["photoUpload"]["name"];
        $temppath = $_FILES["photoUpload"]["tmp_name"];
        // echo $name,"<br>";
        //echo $temppath,"<br>";
        $filesize = round($_FILES["photoUpload"]["size"] / 1024, 2);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $filepath = "flightInfo/$name";
        if ($ext != "jpg" and $ext != "png") {
            echo "please select jpg or png file only";
        } elseif ($filesize > 500) {
            echo "File size must be less than or equalto 50 KB";
        } else {
            move_uploaded_file($temppath, $filepath);
            $query = "update flight set flightname='$flightname' , sourcecity=$sourceCity, destinationCity=$destinationCity,economyClass=$economyPrice,businessClass=$businessPrice,monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday',sunday='$sunday',startTime='$startTime',endTime='$endTime',aircraft='$aircraft' where fid=$fid ";

            mysqli_query($con, $query);
            echo "DATA UPDATED";
        }
    } else {
        $query = "update flight set flightname='$flightname' , sourcecity=$sourceCity, destinationCity=$destinationCity,economyClass=$economyPrice,businessClass=$businessPrice,monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday',sunday='$sunday',startTime='$startTime',endTime='$endTime',aircraft='$aircraft' where fid=$fid ";

        mysqli_query($con, $query);
        echo "DATA UPDATED";
    }
}


if (isset($_POST['deleteData'])) {
    $flightname = $_POST["flightname"];
    $pid = $_POST["pid"];
    $query = "delete from planeInfo where pid=$pid";
    echo $query;
    $result = mysqli_query($con, $query);
    echo "Data Deleted";

}


if (isset($_POST['deleteFlightEntry'])) {
    $fid = $_POST["fid"];
    $query = "delete from flight where fid=$fid";
    $result = mysqli_query($con, $query);
    echo "Data Deleted";

}

if(isset($_REQUEST["sourceCity"]))
{
    $souceCity=$_REQUEST["sourceCity"];
    $query="Select * from flight inner join cityCredentials on cityCredentials.id=flight.sourceCity['$sourceCity']";
    $result=mysqli_query($con,$query);
    $ar = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($ar, $row);
    }
    echo json_encode($ar);

}


    ?>


