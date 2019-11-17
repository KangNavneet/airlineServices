<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <script>

        $(document).ready(function(){
            logout();
        });
        function logout()
        {
            if(confirm("ARE YOU SURE TO LOGOUT?"))
            {
                var formData = new formData();
                formData.append("checkAdminLogOut", "checkAdminLogOut");
                var httpreg = new XMLHttpRequest();
                httpreg.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {

                    }
                };
                httpreg.open("checksignup.php", true);
                httpreg.send(formData);
            }


        }
    </script>
</head>
<body>

</body>
</html>