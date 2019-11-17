
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

        function checkLogIn() {
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
                      var response=this.response;

                      if(response=="Success")
                      {
                          //document.getElementById("result").innerHTML= '<div class="form-control text-danger">' + this.response + '</div>'
                          window.location.assign("adminHome.php");
                      }
                      else
                      {
                          document.getElementById("result").innerHTML= '<div class="form-control text-danger">' + this.response + '</div>'
                      }


                    }
                };


                httpreg.open("POST", "checksignup.php", true);
                httpreg.send(formdata)
            }
        }
    </script>
<style>
    a{
        padding: 10px;
        text-decoration: none;
        color:red;
        font-size: 20px;
        display: inline;
    }
    a:hover
    {
        text-decoration: none;
        text-shadow: #721c24;
        box-shadow: #721c24;

    }
</style>
</head>
<body>

<?php
include_once "publicheader.php";
?>
<div class="container mt-3" style="box-shadow:15px 15px 15px rgba(0,0,0,0.7);border-radius:5px 25px 25px;border:0.2px solid #ff7600;margin-top:2px">

    <h1 style="text-align: center">ADMIN LOGIN</h1>
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
            <button type="button" id="btnsignup" name="checklogin" value="checklogin"
                    class="btn btn-danger" onclick="checkLogIn()" style="box-shadow: 5px 5px rgb(23, 9, 51);
                    padding: 10px; font-weight: bold;text-shadow: #9c1f7f;">LOG IN</button>
            <a href="changePassword.php">Forgot Password</a>
            <label id="result"></label>
        </div>


    </form>
    <br/>
    <br/>
    <br/>
</div>
<?php
include_once "footer.php"
?>
</body>

</html>