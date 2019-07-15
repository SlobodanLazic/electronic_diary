let xhttp = new XMLHttpRequest();
if (window.XMLHttpRequest) {
    let xhttp = new XMLHttpRequest();
} else {
    let xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}




function aprove(id_meeting) {



    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (xhttp.readyState == 4) {

            alert('Status updated');


        }

    }

    xhttp.open("POST", "http://localhost/electronic_diary/meetings/updatemeetingstatus", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var inputFromTeacher1 = "status=1&id_meeting=" + id_meeting;

    xhttp.send(inputFromTeacher1);
}



function un_aprove(id_meeting) {

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (xhttp.readyState == 4) {
            alert('Status upadted');
        }

    }

    xhttp.open("POST", "http://localhost/electronic_diary/meetings/updatemeetingstatus", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var inputFromTeacher2 = "status=0&id_meeting=" + id_meeting;

    xhttp.send(inputFromTeacher2);

}