<?php
include_once "publicheader.php";
include_once "headerfiles.html";

@session_start();
if (!isset($_SESSION['userLogin'])) {
    header("location:index.php");
}

?>
<script>

</script>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>USER HOME PAGE</h1>
<p>USER HOME DATA</p>


</body>
<?php
include_once "footer.php"
?>
</html>