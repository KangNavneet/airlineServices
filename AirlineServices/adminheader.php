<!--navbar-->
<!--headder-->
<?php
@session_start();
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


<div class="header-w3layouts">
    <div class="container">
        <div class="header-bar">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.php">Convey
                        </a>
                    </h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li><a href="admin_login.php"><span class="fa fa-home banner-nav" aria-hidden="true"></span>Home</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-user banner-nav" aria-hidden="true"></span>Admin<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="admin.php">Add Admin</a>
                                    </li>
                                    <li>
                                        <a href="manageAdminType.php">View Admin</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cab banner-nav" aria-hidden="true"></span>City<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="cityEntry.php">Add City</a>
                                    </li>
                                    <li>
                                        <a href="cityView.php">View City</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-flash banner-nav" aria-hidden="true"></span>Flight Entry<span
                                            class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="flightEntry.php">Add Flight</a>
                                    </li>
                                    <li>
                                        <a href="flightView.php">View Flight</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cog banner-nav" aria-hidden="true">SETTINGS</span><span
                                            class="caret"></span>
                                </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="changePassword.php">Change Password</a>
                                        </li>
                                        <li>
                                            <span style="cursor: pointer" class="dropdown-item"  onclick="adminLogout()">LOG OUT</span>
                                        </li>
                                    </ul>
                            </li>
                            <li><span onclick="adminLogout()" style="cursor:pointer"><span class="fa fa-user"><?php
                                        echo $_SESSION["adminLogin"]
                                        ?></span><h2 class="text text-primary" style="font-weight: bold">Log Out</h2></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//headder-->
<!--//navbar-->
<!-- banner -->
<div class="inner_page_about">
</div>
<!--//banner -->