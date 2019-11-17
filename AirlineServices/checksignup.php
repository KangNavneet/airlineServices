<?php

include_once "connection.php";
@session_start();


if(isset($_POST["signup"]))
{
$username=$_POST["username"];
$password=$_POST["password"];
$name=$_POST["name"];
$mobileno=$_POST["mobileno"];
$usertype=$_POST["admintype"];


        $query="select * from admin where email='$username'";
        $result=mysqli_query($con,$query);

        if(mysqli_num_rows($result)>0)
        {
            echo "USER ALREADY EXISTS!";



        }
        else
        {
            $query="insert into admin values('$username','$password','$name','$usertype','$mobileno','0')";
            $result=mysqli_query($con,$query);
            echo "DATA INSERTED!";
        }








}

if(isset($_POST['getAdmin']))
{
    $query="select * from admin ORDER BY NAME";
    $result=mysqli_query($con,$query);
    $ar=array();
    while($row=mysqli_fetch_assoc($result))
    {
        array_push($ar,$row);
    }
    echo json_encode($ar);

}


if(isset($_POST['getAdminDelete']))
{
    $username=$_POST["email"];
$query="delete from admin where email='$username'";
$result=mysqli_query($con,$query);
echo "Data Deleted";

}

if(isset($_POST['btnUpdateAdmin']))
{
    $username=$_POST["username"];
    $name=$_POST["name"];
    $admintype=$_POST["admintype"];
    $mobileno=$_POST["mobileno"];
    $query="update admin set email='$username',name='$name',usertype='$admintype' ,mobile='$mobileno' where email='$username'";

    mysqli_query($con,$query);
    echo "DATA UPDATED";

}


if(isset($_POST['checklogin']))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $query="select * from admin where email='$username' and password='$password'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["adminLogin"]=$username;
        $_SESSION["adminPassword"]=$password;
        echo "Success";
    }
    else
    {
     echo "Wrong Username Or Password!";
    }

}


if(isset($_POST['checkloginUser']))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $query="select * from users where email='$username' and password='$password'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["userLogin"]=$username;
        $_SESSION["userPassword"]=$password;

        echo "Success";
    }
    else
    {
        echo "Wrong Username Or Password!";
    }


}



if(isset($_POST["checkAdminLogOut"]))
{
    session_unset($_SESSION['adminLogin']);
    session_unset($_SESSION['adminPassword']);
    session_destroy();
    echo "LOGOUT";
}

if(isset($_POST["checkUserLogout"]))
{
    session_unset($_SESSION['userLogin']);
    session_destroy();
    echo "LOGOUT";
}


if(isset($_POST["changePassword"]))
{
    $username=$_POST["email"];
    $query="select * from admin where email='$username'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["adminLogin"]=$username;
        $otp=random_int(100000,999999);
        $query="update admin set otp='$otp' where email='$username'";
        $result=mysqli_query($con,$query);
        echo "OTP SENT";
    }
    else
    {
        echo "Username Doesn't Exist!";
    }

}

if(isset($_POST["changePasswordUser"]))
{
    $username=$_POST["email"];
    $query="select * from users where email='$username'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $_SESSION["userLogin"]=$username;
        $otp=random_int(100000,999999);
        $query="update users set otp='$otp' where email='$username'";
        $result=mysqli_query($con,$query);
        echo "OTP SENT";
    }
    else
    {
        echo "Username Doesn't Exist!";
    }

}





if(isset($_POST["changePasswordWithOtp"]))
{
    $o=$_POST["o"];
    $t=$_POST["t"];
    $p=$_POST["p"];
    $x=$_POST["x"];
    $y=$_POST["y"];
    $z=$_POST["z"];
    $otp=(string)$o.(string)$t.(string)$p.(string)$x.(string)$y.(string)$z;

    $newPassword=$_POST["newPassword"];
    $email=$_POST["email"];
    $query="select * from admin where email='$email' and otp='$otp' ";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $query="update admin set password='$newPassword' where email='$email'";
        $result=mysqli_query($con,$query);
        unset($_SESSION["adminLogin"]);
        echo "Password Updated";


    }
    else
    {
        echo "Wrong OTP!";
    }


}


if(isset($_POST["changePasswordWithOtpUser"]))
{
    $o=$_POST["o"];
    $t=$_POST["t"];
    $p=$_POST["p"];
    $x=$_POST["x"];
    $y=$_POST["y"];
    $z=$_POST["z"];
    $otp=(string)$o.(string)$t.(string)$p.(string)$x.(string)$y.(string)$z;

    $newPassword=$_POST["newPassword"];
    $email=$_POST["email"];
    $query="select * from users where email='$email' and otp='$otp' ";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)>0)
    {
        $query="update users set password='$newPassword' where email='$email'";
        $result=mysqli_query($con,$query);
        unset($_SESSION["userLogin"]);
        echo "Password Updated";

    }
    else
    {
        echo "Wrong OTP!";
    }


}






if(isset($_POST["btnsignupUser"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $name=$_POST["name"];


    $query="select * from users where email='$username'";
    $result=mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0)
    {
        echo "USER ALREADY EXISTS!";



    }
    else
    {
        $query="insert into users values('$username','$password','$name','0')";
        $result=mysqli_query($con,$query);
        echo "DATA INSERTED!";
    }
}





?>