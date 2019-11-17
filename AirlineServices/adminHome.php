<?php
@session_start();
if(!(isset($_SESSION['adminLogin']) &&isset($_SESSION['adminPassword'])))
{
    header("location:index.php");

}

?>
<script>
    function adminLogout()
    {
        var msg="ARE YOU SURE TO LOGOUT?";
        if(confirm(msg)) {
            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append("checkAdminLogout", "checkAdminLogout");
            httpreg.open("post", "checksignup.php", true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    window.location.assign("index.php");


                }
            };
        }

    }
</script>
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

    </script>

</head>
<body>
<?php
include_once "adminheader.php";
?>
<h1>WELCOME TO ADMIN HOME

</h1>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</body>
<?php
include_once "footer.php"
?>
</html>
