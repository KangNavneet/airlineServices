<?php
include_once "headerfiles.html"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        $(document).ready(function()
        {
            getData();
        });
        function getData()
        {

            var formdata=new FormData();
            var httpreg=new XMLHttpRequest();
            formdata.append("getAdmin","getAdmin");

            httpreg.onreadystatechange=function(){
                if(this.status==200 && this.readyState==4)
                {
                    var rs=JSON.parse(this.response);
                    var tab="";
                    var tab = "<div class='row'>";

                    for(var i in rs)
                    {
                        tab += "<div class='col-lg-3 col-md-4 col-sm-6 mt-2 mb-2'>";
                        tab += "<div class='card text-center' style='min-height: 350px; max-height: 350px;'>";

                        var obj=rs[i];

                        tab+="<h1>"+obj.name+"</h1>";
                        tab+="<h2>"+obj.Email+"</h2>";

                        tab+="<h3>"+obj.usertype+"</h3>";
                        tab+="<span class='fa fa-trash text-danger'></span>";
                        tab+="<span class='fa fa-edit text-warning'></span>";

                        tab+="</div>";
                        tab+="</div>";

                    }
                    tab+="</div>";





                    document.getElementById("contentAdd").innerHTML=tab;
                }
            };
            httpreg.open("POST", "checksignup.php",true);
            httpreg.send(formdata)




        }


    </script>
</head>




<body>
<div class="container">
    <div class="row">

        <div id="contentAdd">


        </div>

    </div>
</div>


</body>
</html>