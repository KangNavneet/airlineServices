<?php
include_once "headerfiles.html";
include_once "adminheader.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script>
    function changePasswordFun() {
        $("#changePasswordForm").validate();
        if($("#changePasswordForm").valid()) {

            var controls = document.getElementById("changePasswordForm").elements;
            var formdata = new FormData();
            var httpreg = new XMLHttpRequest();
            for (var i = 0; i < controls.length; i++) {
                formdata.append(controls[i].name, controls[i].value);
                console.log(controls[i].name, controls[i].value);
                if(controls[i].name=="email")
                {
                    var email=controls[i].value;
                }
            }
            httpreg.onreadystatechange = function () {
                if(this.status==200 && this.readyState==4)
                {
                    $("#result").html(this.response);
                    var res=this.response;

                    setTimeout(function () {

                        if(res=="OTP SENT")
                        {
                            window.location.assign("otpEntry.php");

                        }

                    }, 3000);

                }

            };
            httpreg.open("post","checksignup.php",true);
            httpreg.send(formdata);

            }

    }
</script>
<body>

<div class="container"  >
   <div class="row">
    <div class="col-sm-4" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-right:90%;margin-top:10%">
    <form method="post" id="changePasswordForm" >
        <div class="form-group">
            <label for="email">ENTER EMAIL</label>
            <input type="email" name="email" id="email" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="button" name="changePassword" value="CHANGE PASSWORD" class="btn btn-danger" onclick="changePasswordFun()"/>
            <div id="result" class="mt-2"></div>
        </div>
    </form>

    </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
</div>


</body>
<?php
include_once "footer.php"
?>
</html>
