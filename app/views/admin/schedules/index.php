<?php
require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Schedules
                </h1>

                <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="<?php echo URLROOT; ?>/schedules/insert">Insert schedule</a>

                <form action="<?php echo URLROOT; ?>/schedules/show/" method="post">

                    <div class="form-group">
                        <label>Select class:</label>
                        <select name='id_class' class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">


                            <?php foreach ($data['classes'] as $class) : ?>

                                <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                            <?php endforeach; ?>

                        </select>


                        <input type="submit" class="btn btn-success" value="Show">

                    </div>

                </form>


                <?php


                if (isset($data['class_name'])) {

                    foreach ($data['class_name'] as $schedule) {

                        echo "<h2>Selected class: $schedule->name</h2>";
                    }
                }



                if (isset($data['schedules'])) {

                    foreach ($data['schedules'] as $schedule) {


                        if ($schedule->order_id == 1) {


                            $row1[] =  $schedule;
                        }

                        if ($schedule->order_id == 2) {

                            $row2[] =  $schedule;
                        }

                        if ($schedule->order_id == 3) {

                            $row3[] =  $schedule;
                        }
                        if ($schedule->order_id == 4) {

                            $row4[] =  $schedule;
                        }
                        if ($schedule->order_id == 5) {

                            $row5[] =  $schedule;
                        }
                        if ($schedule->order_id == 6) {

                            $row6[] =  $schedule;
                        }
                        if ($schedule->order_id == 7) {

                            $row7[] =  $schedule;
                        }
                    }

                    ?>

                    <div class="table-responsive">
                        <table class="table table-hover bg-info text-warning table-bordered">

                            <thead>

                                <tr>
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
                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$r->id_schedules>" . $r->subject_name . "</a></td>";
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>2</td>";
                                        foreach ($row2 as $v) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$v->id_schedules>" . $v->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>3</td>";
                                        foreach ($row3 as $c) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$c->id_schedules>" . $c->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>4</td>";
                                        foreach ($row4 as $f) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$f->id_schedules>" . $f->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>5</td>";
                                        foreach ($row5 as $e) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$e->id_schedules>" . $e->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>6</td>";
                                        foreach ($row6 as $g) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$g->id_schedules>" . $g->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        echo "<td>7</td>";
                                        foreach ($row7 as $h) {

                                            echo "<td><a href=" . URLROOT . "/schedules/edit/$h->id_schedules>" . $h->subject_name . "</a></td>";
                                        }
                                        ?>
                                    </tr>

                                <?php }
                        } ?>

                        </tbody>
                    </table>

                    <form action="<?php echo URLROOT; ?>/schedules/delete/<?php echo $data['id_clas'] ?? ''; ?>" method="post">

                        <input type="submit" class="btn btn-danger" value="Delete Schedule">

                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->



</div>
<!-- /#page-wrapper -->

<?php require APPROOT . '/views/inc/admin/footer.php'; ?>