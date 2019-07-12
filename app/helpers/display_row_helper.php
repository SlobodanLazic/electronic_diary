<?php

function display_row($row, $r = '')
{
    foreach ($row as $r) {

        if (!empty($r->subject_name)) {

            echo "<td>$r->subject_name</td>";
        } else {

            echo  "<td></td>";
        }
    }
}

function display_row_with_link($rowl, $rl = '')
{

    foreach ($rowl as $rl) {

        if (!empty($rl->subject_name)) {

            echo "<td><a href=" . URLROOT . "/schedules/edit/$rl->id_schedules>" . $rl->subject_name . "</a></td>";
        } else {

            echo "<td><a href=" . URLROOT . "/schedules/edit/$rl->id_schedules>" . 'N/A' . "</a></td>";
        }
    }
}
