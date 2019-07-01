<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <h1 class="page-header">
                Schedules
            </h1>
            <span class="invalid-feedback text-danger"><?php echo $data['class_err']; ?></span>

        </div>


        <form action="<?php echo URLROOT; ?>/schedules/insert" method="POST">
            <div class="col-lg-12">
                <div class="form-group">

                    <div class="row">
                        <div class="col-xs-2">
                            <label for="id_school_class">Student Class<sup>*</sup></label>
                            <select name="id_school_class" id="id_school_class" class="form-control form-control-lg input-medium">
                                <option value='' selected>.....Select a class.....</option>
                                <?php foreach ($data['classes'] as $key => $class) {

                                    if (in_array_r($class->name, $data['schedule_class'])) {

                                        $class->name = '';

                                        if ($class->name == '') {
                                            continue;
                                        }
                                    }

                                    echo "<option value=\"$class->id_school_class\">$class->name</option>";
                                } ?>

                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="day1" value="1">
                    <input type="hidden" name="day2" value="2">
                    <input type="hidden" name="day3" value="3">
                    <input type="hidden" name="day4" value="4">
                    <input type="hidden" name="day5" value="5">

                </div> <!-- formgroup end -->
            </div> <!-- col end -->
            <div class="row">
                <div class="col-6">

                    <div class="table-responsive col-sm">
                        <table class="table-sm ">
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
                                    <th scope="row">1</th>
                                    <td>
                                        <input type="text" class='form-control' name='a1' size="12">

                                        <input type="hidden" id="1" name="class_num1" value="1">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b1' size="12">

                                        <input type="hidden" name="class_num1" value="1">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c1' size="12">

                                        <input type="hidden" name="class_num1" value="1">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d1' size="12">

                                        <input type="hidden" name="class_num1" value="1">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e1' size="12">

                                        <input type="hidden" name="class_num1" value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <input type="text" class='form-control' name='a2' size="12">

                                        <input type="hidden" id="1" name="class_num2" value="2">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b2' size="12">
                                        <input type="hidden" id="1" name="class_num2" value="2">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c2' size="12">
                                        <input type="hidden" id="1" name="class_num2" value="2">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d2' size="12">
                                        <input type="hidden" name="class_num2" value="2">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e2' size="12">

                                        <input type="hidden" name="class_num2" value="2">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <input type="text" class='form-control' name='a3' size="12">

                                        <input type="hidden" id="1" name="class_num3" value="3">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b3' size="12">
                                        <input type="hidden" id="1" name="class_num3" value="3">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c3' size="12">
                                        <input type="hidden" id="1" name="class_num3" value="3">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d3' size="12">

                                        <input type="hidden" id="1" name="class_num3" value="3">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e3' size="12">

                                        <input type="hidden" id="1" name="class_num3" value="3">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        <input type="text" class='form-control' name='a4' size="12">

                                        <input type="hidden" id="1" name="class_num4" value="4">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b4' size="12">
                                        <input type="hidden" id="1" name="class_num4" value="4">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c4' size="12">
                                        <input type="hidden" id="1" name="class_num4" value="4">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d4' size="12">

                                        <input type="hidden" id="1" name="class_num4" value="4">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e4' size="12">

                                        <input type="hidden" id="1" name="class_num4" value="4">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>
                                        <input type="text" class='form-control' name='a5' size="12">

                                        <input type="hidden" id="1" name="class_num5" value="5">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b5' size="12">
                                        <input type="hidden" id="1" name="class_num5" value="5">
                                    </td>
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c5' size="12">
                                        <input type="hidden" id="1" name="class_num5" value="5">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d5' size="12">

                                        <input type="hidden" id="1" name="class_num5" value="5">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e5' size="12">

                                        <input type="hidden" id="1" name="class_num5" value="5">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>
                                        <input type="text" class='form-control' name='a6' size="12">

                                        <input type="hidden" id="1" name="class_num6" value="6">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b6' size="12">
                                        <input type="hidden" id="1" name="class_num6" value="6">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c6' size="12">
                                        <input type="hidden" id="1" name="class_num6" value="6">

                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d6' size="12">

                                        <input type="hidden" id="1" name="class_num6" value="6">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e6' size="12">

                                        <input type="hidden" id="1" name="class_num6" value="6">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>
                                        <input type="text" class='form-control' name='a7' size="12">

                                        <input type="hidden" id="1" name="class_num7" value="7">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='b7' size="12">
                                        <input type="hidden" id="1" name="class_num7" value="7">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='c7' size="12">
                                        <input type="hidden" id="1" name="class_num7" value="7">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='d7' size="12">

                                        <input type="hidden" id="1" name="class_num7" value="7">
                                    </td>
                                    <td>
                                        <input type="text" class='form-control' name='e7' size="12">

                                        <input type="hidden" id="1" name="class_num7" value="7">
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="col">

                    <p>Already inserted schedules for classes</p>

                    <ul class="list-inline">
                        <?php

                        foreach ($data['schedule_class'] as $class) {

                            echo  '<li>' . $class['name'] . '  <i style="color:green;" class="fa fa-check-square">  </i></li>';
                        }

                        ?>
                    </ul>
                </div>
                <div class="col">
                    <div id="subjects_drag">
                        <h2>Drop subject </h2>
                        <div class="list-inline">
                            <?php foreach ($data['subjects'] as $subject) : ?>
                                <?php echo "<div class='list-group-item all-copy list-group-item-success sw-resize text'> $subject->name </div>" ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="row">
        <button class="btn btn-primary btn-lg" type="submit" name="insert">Insert</button>
    </div>
    </form>
</div>






</div> <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



<?php require APPROOT . '/views/inc/admin/footer.php'; ?>