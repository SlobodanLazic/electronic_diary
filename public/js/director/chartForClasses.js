// Get data by using ajax call to comunnicate with Grades controller
function loadGrades(idSchoolClass) {
    $.ajax({
        url: 'http://localhost/electronic_diary/grades/displayAvgGRadeByClasses',
        method: "POST",
        data: {"idSchoolClass":idSchoolClass},
        dataType: 'json',
        success: function (data) {

            var data = data;
            console.log(data);
            // Themes begin
            // Using default theme
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.createFromConfig({

                "data": data,

                "xAxes": [{
                    "type": "ValueAxis"
                }],

                "yAxes": [{
                    "type": "CategoryAxis",
                    "dataFields": {
                        "category": "name"
                    },
                    "numberFormatter": {
                        "numberFormat": "#"
                    },
                    "renderer": {
                        "inversed": true
                    }
                }],

                "series": [{
                    "type": "ColumnSeries3D",
                    "dataFields": {
                        "valueX": "avg_grade",
                        "categoryY": "name"
                    },
                    "name": "Income",
                    "columns": {
                        "propertyFields": {
                            "fill": "color"
                        },
                        "tooltipText": "{valueX}",
                        "column3D": {
                            "stroke": "#fff",
                            "strokeOpacity": 0.2
                        }
                    }
                }]
            }, "chartdiv", am4charts.XYChart3D);

        }
    });
}
//Ajax call when page is loaded
$(document).ready(function () {
    var idSchoolClass = $('#inlineFormCustomSelectPref').children('option:selected').val();
    loadGrades(idSchoolClass);
});