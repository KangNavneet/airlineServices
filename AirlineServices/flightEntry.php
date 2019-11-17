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
    include_once "adminheader.php";
    ?>
    <script>

        $(document).ready(function(){
            getFlightSourceData();
            getFlightDestinationData();
        });

        function getFlightSourceData()
        {
            var formdata = new FormData();
            formdata.append("viewCity","viewCity");
            var httpreg=new XMLHttpRequest();
            httpreg.onreadystatechange=function(){
                if (this.status == 200 && this.readyState == 4) {

                    var rs =JSON.parse(this.response);
                    var tab = "";

                    tab+="<select id='sourceCity' name='sourceCity' class='form-control'>";
                    for (var ar in rs) {

                        var obj = rs[ar];

                        tab += "<option value='"+obj.id+"'>"+obj.cityname +"</option>";
                    }
                    tab+="</select>";
                    document.getElementById("contentSource").innerHTML=tab;

                }
            };
            httpreg.open("POST", "dataEntry.php", true);
            httpreg.send(formdata)


        }
        function getFlightDestinationData()
        {
            var formdata = new FormData();
            formdata.append("viewCity","viewCity");
            var httpreg=new XMLHttpRequest();
            httpreg.onreadystatechange=function(){
                if (this.status == 200 && this.readyState == 4) {

                    var rs =JSON.parse(this.response);
                    var tab = "";

                    tab+="<select id='destinationCity' name='destinationCity' class='form-control'>";
                    for (var ar in rs) {

                        var obj = rs[ar];

                        tab += "<option value='"+obj.id+"'>"+obj.cityname +"</option>";
                    }
                    tab+="</select>";
                    document.getElementById("contentDest").innerHTML=tab;

                }
            };
            httpreg.open("POST", "dataEntry.php", true);
            httpreg.send(formdata)


        }


        function checkFlight() {
            $("#formFlight").validate();
            if($("#formFlight").valid()) {

                var controls = document.getElementById("formFlight").elements;
                var formdata = new FormData();
                var httpreg = new XMLHttpRequest();
                for (var i = 0; i < controls.length; i++) {
                    formdata.append(controls[i].name, controls[i].value);
                    console.log(controls[i].name, controls[i].value);
                }
                httpreg.onreadystatechange = function () {

                    if (this.status == 200 && this.readyState == 4) {

                        document.getElementById("result").innerHTML=this.response;



                    }
                };

                httpreg.open("post", "dataEntry.php", true);
                httpreg.send(formdata)
            }
        }
    </script>

</head>
<body>

<div class="container mt-3" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">

    <form class="formvalidation" id="formFlight" method="post">
        <h1 class="text text-danger text-center">ADD FLIGHT</h1>
        <div class="form-group">
            <label>Flight Name</label>
            <input type="text" data-rule-required="true" name="flightName" id="flightName" class="form-control">
        </div>
        <!------------------------SOURCE AND DESTINATION CITY--------------------->
        <div class="row">
            <div  class="col-sm-6">
        <div class="form-group">
            <label>Source City</label>

                <div id="contentSource"></div>
        </div>
            </div>

            <div  class="col-sm-6">
        <div class="form-group">
            <label>Destination City</label>
                <div id="contentDest"></div>
        </div>
            </div>
        </div>
        <!----------------------SOURCE AND DESTINATION ENDS HERE---------------->



        <div class="row">
            <div class="col-sm-6">
        <div class="form-group">
            <label>Business Price</label>
            <input type="number" data-rule-required="true" name="businessPrice" id="businessPrice" class="form-control">
        </div>
            </div>
            <div class="col-sm-6">
        <div class="form-group">
            <label>Economy Price</label>
            <input type="number" data-rule-required="true" name="economyPrice" id="economyPrice" class="form-control">
        </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            <div class="form-group">
            <label>Monday</label>
            <select id="monday" class="form-control" data-rule-required="true" name="monday">
                <option value="">Select Day</option>
                <option value="yes" >YES</option>
                <option value="no">NO</option>
            </select>
            </div>
             </div>

            <div class="col-sm-3">
        <div class="form-group">
            <label>Tuesday</label>
            <select id="tuesday" class="form-control" data-rule-required="true" name="tuesday">
                <option value="">Select Day</option>
                <option value="yes">YES</option>
                <option value="no">NO</option>
            </select>
        </div>
            </div>

            <div class="col-sm-3">
             <div class="form-group">
            <label>Wednesday</label>
            <select id="wednesday" class="form-control" data-rule-required="true" name="wednesday">
                <option value="">Select Day</option>
                <option value="yes">YES</option>
                <option value="no">NO</option>
            </select>
        </div>
            </div>


           <div class="col-sm-3">

            <div class="form-group">
                <label>Thursday</label>
                <select id="thursday" class="form-control" data-rule-required="true" name="thursday">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
           </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            <div class="form-group">
                <label>Friday</label>
                <select id="friday" class="form-control" data-rule-required="true" name="friday">
                    <option value="">Select Day</option>
                    <option value="yes" >YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
            </div>
            <div class="col-sm-3">
            <div class="form-group">
                <label>Saturday</label>
                <select id="saturday" class="form-control" data-rule-required="true" name="saturday">
                    <option value="">Select Day</option>
                    <option value="yes">YES</option>
                    <option value="no">NO</option>
                </select>
            </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Sunday</label>
                    <select id="sunday" class="form-control" data-rule-required="true" name="sunday">
                        <option value="">Select Day</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6">
        <div class="form-group">
            <label>Start Time</label>
            <input type="time" name="startTime" id="startTime" class="form-control" data-rule-required="true" >
        </div>
            </div>
            <div class="col-sm-6">
        <div class="form-group">
            <label>End Time</label>
            <input type="time"  data-rule-required="true"  name="endTime" id="endTime" class="form-control">
        </div>
            </div>
        </div>

        <div class="form-group">
            <label>Aircraft Number</label>
            <input type="text" id="aircraft" class="form-control" data-rule-required="true" name="aircraft"/>

        </div>



        <div class="form-group">
            <button type="button" id="btnCheckFlight" name="btnFlightCheck" value="btnCheckFlight"
                    class="btn btn-danger" onclick="checkFlight()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">Add Flight</button>
            <label id="result"></label>
        </div>


    </form>
</div>

</body>
<?php
include_once "footer.php"
?>
</html>