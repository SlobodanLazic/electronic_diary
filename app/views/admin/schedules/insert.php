<?php require APPROOT . '/views/inc/admin/header.php'; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Schedules
                </h1>
                <form action="<?php echo URLROOT; ?>/schedules/insert" method="POST">
                    <table class="table">
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
                                    <input type="text" name='a1' size="12">

                                    <input type="hidden" id="1" name="class_num1" value="1">
                                </td>
                                <td>
                                    <input type="text" name='b1' size="12">

                                    <input type="hidden" name="class_num1" value="1">

                                </td>
                                <td>
                                    <input type="text" name='c1' size="12">

                                    <input type="hidden" name="class_num1" value="1">

                                </td>
                                <td>
                                    <input type="text" name='d1' size="12">

                                    <input type="hidden" name="class_num1" value="1">

                                </td>
                                <td>
                                    <input type="text" name='e1' size="12">

                                    <input type="hidden" name="class_num1" value="1">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    <input type="text" name='a2' size="12">

                                    <input type="hidden" id="1" name="class_num2" value="2">
                                </td>
                                <td>
                                    <input type="text" name='b2' size="12">
                                    <input type="hidden" id="1" name="class_num2" value="2">
                                </td>
                                <td>
                                    <input type="text" name='c2' size="12">
                                    <input type="hidden" id="1" name="class_num2" value="2">

                                </td>
                                <td>
                                    <input type="text" name='d2' size="12">
                                    <input type="hidden" name="class_num2" value="2">

                                </td>
                                <td>
                                    <input type="text" name='e2' size="12">

                                    <input type="hidden" name="class_num2" value="2">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <input type="text" name='a3' size="12">

                                    <input type="hidden" id="1" name="class_num3" value="3">
                                </td>
                                <td>
                                    <input type="text" name='b3' size="12">
                                    <input type="hidden" id="1" name="class_num3" value="3">
                                </td>
                                <td>
                                    <input type="text" name='c3' size="12">
                                    <input type="hidden" id="1" name="class_num3" value="3">
                                </td>
                                <td>
                                    <input type="text" name='d3' size="12">

                                    <input type="hidden" id="1" name="class_num3" value="3">

                                </td>
                                <td>
                                    <input type="text" name='e3' size="12">

                                    <input type="hidden" id="1" name="class_num3" value="3">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>
                                    <input type="text" name='a4' size="12">

                                    <input type="hidden" id="1" name="class_num4" value="4">
                                </td>
                                <td>
                                    <input type="text" name='b4' size="12">
                                    <input type="hidden" id="1" name="class_num4" value="4">
                                </td>
                                <td>
                                    <input type="text" name='c4' size="12">
                                    <input type="hidden" id="1" name="class_num4" value="4">

                                </td>
                                <td>
                                    <input type="text" name='d4' size="12">

                                    <input type="hidden" id="1" name="class_num4" value="4">
                                </td>
                                <td>
                                    <input type="text" name='e4' size="12">

                                    <input type="hidden" id="1" name="class_num4" value="4">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>
                                    <input type="text" name='a5' size="12">

                                    <input type="hidden" id="1" name="class_num5" value="5">
                                </td>
                                <td>
                                    <input type="text" name='b5' size="12">
                                    <input type="hidden" id="1" name="class_num5" value="5">
                                </td>
                                </td>
                                <td>
                                    <input type="text" name='c5' size="12">
                                    <input type="hidden" id="1" name="class_num5" value="5">

                                </td>
                                <td>
                                    <input type="text" name='d5' size="12">

                                    <input type="hidden" id="1" name="class_num5" value="5">
                                </td>
                                <td>
                                    <input type="text" name='e5' size="12">

                                    <input type="hidden" id="1" name="class_num5" value="5">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>
                                    <input type="text" name='a6' size="12">

                                    <input type="hidden" id="1" name="class_num6" value="6">
                                </td>
                                <td>
                                    <input type="text" name='b6' size="12">
                                    <input type="hidden" id="1" name="class_num6" value="6">
                                </td>
                                <td>
                                    <input type="text" name='c6' size="12">
                                    <input type="hidden" id="1" name="class_num6" value="6">

                                </td>
                                <td>
                                    <input type="text" name='d6' size="12">

                                    <input type="hidden" id="1" name="class_num6" value="6">
                                </td>
                                <td>
                                    <input type="text" name='e6' size="12">

                                    <input type="hidden" id="1" name="class_num6" value="6">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>
                                    <input type="text" name='a7' size="12">

                                    <input type="hidden" id="1" name="class_num7" value="7">
                                </td>
                                <td>
                                    <input type="text" name='b7' size="12">
                                    <input type="hidden" id="1" name="class_num7" value="7">
                                </td>
                                <td>
                                    <input type="text" name='c7' size="12">
                                    <input type="hidden" id="1" name="class_num7" value="7">
                                </td>
                                <td>
                                    <input type="text" name='d7' size="12">

                                    <input type="hidden" id="1" name="class_num7" value="7">
                                </td>
                                <td>
                                    <input type="text" name='e7' size="12">

                                    <input type="hidden" id="1" name="class_num7" value="7">
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="form-group">


                        <label for="id_school_class">Student Class<sup>*</sup></label>
                        <select name="id_school_class" id="id_school_class" class="form-control form-control-lg">
                            <option value='0' selected>.....Select a class.....</option>
                            <?php foreach ($data['classes'] as $class) : ?>

                                <?php echo "<option value=\"$class->id_school_class\">$class->name</option>"; ?>

                            <?php endforeach; ?>

                        </select>

                    </div>
                    <input type="hidden" name="day1" value="1">
                    <input type="hidden" name="day2" value="2">
                    <input type="hidden" name="day3" value="3">
                    <input type="hidden" name="day4" value="4">
                    <input type="hidden" name="day5" value="5">
                    <!-- <input type="hidden" name="class_id" value="3"> -->
                    <input type="submit" name="insert" value="Insert">

                </form>
            </div> <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require APPROOT . '/views/inc/admin/footer.php'; ?>