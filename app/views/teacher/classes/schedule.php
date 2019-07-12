<?php require APPROOT . '/views/inc/teacher/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Schedule</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper dt-bootstrap4">

                                <?php

                                if (isset($data['schedules'])) {

                                    foreach ($data['schedules'] as $schedule) {


                                        if ($schedule->order_id == 1) {


                                            $row1[] = $schedule;
                                        }

                                        if ($schedule->order_id == 2) {

                                            $row2[] = $schedule;
                                        }

                                        if ($schedule->order_id == 3) {

                                            $row3[] = $schedule;
                                        }
                                        if ($schedule->order_id == 4) {

                                            $row4[] = $schedule;
                                        }
                                        if ($schedule->order_id == 5) {

                                            $row5[] = $schedule;
                                        }
                                        if ($schedule->order_id == 6) {

                                            $row6[] = $schedule;
                                        }
                                        if ($schedule->order_id == 7) {

                                            $row7[] = $schedule;
                                        }
                                    }

                                    ?>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">

                                            <thead>

                                                <tr class="bg-dark first_col">
                                                    <th scope="col"></th>
                                                    <th scope="col">Monday</th>
                                                    <th scope="col">Tuesday</th>
                                                    <th scope="col">Wednesday</th>
                                                    <th scope="col">Thursday</th>
                                                    <th scope="col">Friday</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <?php

                                                    if (isset($row1, $row2, $row3, $row4, $row5, $row6, $row7)) {

                                                        echo "<td>1</td>";
                                                        foreach ($row1 as $r) {

                                                            if (!empty($r->subject_name)) {

                                                                echo "<td>$r->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }

                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>2</td>";
                                                        foreach ($row2 as $v) {

                                                            if (!empty($v->subject_name)) {

                                                                echo "<td>$v->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>3</td>";
                                                        foreach ($row3 as $c) {

                                                            if (!empty($c->subject_name)) {

                                                                echo "<td>$c->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>4</td>";
                                                        foreach ($row4 as $f) {

                                                            if (!empty($f->subject_name)) {

                                                                echo "<td>$f->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>5</td>";
                                                        foreach ($row5 as $e) {

                                                            if (!empty($e->subject_name)) {

                                                                echo "<td>$e->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }

                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>6</td>";
                                                        foreach ($row6 as $g) {

                                                            if (!empty($g->subject_name)) {

                                                                echo "<td>$g->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }

                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        echo "<td>7</td>";
                                                        foreach ($row7 as $h) {

                                                            if (!empty($h->subject_name)) {

                                                                echo "<td>$h->subject_name</td>";
                                                            } else {

                                                                echo "<td>N/A</td>";
                                                            }
                                                        }

                                                        ?>
                                                    </tr>

                                                <?php }
                                            } ?>

                                        </tbody>
                                    </table>


                                </div><!-- bt4 end -->
                            </div><!-- table responsive end -->
                        </div><!-- CARD-BODY END -->
                    </div> <!-- /.CARD SHADOW -->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require APPROOT . '/views/inc/teacher/footer.php'; ?>