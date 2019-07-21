$(document).ready(function () {
    var entireRow = $('.row');
    var lastLoggedInTime = $('.logout-time').html();

    setInterval(checkUserActivity(entireRow), 60000);

    function checkUserActivity(entireRow) {
        var currentTimeAndDate = new Date($.now());
        
        $.ajax({
            url : 'http://localhost/electronic_diary/users/showLastLoggedInTime',
            method: 'POST',
            data: '',
            dataType: 'json',
            success: function (data) {
                //Getting all log data from DB
                var data = data;
                console.log(data);

                for (let i = 0; i < data.length; i++) {
                    
                    for (const jsonKey in data[i]) {
                        var div = document.createElement("div");

                        if ( jsonKey === 'id_user') {
                            // we will not show id_user on the page
                            continue;
                        } else if ( jsonKey === 'logout_time') {
                            // added logout-time class so we can compare logout time to current time
                            div.setAttribute("class","col-lg-3 border-bottom pb-1 logout-time");
                        } else {
                            div.setAttribute("class","col-lg-3 border-bottom pb-1");
                        }
                        // for each json object it adds format of text like this key: value 
                        var contentOfDiv = jsonKey + ": " + data[i][jsonKey] + " ";
                        // created text out of Json data
                        var contentDiv = document.createTextNode(contentOfDiv);
                        // filled each div with text into div with class column
                        div.appendChild(contentDiv);
                        // filled entire row with all columns and their data
                        entireRow.append(div);
                    }                  
                    
                }
            }
        });
        
        if (lastLoggedInTime <= currentTimeAndDate) {
            entireRow.setAttribute('bg-success');
        }
    }
    
});