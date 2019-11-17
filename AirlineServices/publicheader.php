<!--navbar-->
<!--headder-->
<div class="header-w3layouts">
    <div class="container">
        <div class="header-bar">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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

                        <?php
                        @session_start();
                        if(isset($_SESSION["userLogin"]))
                        {
                            include_once "userMenu.php";
                        }
                        else
                        {
                            include_once "menu.php";

                        }
                        ?>



                </div>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--//headder-->
<!--//navbar-->
<!-- banner -->
<div class="inner_page_about">
</div>
<!--//banner -->