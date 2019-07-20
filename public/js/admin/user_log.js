$(document).ready(function () {
    idRow = $('.row');
    setInterval(checkUserActivity(idRow), 60000);

    function checkUserActivity(idRow) {
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