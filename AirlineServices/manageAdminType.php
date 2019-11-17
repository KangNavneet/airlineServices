<?php
include_once "headerfiles.html";

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

    <script>
        $(document).ready(function () {
            getData();
        });


        function updateModal(email, name, admintype,mobile) {



                $("#myModal").modal('show');
                $("#username").val(email);
                $("#name").val(name);
                $("#admintype").val(admintype);
                $("#mobileno").val(mobile);




        }

        function updateData() {
            $("#formUpdate").validate();
            if ($("#formUpdate").valid()) {
                var formdata = new FormData();
                var controls = document.getElementById("formUpdate").elements;
                for (var i = 0; i < controls.length; i++) {
                    formdata.append(controls[i].name, controls[i].value);
                    console.log(controls[i].name, controls[i].value);
                }

                var httpreg = new XMLHttpRequest();
                httpreg.onreadystatechange = function () {
                    if (this.status == 200 && this.readyState == 4) {
                        document.getElementById("updateMsg").innerHTML = this.response;
                        getData();
                        $("#username").val("");
                        $("#name").val("");
                        $("#admintype").val("");
                        $("#mobile").val("");
                        $("#updateMsg").html('');

                        document.getElementById("updateMsg").innerHTML = this.response;
                        $("#myModal").modal('hide');

                        $("#updateDialog").modal('show');

                        setTimeout(function () {
                            $("#updateDialog").modal('hide');
                        }, 2000);

                    }
                };
                httpreg.open("post", "checksignup.php", true);
                httpreg.send(formdata);
            }
        }

        function deleteData(obj) {
            if (confirm("ARE YOU SURE TO DELETE?")) {

                var formdata = new FormData();
                var httpreg = new XMLHttpRequest();

                formdata.append("getAdminDelete", "getAdminDelete");
                formdata.append("email", obj);
                httpreg.open("POST", "checksignup.php", true);
                httpreg.send(formdata);
                httpreg.onreadystatechange = function () {
                    if (this.status == 200 && this.readyState == 4) {

                        document.getElementById("result").innerHTML = this.response;
                        getData();

                    }
                }


            }


        }


        function getData() {

            $("#formUpdate").validate();
            if ($("#formUpdate").valid()) {

                var formdata = new FormData();
                var httpreg = new XMLHttpRequest();
                formdata.append("getAdmin", "getAdmin");

                httpreg.onreadystatechange = function () {
                    if (this.status == 200 && this.readyState == 4) {
                        var rs = JSON.parse(this.response);
                        var tab = "";
                        var entry;


                        for (var i in rs) {
                            tab += "<div class='row'>";
                            tab += "<tr>";
                            var obj = rs[i];
                            tab += "<td>" + obj.name.toUpperCase() + "</td>";
                            tab += "<td>" + obj.Email.toUpperCase()  + "</td>";
                            tab += "<td>" + obj.mobile.toUpperCase()  + "</td>";

                            tab += "<td>" + obj.usertype.toUpperCase()  + "</td>";
                            tab += "<td><div class='fa fa-trash' style='cursor:pointer' onclick='deleteData(\"" + obj.Email + "\")'</div></td>";
                            entry = '"' + obj.Email + '","' + obj.name + '","' + obj.usertype + '","'+obj.mobile+'"';
                            tab += "<td><div class='fa fa-edit'style='cursor: pointer' onclick='updateModal(" + entry + ")'></div></td>";
                            tab += "</tr>";
                            tab += "</hr>";
                            tab += "</div>";
                            tab += "</div>";

                        }


                        document.getElementById("result").innerHTML = tab;
                    }
                };
                httpreg.open("POST", "checksignup.php", true);
                httpreg.send(formdata)


            }

        }


    </script>
</head>

<body>
<?php

include_once "adminheader.php";
?>
<div class="container mt-4" style="box-shadow: 15px 15px 15px rgba(0,0,0,0.7);border-radius:2px 25px 25px;border:0.2px solid #ff7600">

    <div class="row">
        <table class="table table-info" >
            <caption style="caption-side: top;font-weight:bold;text-align: center">Manage Admin Panel</caption>
            <thead class="thead-dark">
            <th>NAME</th>
            <th>USERNAME</th>
            <th>Mobile Number</th>
            <th>USER TYPE</th>
            <th colspan="2">Controls</th>
            </thead>

            <tbody id="contentAdd" style=";font-variant:small-caps">

            </tbody>
            <tfoot id="result">

            </tfoot>
        </table>

    </div>

    <!-------------DATA UPDATE MODAL------------->

    <!-- Modal -->
    <div id="updateDialog" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">UPDATE MODAL</h4>
                </div>
                <div class="modal-body">
                    <div id="updateMsg" class="text-danger"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">UPDATE FORM</h4>
                </div>
                <div class="modal-body">
                    <!----------------CONTENT ADDITION--------------------->

                    <div class="container mt-3">

                        <form class="formvalidation" id="formUpdate" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" data-rule-required="true" name="username" id="username"
                                       class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" data-rule-required="true" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>USERTYPE</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" data-rule-required="true" name="admintype"
                                                id="admintype">
                                            <option value="">SELECT CATEGORY</option>
                                            <option value="admin">Admin</option>
                                            <option value="subAdmin">Sub Admin</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>MOBILE NO.</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" data-rule-required="true" name="mobileno" id="mobileno" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!---->
                                <!--            <button type="button" id="btnlogin" name="submit" value="Login" onclick="checklogin()"-->
                                <!--                    class="btn btn-primary">Login-->
                                <!--            </button>-->
                                <button type="button" id="btnUpdateAdmin" name="btnUpdateAdmin" value="btnUpdateAdmin"
                                        class="btn btn-danger" onclick="updateData()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">UPDATE DATA
                                </button>
                                <label id="result"></label>
                            </div>


                        </form>
                    </div>


                    <!---------------------CONTENT ADDITION ENDS HERE------------------>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


</div>

</body>
<?php
include_once "footer.php"
?>

</html>