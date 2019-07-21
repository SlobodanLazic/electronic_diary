$(document).ready(function () {
    entireRow = $('.row');
    lastLoggedInTime = $('.logout-time').html();
    console.log(lastLoggedInTime);
    setInterval(checkUserActivity(entireRow), 60000);

    function checkUserActivity(entireRow) {
        var currentTimeAndDate = new Date($.now());
        
        $.ajax({
            url : 'http://localhost/electronic_diary/users/show_log',
            method: 'POST',
            data: '',
            dataType: 'text',
            success: function (data) {
                var data = data;
                console.log(currentTimeAndDate);
            }
        });
    }
    
});