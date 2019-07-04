var requestOpenDoor = document.getElementById("request-open-door");
// preventing submiting and redirecting to other page
requestOpenDoor.addEventListener("click",function (event) {
    
    event.preventDefault();

    var xhttp = new XMLHttpRequest();

    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function() {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            var response = xhttp.responseText;
            console.log(response);
        }
    };

    xhttp.open("POST", "../app/view/teacher/requests/index.php", true);

    xhttp.send();
    
});