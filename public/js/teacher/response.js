let xhttp = new XMLHttpRequest();
if (window.XMLHttpRequest) {
    let xhttp = new XMLHttpRequest();
} else {
    let xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}

var inputFromTeacher1 = document.getElementById("aprove").value;
var inputFromTeacher2 = document.getElementById("denny").value;

function aprove() {

    console.log(inputFromTeacher1);

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById('responseText').innerHTML = xhttp.responseText;
            console.log(xhttp.responseText);

            if (xhttp.responseText == "Successfully submitted the request") {
                document.getElementById('responseText').setAttribute("class", "alert alert-success");
            } else {
                document.getElementById('responseText').setAttribute("class", "alert alert-danger");
            }
        }
    };

    xhttp.open("POST", "http://localhost/electronic_diary/meetings/add_meeting", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function un_aprove() {

    console.log(inputFromTeacher2);

    // xhttp.onreadystatechange = function () {
    //     if (xhttp.readyState == 4 && xhttp.status == 200) {
    //         document.getElementById('responseText').innerHTML = xhttp.responseText;
    //         console.log(xhttp.responseText);

    //         if (xhttp.responseText == "Successfully submitted the request") {
    //             document.getElementById('responseText').setAttribute("class", "alert alert-success");
    //         } else {
    //             document.getElementById('responseText').setAttribute("class", "alert alert-danger");
    //         }
    //     }
    // };

    // xhttp.open("POST", "http://localhost/electronic_diary/meetings/add_meeting", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // xhttp.send();

}