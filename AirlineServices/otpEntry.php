
<?php
include_once "headerfiles.html";
include_once "adminheader.php";
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Title</title>

</head>
<script>

    function changePasswordOtp()
    {
        $("#updatepassword").validate();
        if($("#updatepassword").valid()) {
            var controls = document.getElementById("updatepassword").elements;
            var formdata = new FormData();
            var httpreg = new XMLHttpRequest();
            for (var i = 0; i < controls.length; i++) {
                formdata.append(controls[i].name, controls[i].value);
                console.log(controls[i].name, controls[i].value);
            }
            httpreg.open("post","checksignup.php",true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if(this.status==200 && this.readyState==4)
                {
                    document.getElementById("result").innerHTML=this.response;
                    var res=this.response;
                    setTimeout(function () {
                        if(res=="Password Updated")
                        {
                            window.location.assign("admin_login.php");

                        }


                    }, 2000);

                }
            };

        }
    }

</script>
<body>
<div class="container" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:10%">

    <form id="updatepassword" method="post">
        <div class="row">
            <div class="col-sm-4">
                Enter OTP sent on your registered Mobile Number<br>
                <div class="row">
                    <div class="col-sm-2">
                        <input maxlength="1" name="o" data-rule-required="true" data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="1" name="t" data-rule-required="true" data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="1" name="p" data-rule-required="true"  data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="1" name="x" data-rule-required="true"  data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="1" name="y" data-rule-required="true"  data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="1" name="z" data-rule-required="true"  data-msg-required="!" type="text" class="form-control" style="width: 50px">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
            Enter New Password
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
            <input type="password" class="form-control" data-rule-required="true" name="newPassword" id="newPassword">
            <input type="hidden" class="form-control"  name="email" id="email" value=<?php echo $_SESSION['adminLogin']?>>
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    Confirm New Password
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="password" class="form-control" data-rule-equalto="#newPassword" name="conNewPassword">
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="button" onclick="changePasswordOtp()" value="Change password" class="btn btn-danger" name="changePasswordWithOtp" style="box-shadow: 5px 5px rgb(23, 9, 51);
                    padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">
        </div>
        <div id="result" class="text-danger"></div>

    </form>

</div>

</body>
<?php
include_once "footer.php"
?>
</html>