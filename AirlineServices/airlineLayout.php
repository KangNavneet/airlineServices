<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $rows = array("A", "B","", "C", "D");
            for ($i = 1; $i <= 9; $i++) {
                ?>
                <div class="row">
                    <?php
                    for ($j = 0; $j < 5; $j++) {
                        if ($j != 2) {
                            ?>
                            <div class="col-md-2"><input type="button" class="btn btn-primary" id="Business-<?php echo $rows[$j] . " " . $i; ?>" title="Business"
                                                         onclick="chooseSeat(this,<?php echo $row['businessClass']; ?>)"
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
                <div class="col-md-12">Economy Class</div>
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
                            <div class="col-md-1"><input type="button" class="btn btn-danger" id="Economy-<?php echo $rows[$j] . " " . $i; ?>" title="Economy"
                                                         onclick="chooseSeat(this,<?php echo $row['economyClass']; ?>)"
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
    </div>
</div>
</body>
</html>