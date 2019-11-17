<?php
session_start();
if (!isset($_SESSION["admin_username"])) {
    header("location:admin_login.php");
}
?>

<div class="bg-warning" style="min-height: 100px" id="top">
    <strong>Social Icons</strong>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">-->
    <a href="#" class="navbar-brand"> Website Name</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#menubar1">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menubar1">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                             data-toggle="dropdown" href="#">Courses</a>
                <div class="dropdown-menu">
                    <a href="addcourse.php" class="dropdown-item">Add Course</a>
                    <a href="viewcourses.php" class="dropdown-item">View Courses</a>

                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
                                             data-toggle="dropdown" href="#">Students</a>
                <div class="dropdown-menu">
                    <a href="addstudents.php" class="dropdown-item">Add Student</a>
                    <a href="viewstudents.php" class="dropdown-item">View Students</a>

                </div>
            </li>
            <li class="nav-item">
                <a  class="nav-link"
                   href="adminchangepassword.php">Chang Password</a></li>
            <li class="nav-item">
                <a onclick="return confirm('Are you sure to exit ?')" class="nav-link"
                   href="admin_logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<style>
    body {
        /*padding-top: 80px;*/
    }
</style>
<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links
        $("a").on('click', function (event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
