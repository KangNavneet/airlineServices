
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

        function checkSignUser() {
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
include_once "publicheader.php";
?>
<div class="container mt-3" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">

    <form class="formvalidation" id="formsignup" method="post">
        <h1 style="text-align: center">USER SIGNUP</h1>
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
            <button type="button" id="btnsignupUser" name="btnsignupUser" value="btnsignupUser"
                    class="btn btn-danger" onclick="checkSignUser()" style="box-shadow: 5px 5px rgb(23, 9, 51);
        padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">SIGN UP</button>
            <label id="result"></label>
        </div>


    </form>
    <br/>
    <br/>
    <br/>
</div>

</body>
<?php
include_once "footer.php"
?>
</html>