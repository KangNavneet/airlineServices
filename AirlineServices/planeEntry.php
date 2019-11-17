
<?php
@session_start();
if(!(isset($_SESSION['adminLogin']) &&isset($_SESSION['adminPassword'])))
{
    header("location:index.php");

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include_once "headerfiles.html";
    ?>
    <script>

        function flightEntryFun(){

            $("#formFlightEntry").validate();
            if($("#formFlightEntry").valid()) {

                var controls = document.getElementById("formFlightEntry").elements;
                var formdata = new FormData();
                var httpreg = new XMLHttpRequest();
                for (var i = 0; i < controls.length; i++) {

                    if(controls[i].type=="file")
                    {
                        formdata.append(controls[i].name, controls[i].files[0]);
                        console.log(controls[i].name, controls[i].files[0]);
                    }
                    else {
                        formdata.append(controls[i].name, controls[i].value);
                        console.log(controls[i].name, controls[i].value);
                    }
                }
                httpreg.onreadystatechange = function () {

                    if (this.status == 200 && this.readyState == 4) {

                        document.getElementById("result").innerHTML
                            =this.response
                    }
                };

                httpreg.open("post", "dataEntry.php", true);
                httpreg.send(formdata)
            }
        }
    </script>

</head>
<body>
<?php
include_once "adminheader.php";
?>
<div class="container mt-3" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;padding-top:22px">

    <form class="formvalidation" id="formFlightEntry" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Flight Name</label>
            <input type="text" data-rule-required="true" name="flightname" id="flightname" class="form-control">
        </div>




        <div class="form-group">
            <label>Flight Icon</label>
            <input type="file" id="photoUpload" name="photoUpload"data-rule-required="true">
        </div>


        <div class="form-group">

            <button type="button" id="btnCityEntry" name="planeEntryData" value="planeEntry"
                    class="btn btn-danger" onclick="flightEntryFun()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">ENTER FLIGHT</button>
        </div>


    </form>
    <div id="result"></div>
</div>

</body>
</html>