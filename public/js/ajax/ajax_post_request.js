function LoadPageUsingAjax() {
    var xhttp = new XMLHttpRequest();

    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXobject("Microsoft.XMLHTTP");
    }

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("load_content_by_ajax").innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("POST", "../../../app/views/users/insert.php", true);
    console.log('entered here');
}