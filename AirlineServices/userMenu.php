<script>
    function userLogout()
    {
        var msg="ARE YOU SURE TO LOGOUT?";
        if(confirm(msg)) {
            var httpreg = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append("checkUserLogout", "checkUserLogout");
            httpreg.open("post", "checksignup.php", true);
            httpreg.send(formdata);
            httpreg.onreadystatechange = function () {
                if (this.status == 200 && this.readyState == 4) {
                    alert(this.response);
                    window.location.assign("index.php");


                }
            };
        }

    }
</script>

<ul class="nav navbar-nav">
    <li><a href="index.php"><span class="fa fa-home banner-nav" aria-hidden="true"></span>Home</a></li>
    <li class="active"><a href="about.php"><span class="fa fa-info-circle banner-nav" aria-hidden="true"></span>About</a></li>
    <li><a href="contact.php"><span class="fa fa-envelope-o banner-nav" aria-hidden="true"></span>Contact</a></li>
    <li><span onclick="userLogout()" style="cursor:pointer"><span class="fa fa-user"><?php
            echo $_SESSION["userLogin"]
            ?></span><h2 class="text text-primary" style="font-weight: bold">Log Out</h2></li>
</ul>