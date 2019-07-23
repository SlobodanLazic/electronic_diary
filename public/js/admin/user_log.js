$(document).ready(function () {
    var entireRow = $('.row');
    
    
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

                for (let i = 0; i < data.length; i++) {
                    
                    for (const jsonKey in data[i]) {
                        var logSection = document.createElement("div");
                        // for each json object it adds format of text like this key: value 
                        var contentOfDiv = jsonKey + ": " + data[i][jsonKey] + " ";
                        // created text out of Json data
                        var logDataText = document.createTextNode(contentOfDiv);

                        if ( jsonKey === 'id_user') {
                            // we will not show id_user on the page
                            continue;
                        } else if ( jsonKey === 'logout_time') {
                            
                            var lastLoggedOutTime = data[i][jsonKey];
                            
                            // added logout-time class so we can compare logout time to current time
                            logSection.setAttribute("class","col-lg-3 border-bottom pb-1 logout-time");
                        } else {
                            logSection.setAttribute("class","col-lg-3 border-bottom pb-1");
                        }
                        
                        // filled each logSection with text into logSection with class column
                        logSection.appendChild(logDataText);
                        // filled entire row with all columns and their data
                        entireRow.append(logSection);
                    }
                        if (lastLoggedOutTime < currentTimeAndDate) {
                            
                        }

                        /* var spanActivity = document.createElement("span");
                        spanActivity.setAttribute("class","rounded-circle bg-success");
                        var logoutTimes = document.getElementsByClassName("logout-time");
                        console.log(spanActivity);
                        for (const key in logoutTimes) {
                            logoutTimes.append(spanActivity);
                        } */
                }
                
            }
        });

    }
    
});