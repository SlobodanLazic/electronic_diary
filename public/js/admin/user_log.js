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
                var elementsToCreate = { "div" : "div", "table" : "table", "thead": "thead","tbody": "tbody"};
                //creating all required elements
                for (const key in elementsToCreate) {
                    //var elements = document.createElement();
                    
                    function create(tagName, props) {
                        return Object.assign(document.createElement(tagName), (props || {}));
                    }

                    function addingChildElem(parent, child) {
                        if (child) {
                            parent.appendChild(child);
                        }
                        return parent;
                    }
                    var elements = create(elementsToCreate[key]);
                    addedChild = addingChildElem(elements['table'],elements["thead"]);
                    if (key === "div") {
                        elements.setAttribute('class','table-responsive');
                    } else if (key === "table") {
                        elements.setAttribute('class','table-striped');
                    }
                    
                    console.log(addedChild);
                }
                    
                    
                    
                    
                
                // creating a div that and adding bootstrap class that will make the table responsive
                //var divTableResponsive = document.createElement('div');
                //divTableResponsive.setAttribute('class','table-responsive');
                // creating table tag and adding bootstrap class for a stripped table
                //var logTable = document.createElement('table');
                //logTable.setAttribute('class', 'table-striped');
                // creating table head 
                //var logTableHead = document.createElement('thead');
                // creating table body
                //var logTableBody = document.createElement('tbody');
                //logTable.appendChild(logTableHead);
                //logTable.appendChild(logTableBody);
                //divTableResponsive.appendChild(logTable);
                //
                //entireRow.append(logTable);
                //for (let i = 0; i < data.length; i++) {
                //    if (i % 4 == 0) {
                //        var logTableRow = document.createElement('tr');
                //        logTableBody.appendChild(logTableRow);
                //    }
                //    
                //    for (const jsonKey in data[i]) {
                //        var logTableCell = document.createElement("td");
                //        // for each json object it adds format of text like this key: value 
                //        var contentOfDiv = jsonKey + ": " + data[i][jsonKey] + " ";
                //        // created text out of Json data
                //        var logDataText = document.createTextNode(contentOfDiv);
//
                //        if ( jsonKey === 'id_user') {
                //            // we will not show id_user on the page
                //            continue;
                //        } else if ( jsonKey === 'logout_time') {
                //            
                //            var lastLoggedOutTime = data[i][jsonKey];
                //            
                //            // added logout-time class so we can compare logout time to current time
                //            logTableCell.setAttribute("class","col-lg-3 border-bottom pb-1 logout-time");
                //        } else {
                //            logTableCell.setAttribute("class","col-lg-3 border-bottom pb-1");
                //        }
                //        
                //        // filled each logTableCell with text into logTableCell with class column
                //        logTableCell.appendChild(logDataText);
                //        // filled entire row with all columns and their data
                //        entireRow.append(logTableCell);
                //    }
                //    
                //}
                
            } 
        });// end of ajax call

    }
    
});