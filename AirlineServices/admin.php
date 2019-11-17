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

        function checkSign() {
            $("#formsignup").validate();
            if($("#formsignup").valid()) {

                var controls = document.getElementById("formsignup").elements;
                var formdata = new FormData();
                var httpreg = new XMLHttpRequest();
                for (var i = 0; i < controls.length; i++) {
                    formdata.append(controls[i].name, controls[i].value);
                    console.log(controls[i].name, controls[i].value);
                }
                httpreg.onreadystatechange = function () {
                    if (this.status == 200 && this.readyState == 4) {
                        document.getElementById("result").innerHTML
                            = '<div class="form-control text-danger">' + this.response + '</div>'
                        setTimeout(function () {
                            $("#username").val("");
                            $("#password").val("");
                            $("#conpassword").val("");
                            $("#name").val("");
                            $("#admintype").val("");
                            $("#mobileno").val("");
                            $("#result").html('');

                        }, 1000);
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
<div class="container mt-3" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">
    <br/>
    <h1 style="text-align: center">ADMIN SIGNUP</h1>
    <form class="formvalidation" id="formsignup" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" data-rule-required="true" name="username" id="username" class="form-control">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" data-rule-required="true" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password"  data-rule-equalto="#password"  name="conpassword" id="conpassword" class="form-control">
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" data-rule-required="true" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-2">
            <div class="fa fa-user">USERTYPE</div>
                </div>
                <div class="col-sm-4">
            <select class="form-control" data-rule-required="true" name="admintype" id="admintype">
                <option value="">SELECT CATEGORY</option>
                <option  value="admin">Admin</option>
                <option value="subAdmin">Sub Admin</option>
            </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-2">
                    <label>MOBILE NO.</label>
                </div>
            <div class="col-sm-4">
                <input type="text" data-rule-required="true" minlength="10" maxlength="10" name="mobileno" id="mobileno" class="form-control"/>
            </div>
            </div>
        </div>

        <div class="form-group">
            <!---->
            <!--            <button type="button" id="btnlogin" name="submit" value="Login" onclick="checklogin()"-->
            <!--                    class="btn btn-primary">Login-->
            <!--            </button>-->
            <button type="button" id="btnsignup" name="signup" value="signup"
                    class="btn btn-danger" onclick="checkSign()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">SIGN UP</button>
            <label id="result"></label>
        </div>


    </form>
    <br/>
    <br/>
    <br/>
    <br/>
</div>
<?php
include_once "footer.php"
?>
</body>
</html>