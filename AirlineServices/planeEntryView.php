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
    img:hover
    {
        transform: scale(1, 2);
    }
    .hoverModal:hover
    {
        transform: scale(1, 1.5);

    }
    .hoverModalFoot:hover
    {
        transform: scale(1, 1.2);

    }

</style>
<script>
    $(document).ready(function () {
        getData();
        var fileName;
        $('input[type="file"]').change(function (e) {

            fileName = URL.createObjectURL(e.target.files[0]);
            $("#photoDisplay").attr('src', fileName);

        });


    });


    function deleteData(flightname,pid) {
        var msg = "ARE YOU SURE TO DELETE " + flightname.toUpperCase() + "?";

        if(confirm(msg)) {

            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append("deletePlaneData", "deletePlaneData");
            formdata.append("pid",pid);
            formdata.append("flightname",flightname);
            httpreg.open("post", "dataEntry.php", true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    alert(this.response);
                    document.getElementById("result").innerHTML = this.response;
                    getData();
                }
            };
        }



    }

    function updateModal(photo, flightname,pid) {
        $("#myModal").modal('show');
        $("#flightname").val(flightname);
        $("#pid").val(pid);
        $("#photoDisplay").attr('src', photo)


    }

    function updateData() {
        $("#updateFormData").validate();
        if($("#updateFormData").valid()) {
            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            var controls = document.getElementById("updateFormData").elements;
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

                    document.getElementById("updateMsg").innerHTML = this.response;
                    getData();
                    setTimeout(function () {
                        $("#updateMsg").html("");
                        $("#myModal").modal('hide');

                    }, 2000);

                }

            }
        }


    }


    function getData() {
        var httpreg = new XMLHttpRequest();
        var formdata = new FormData();
        formdata.append("viewPlane", "viewPlane");

        httpreg.open("post", "dataEntry.php", true);
        httpreg.send(formdata);

        httpreg.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                var rs = JSON.parse(this.response);
                var tab = "";
                var entry;
                tab += "<div class='row'>";
                for (var ar in rs) {
                    tab += "<div class='col-xs-6 col-sm-4 col-md-4 col-lg-3' style='padding-bottom:5px '>";
                    var obj = rs[ar];
                    tab += "<div class='row'>";


                    tab += "<div class='card'>";
                    tab += "<div class='card-header'>";
                    entry = '"' + obj.planePhoto + '","' + obj.planeName + '",pid='+obj.pid;
                    tab += "<span class='fa fa-edit hoverModal' style='float:right;cursor:pointer;' onclick='updateModal(" + entry + ")'></span>";
                    tab += "</div>";
                    tab += "<div class='card-body'>";

                    tab += "<img src='" + obj.planePhoto + "' class='card-img rounded-circle' style='height:120px;width:200px;'>";
                    tab += "<h2>" + obj.planeName+ "</h2>";
                    tab += "</div>";
                    tab += "<div class='card-footer'>";
                    entry =  '"'+obj.planeName + '",' +obj.pid ;

                    tab += "<span class='fa fa-trash hoverModalFoot' style='float:right ;cursor:pointer' onclick='deleteData("  + entry + ")'></span>";

                    tab += "</div>";
                    tab += "</div>";
                    tab += "</div>";
                    tab += "</div>";
                }
                tab += "</div>";

                document.getElementById("content").innerHTML = tab;
            }

        }

    }


</script>
<body>
<div class="container" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">
    <div id="content">
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">UPDATE FLIGHT</h4>
                </div>
                <div class="modal-body">

                    <!-----------MODAL BODY CITY UPDATE CONTENT----------->

                    <div class="container mt-3">

                        <form class="formvalidation" id="updateFormData" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Flight Name</label>
                                <input type="text" data-rule-required="true" name="flightname" id="flightname"
                                       class="form-control">
                                <input type="hidden" name="pid" id="pid" class="form-control">

                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" id="photoUpload" name="photoUpload">
                            </div>

                            <div class="form-group">
                                <button type="button" id="updatePlaneDetail" name="updatePlaneDetail"
                                        value="updatePlaneDetail"
                                        class="btn btn-danger" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;" onclick="updateData()">UPDATE FLIGHT
                                </button>
                                <img id="photoDisplay" style="width:100px;height:100px" class="card-img"/>
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

</body>
</html>
