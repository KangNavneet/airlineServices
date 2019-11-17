<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>
<script src="index.js"></script>
<body>
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
                    <nav>
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
                        include_once "searchFlights.php";

                        ?>

                    </nav>
                </div>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- Slideshow 4 -->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="slider-img w3-oneimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>The</h6>
                            <h4>International <br>Airway</h4>
                            <p>Fly With Us
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-img w3-twoimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>Worldwide</h6>
                            <h4>Biggest <br> Network</h4>
                            <p>The Network Of Flights Is Well Coordinated.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-img w3-threeimg">
                    <div class="container">
                        <div class="slider-info">
                            <h6>Supplying</h6>
                            <h4>Secured<br> Transport</h4>
                            <p>The Service Delivery Is Well Coordinated.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
    <!-- This is here just to demonstrate the callbacks -->
    <!-- <ul class="events">
       <li>Example 4 callback events</li>
       </ul>-->
</div>
<!--//banner-->
<div class="about" id="about">
    <div class="container">
        <div class="about-banner-grids ">
            <div class="col-md-4 left-of-about">
                <h3>What We Do</h3>
                <div class=" about-matter-left">
                    <p>We Provide Best Services.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 about-pic">
            </div>
            <div class="col-md-4 right-of-about">
                <div class="about-airway colo">
                    <p>We Guarantee You Safe Journey
                    </p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6 about-right-info">
        </div>
        <div class=" col-md-6 about-info-air">
            <div class="air-list">
                <h4>Warehousing and Storage</h4>
                <p>Cost Effective Warehousing Facility Is Available.
                </p>
            </div>
            <div class="air-list">
                <h4>Explore Our Facilities</h4>
                <p>Our Facilities Are Quite Wide And Unique.
                </p>
            </div>
            <div class="air-list">
                <h4>International Transport</h4>
                <p>The International Transport is pretty good.EXPLORE IT.
                </p>
            </div>
        </div>
    </div>
</div>
<!--// About-->
<!-- services-->
<div class="services" id="services">
    <h3 class="title clr">Services</h3>
    <div class="banner-bottom-girds">
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
            <div class="white-shadow">
                <div class="white-left">
                    <span class="fa fa-truck banner-icon" aria-hidden="true"></span>
                </div>
                <div class="white-right">
                    <h4>Best Logistic</h4>
                    <p>Back End Logistics is digitally monitored</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr">
            <div class="white-shadow">
                <div class="white-left">
                    <span class="fa fa-clock-o banner-icon" aria-hidden="true"></span>
                </div>
                <div class="white-right">
                    <h4>Fast Delivery</h4>
                    <p>GOOD FAST DELIVERY SERVICE</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
            <div class="white-shadow">
                <div class=" white-left">
                    <span class="fa fa-lock banner-icon" aria-hidden="true"></span>
                </div>
                <div class=" white-right">
                    <h4>Secured Service</h4>
                    <p>All Services Are Secured.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid colo">
            <div class="white-shadow">
                <div class=" white-left">
                    <span class="fa fa-archive banner-icon" aria-hidden="true"></span>
                </div>
                <div class="white-right">
                    <h4>Packing</h4>
                    <p>Pack With Us At Cost Effective Rates</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid gird-ser-clr2">
            <div class="white-shadow">
                <div class="white-right">
                    <div class="white-left">
                        <span class="fa fa-fighter-jet banner-icon" aria-hidden="true"></span>
                    </div>
                    <h4>Fly Anywhere</h4>
                    <p>Get The Wings To Your Flight</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6 its-banner-grid colo">
            <div class="white-shadow">
                <div class="white-right">
                    <div class=" white-left">
                        <span class="fa fa-home banner-icon" aria-hidden="true"></span>
                    </div>
                    <h4>Warehousing </h4>
                    <p>Warehouse Facility</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--// services-->
<!--price table-->
<div class="price-table" id="price">
    <div class="container">
        <h3 class="title">Price-Table</h3>
        <div class="agileits-banner-grids text-center">
            <div class=" col-md-4 col-sm-4 priceing-tag">
                <div class=" clr1 agileits-banner-grid">
                    <h4>Personal</h4>
                    <div class="table_cost">
                        <span class="cost clr-price"> 260$</span>
                    </div>
                    <div class="list-price">
                        <ul>
                            <li>Additional</li>
                            <li>Warehouing</li>
                            <li>Custos Borkerage</li>
                            <li>Unlimited Transfer</li>
                        </ul>
                    </div>
                    <a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 priceing-tag">
                <div class="clr2 agileits-banner-grid">
                    <h4>PROFESSIONAL</h4>
                    <div class="table_cost">
                        <span class="cost"> 150$</span>
                    </div>
                    <div class="list-price">
                        <ul>
                            <li>Additional</li>
                            <li>Warehouing</li>
                            <li>Custos Borkerage</li>
                            <li>Unlimited Transfer</li>
                        </ul>
                    </div>
                    <a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
                </div>
            </div>
            <div class=" col-md-4 col-sm-4 priceing-tag">
                <div class="clr3 agileits-banner-grid">
                    <h4>BUSINESS</h4>
                    <div class="table_cost">
                        <span class="cost clr-price "> 90$</span>
                    </div>
                    <div class="list-price">
                        <ul>
                            <li>Additional</li>
                            <li>Warehouing</li>
                            <li>Custos Borkerage</li>
                            <li>Unlimited Transfer</li>
                        </ul>
                    </div>
                    <a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--//price table-->
<!--testimonials-->
<div class="testimonials colo" id="testimonials">
    <div class="container">
        <h3 class="title clr">testimonials</h3>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="thumbnail adjust1">
                        <div class="col-md-5 col-sm-5 right-says">
                            <img class="img-responsive" src="images/t1.jpg" alt="">
                        </div>
                        <div class="col-md-7 col-sm-7 client-img">
                            <div class="caption">
                                <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>AIRLINE SERVIES YOU TRUST<span class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                </p>
                            </div>
                            <blockquote class="adjust2">
                                <h6>Lois Wlly</h6>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="thumbnail adjust1">
                        <div class="col-md-5 col-sm-5 right-says">
                            <img class="img-responsive" src="images/t2.jpg" alt="">
                        </div>
                        <div class="col-md-7 col-sm-7 client-img">
                            <div class="caption">
                                <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>AIRLINE SERVICES HELPED ME TO GROW MY BUSINESS<span class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                </p>
                            </div>
                            <blockquote class="adjust2">
                                <h6>Max Willson</h6>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="thumbnail adjust1">
                        <div class="col-md-5 col-sm-5 right-says">
                            <img class=" img-responsive" src="images/t3.jpg" alt="">
                        </div>
                        <div class="col-md-7 col-sm-7 client-img">
                            <div class="caption">
                                <p><span class="fa fa-quote-left client-quote" aria-hidden="true"></span>Amazing Food<span class="fa fa-quote-right client-quote" aria-hidden="true"></span>
                                </p>
                            </div>
                            <blockquote class="adjust2">
                                <h6>Kenny East</h6>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <!--<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
               <span class="fa fa-chevron-left"></span> </a>
               <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
               <span class="fa fa-chevron-right"></span> </a>
               </div> </div> -->
            <!--// testimonials-->
        </div>
    </div>
</div>
<!--newsletter -->
<div class="buttom-w3">
    <div class="container">
        <h3 class="title">Newsletter</h3>
    </div>
    <div class="news-info text-center">
        <h4>About The Best Offer</h4>
        <div class="post">
            <form action="#" method="post">
                <div class="letter">
                    <input class="email" type="email" placeholder="Your email..." required="">
                </div>
                <div class="newsletter">
                    <input type="submit" value="Subscribe">
                </div>
            </form>
        </div>
        <div class=" bottom-head text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Etiam sed odio consequat, tristique elit sed, molestie nulla.
            </p>
        </div>
    </div>
</div>
<!--//newsletter -->
<!--partners-->
<div class="parnters" id="parnters">
    <div class="container">
        <h3 class="title clr">Our Partners</h3>
        <div class="flexslider-info">
            <section class="slider side-side">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo2.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo3.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                            </div>
                        </li>
                        <li>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo2.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo3.jpg" alt="logo1" class="img-responsive">
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3 usr-img">
                                <img src="images/logo1.jpg" alt="logo1" class="img-responsive">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </section>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--//partners -->

</body>
<?php
include "footer.php";
?>
</html>
