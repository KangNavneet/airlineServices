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
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <?php
            $rows = array("A", "B", " ", "C", "D");
            for ($i= 1; $i <= 9; $i++) {
                ?>
                <div class="row">
                    <?php
                    for ($j = 0; $j< 5; $j++) {
                        if ($j != 2) {
                            ?>
                            <div class="col-md-2"><input type="button" class="btn btn-primary" title="Business"
                                                         value="<?php echo $rows[$j] . " " . $i; ?>"></div>
                            <?php
                        }
                    }
                    ?>
                </div>

                <?php
            }
            ?>
            <div class="row">
                <div class="col-md-12"><h1 class="text-danger"><span class="fa fa-flash"></span> Economy Class</h1></div>
            </div>
            <?php
            $rows = array("A", "B", "C", " ", "D", "E", "F");
            for ($i = 1; $i <= 9; $i++) {
                ?>
                <div class="row">
                    <?php
                    for ($j = 0; $j < 7; $j++) {
                        if ($j != 3) {
                            ?>
                            <div class="col-md-1"><input type="button" class="btn btn-danger" title="Economy"
                                                         value="<?php echo $rows[$j] . " " . $i; ?>"></div>
                            <?php
                        } else {
                            ?>
                            <div class="col-md-1"></div>
                            <?php

                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>