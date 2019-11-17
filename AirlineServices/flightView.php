<?php
include_once "headerfiles.html";
include_once "adminheader.php";

@session_start();
if (!(isset($_SESSION['adminLogin']) && isset($_SESSION['adminPassword']))) {
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

</head>
<style>

    .form-control {
        width: 100%;
    }

</style>
<script>
    $(document).ready(function () {

        getFlightDestinationData();
        getFlightSourceData();
        getFlightDestinationData1();
        getFlightSourceData1();
    });

    function getFlightSourceData() {
        var formdata = new FormData();
        formdata.append("viewCity", "viewCity");
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {

                var rs = JSON.parse(this.response);
                var tab = "";

                tab += "<select id='sourceCity' name='sourceCity' class='form-control'>";
                for (var ar in rs) {

                    var obj = rs[ar];

                    tab += "<option value='" + obj.id + "'>" + obj.cityname + "</option>";
                }
                tab += "</select>";
                document.getElementById("contentSource1").innerHTML = tab;

            }
        };
        httpreg.open("POST", "dataEntry.php", true);
        httpreg.send(formdata)


    }

    function getFlightDestinationData() {
        var formdata = new FormData();
        formdata.append("viewCity", "viewCity");
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {

                var rs = JSON.parse(this.response);
                var tab = "";

                tab += "<select id='destinationCity' name='destinationCity' class='form-control'>";
                for (var ar in rs) {

                    var obj = rs[ar];

                    tab += "<option value='" + obj.id + "'>" + obj.cityname + "</option>";
                }
                tab += "</select>";
                document.getElementById("contentDest1").innerHTML = tab;

            }
        };
        httpreg.open("POST", "dataEntry.php", true);
        httpreg.send(formdata)


    }

    function getFlightSourceData1() {
        var formdata = new FormData();
        formdata.append("viewCity", "viewCity");
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {

                var rs = JSON.parse(this.response);
                var tab = "";

                tab += "<select id='sourceCity1' name='sourceCity1' class='form-control'>";
                for (var ar in rs) {

                    var obj = rs[ar];

                    tab += "<option value='" + obj.id + "'>" + obj.cityname + "</option>";
                }
                tab += "</select>";
                document.getElementById("contentSource").innerHTML = tab;

            }
        };
        httpreg.open("POST", "dataEntry.php", true);
        httpreg.send(formdata)


    }

    function getFlightDestinationData1() {
        var formdata = new FormData();
        formdata.append("viewCity", "viewCity");
        var httpreg = new XMLHttpRequest();
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {

                var rs = JSON.parse(this.response);
                var tab = "";

                tab += "<select id='destinationCity1' name='destinationCity1' class='form-control'>";
                for (var ar in rs) {

                    var obj = rs[ar];

                    tab += "<option value='" + obj.id + "'>" + obj.cityname + "</option>";
                }
                tab += "</select>";
                document.getElementById("contentDest").innerHTML = tab;

            }
        };
        httpreg.open("POST", "dataEntry.php", true);
        httpreg.send(formdata)


    }


    function deleteData(fid, flightName) {
        var msg = "ARE YOU SURE TO DELETE " + flightName.toUpperCase() + "?";
        if (confirm(msg)) {
            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append("deleteFlightEntry", "deleteFlightEntry");
            formdata.append("fid", fid);
            console.log("deleteFlightEntry", "deleteFlightEntry");
            console.log("fid", fid);

            httpreg.open("post", "dataEntry.php", true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    document.getElementById("result").innerHTML = this.response;
                    getFlightSourceData();
                    getFlightDestinationData();
                    getData(formdata.get("sourceCity"), formdata.get("destinationCity"));
                }
            };
            setTimeout(function () {
                $("#result").html("");
            }, 2000);

        }


    }

    function updateModal(fid, flightname, sourceCity, destinationCity, sourceCityCode, destinationCityCode, businessClass, economyClass, monday, tuesday, wednesday, thursday, friday, saturday, sunday, startTime, endTime, aircraft) {


        $("#myModal").modal('show');
        getFlightDestinationData();
        getFlightSourceData();

        $("#flightName").val(flightname);
        $("#fid").val(fid);
        $("#sourceCity1").val(sourceCityCode);
        $("#sourceCity").val(sourceCityCode);
        $("#destinationCity").val(destinationCityCode);
        $("#destinationCity1").val(destinationCityCode);
        $("#monday").val(monday);
        $("#tuesday").val(tuesday);
        $("#wednesday").val(wednesday);
        $("#thursday").val(thursday);
        $("#friday").val(friday);
        $("#saturday").val(saturday);
        $("#sunday").val(sunday);
        $("#businessPrice").val(businessClass);
        $("#economyPrice").val(economyClass);
        $("#startTime").val(startTime);
        $("#endTime").val(endTime);
        $("#aircraft").val(aircraft);

    }

    function updateFlight() {
        getFlightSourceData();
        getFlightDestinationData();
        $("#updateFormFlight").validate();
        if ($("#updateFormFlight").valid()) {
            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            var controls = document.getElementById("updateFormFlight").elements;
            for (var i = 0; i < controls.length; i++) {
                if (controls[i].type == "file") {
                    if (typeof (controls[i].files[0]) != "undefined") {
                        formdata.append(controls[i].name, controls[i].files[0]);
                        console.log(controls[i].name, controls[i].files[0]);
                    }

                } else {
                    formdata.append(controls[i].name, controls[i].value);
                    console.log(controls[i].name, controls[i].value);
                }

            }
            httpreg.open("post", "dataEntry.php", true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    $("#myModal").modal('hide');
                    $("#sourceCity").val(formdata.get("sourceCity1"));
                    $("#destinationCity").val(formdata.get("destinationCity1"));
                   // console.log("This Time's " + formdata.get("sourceCity1") + " " + formdata.get("destinationCity1"));
                    getData(formdata.get("sourceCity1"), formdata.get("destinationCity1"));

                }

            }
        }


    }


    function getData(sourceCity, destinationCity) {
        var httpreg = new XMLHttpRequest();
        var formdata = new FormData();
        var controls = document.getElementById("formCity").elements;
        for (var i in controls) {
            formdata.append(controls[i].name, controls[i].value);
            console.log(controls[i].name, controls[i].value);
        }
        formdata.append("viewFlightData", "viewFlightData");
        formdata.append("sourceCityData", sourceCity);
        formdata.append("destinationCityData", destinationCity);
        httpreg.open("post", "dataEntry.php", true);
        httpreg.send(formdata);
        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var rs = JSON.parse(this.response);
                var tab = "";
                var tab1 = "";
                var entry;
                var srno = 0;

                for (var ar in rs) {
                    srno++;
                    var obj = rs[ar];

                    tab += "<tr style='font-size:18px;font-variant: small-caps;'>";
                    tab += "<td>" + srno + "</td>";
                    tab += "<td style='color:#9c1f7f;font-family: monospace;font-weight: bold'>" + obj.flightname + "</td>";
                    tab += "<td>₹" + obj.businessClass + "</td>";
                    tab += "<td>₹" + obj.economyClass + "</td>";

                    tab += "<td>" + obj.starttime + "</td>";
                    tab += "<td>" + obj.endtime + "</td>";
                    tab += "<td>" + obj.aircraft.toUpperCase() + "</td>";
                    tab += "<td><div class='fa fa-trash' style='cursor:pointer' onclick='deleteData(" + obj.fid + ",\"" + obj.flightname + "\")'</div></td>";
                    entry = obj.fid + ',"' + obj.flightname + '","' + obj.sourcecityName + '","' + obj.destinationCityName + '",' + obj.sourcecity + "," + obj.destinationCity + "," + obj.businessClass + ',' + obj.economyClass + ',"'
                        + obj.monday + '","' + obj.tuesday + '","' + obj.wednesday + '","' + obj.thursday + '","' + obj.friday + '","' + obj.saturday + '","' + obj.sunday + '","' + obj.starttime + '","' + obj.endtime + '","' + obj.aircraft + '"';
                    tab += "<td><div class='fa fa-edit'style='cursor: pointer' onclick='updateModal(" + entry + ")'></div></td>";
                    tab += "</tr>";

                    tab += '<div class="panel-group" id="accordion">';
                    tab += '<div class="panel panel-default">';

                    tab += ' <div class="panel-heading">';
                    tab += '<h4 class="panel-title">';
                    tab += ' <a style="text-decoration: none;color:#ff0100;font-size:15px;font-weight: bold  "data-toggle="collapse" data-parent="#accordion" href="#collapse' + srno + '">';
                    tab += "Flight Detail";
                    tab += '</a>';
                    tab += '</h4>';
                    tab += '</div>';
                    tab += '</div>';


                    tab += "<tr style='color: #a71d2a' id='collapse" + srno + "' class='panel-collapse collapse in'>";

                    tab += "<th>" + "  " + "</th>";
                    tab += "<th>" + "Monday   " + "</th>";
                    tab += "<th>" + "Tuesday  " + "</th>";
                    tab += "<th>" + "Wednesday" + "</th>";
                    tab += "<th>" + "Thursday " + "</th>";
                    tab += "<th>" + "Friday   " + "</th>";
                    tab += "<th>" + "Saturday " + "</th>";
                    tab += "<th>" + "Sunday" + "</th>";
                    tab += "</tr>";


                    tab += "<tr style='color: #a71d2a;font-style: italic'  id='collapse" + srno + "'class='panel-collapse collapse in'>";
                    tab += "<td> </td>";
                    tab += "<td>" + obj.monday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.tuesday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.wednesday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.thursday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.friday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.saturday.toUpperCase() + "</td>";
                    tab += "<td>" + obj.sunday.toUpperCase() + "</td>";
                    tab += "</tr>";


                    tab += '</div>';
                    tab += '    </div>';
                    tab += '  </div>';


                }


                document.getElementById("contentAdd").innerHTML = tab;
            }

        };

    }


</script>
<body>
<div class="container"
     style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">

    <form id="formCity">
        <h1 class="text text-danger text-center">VIEW FLIGHT</h1>
        <hr/>
        <div class="row">
            <div class="col-sm-4">
                <label>Source City</label>
                <span id="contentSource1" name="contentSource1"></span>
            </div>

            <div class="col-sm-4">
                <label>Destination City</label>
                <div id="contentDest1"></div>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-danger" style="margin-top:22px " onclick="getData()">GO</button>
            </div>
        </div>
    </form>


    <div class="row">
        <table class="table table-light">
            <caption style="caption-side: top;font-weight:bold;text-align: center">Manage Admin Panel</caption>
            <thead class="thead-dark">
            <th>Sr. No</th>
            <th>Flight Name</th>
            <th>Business Class Price</th>
            <th>Economy Class Price</th>
            <th>Start-Time</th>
            <th>End-Time</th>
            <th>Aircraft</th>
            <th colspan="2">Controls</th>
            </thead>

            <tbody id="contentAdd" style=";font-variant:small-caps">

            </tbody>
            <tfoot id="result">

            </tfoot>

        </table>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">UPDATE FLIGHT DETAIL</h4>
                    </div>
                    <div class="modal-body">

                        <!-----------MODAL BODY FLIGHT UPDATE CONTENT----------->

                        <div class="container mt-3">

                            <form class="formvalidation" id="updateFormFlight" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Flight Name</label>
                                            <input type="text" data-rule-required="true" name="flightName"
                                                   id="flightName" class="form-control">
                                            <input type="hidden" name="fid" id="fid" class="form-control">

                                        </div>
                                    </div>
                                    <!------------------------SOURCE AND DESTINATION CITY--------------------->

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Source City</label>

                                            <div id="contentSource"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
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
                                            <input type="number" data-rule-required="true" name="businessPrice"
                                                   id="businessPrice" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Economy Price</label>
                                            <input type="number" data-rule-required="true" name="economyPrice"
                                                   id="economyPrice" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Monday</label>
                                            <select id="monday" class="form-control" data-rule-required="true"
                                                    name="monday">
                                                <option value="">Select Day</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tuesday</label>
                                            <select id="tuesday" class="form-control" data-rule-required="true"
                                                    name="tuesday">
                                                <option value="">Select Day</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Wednesday</label>
                                            <select id="wednesday" class="form-control" data-rule-required="true"
                                                    name="wednesday">
                                                <option value="">Select Day</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-sm-3">

                                        <div class="form-group">
                                            <label>Thursday</label>
                                            <select id="thursday" class="form-control" data-rule-required="true"
                                                    name="thursday">
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
                                            <select id="friday" class="form-control" data-rule-required="true"
                                                    name="friday">
                                                <option value="">Select Day</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Saturday</label>
                                            <select id="saturday" class="form-control" data-rule-required="true"
                                                    name="saturday">
                                                <option value="">Select Day</option>
                                                <option value="yes">YES</option>
                                                <option value="no">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Sunday</label>
                                            <select id="sunday" class="form-control" data-rule-required="true"
                                                    name="sunday">
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
                                            <input type="time" name="startTime" id="startTime" class="form-control"
                                                   data-rule-required="true">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="time" data-rule-required="true" name="endTime" id="endTime"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Aircraft Number</label>
                                    <input type="text" id="aircraft" class="form-control" data-rule-required="true"
                                           name="aircraft"/>

                                </div>


                                <div class="form-group">
                                    <button type="button" id="btnUpdateFlight" name="btnUpdateFlight"
                                            value="btnUpdateFlight"
                                            class="btn btn-danger" onclick="updateFlight()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">UPDATE FLIGHT
                                    </button>
                                    <label id="result"></label>
                                </div>


                            </form>
                            <div id="result"></div>
                        </div>


                        <!-------------MODAL BODY CONTENT ENDS HERE--------->


                    </div>
                    <div class="modal-footer">
                        <div id="updateMsg" class="text-danger"></div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <div id="result"></div>
    </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php

include_once "footer.php"
?>

</body>


</html>
