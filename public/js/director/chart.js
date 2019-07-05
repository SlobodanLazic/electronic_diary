am4core.ready(function () {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart3D);

    // Add data
    chart.data = [{
        "country": "Fizicko",
        "visits": 4025,
        "color": chart.colors.next()
    }, {
        "country": "Informatika",
        "visits": 1882,
        "color": chart.colors.next()
    }, {
        "country": "Geografija",
        "visits": 1809,
        "color": chart.colors.next()
    }, {
        "country": "Engleski jezik",
        "visits": 1322,
        "color": chart.colors.next()
    }, {
        "country": "Likovno",
        "visits": 1122,
        "color": chart.colors.next()
    }, {
        "country": "Muzicko",
        "visits": 1114,
        "color": chart.colors.next()
    }, {
        "country": "Fizika",
        "visits": 984,
        "color": chart.colors.next()
    }, {
        "country": "Biologija",
        "visits": 711,
        "color": chart.colors.next()
    }, {
        "country": "Matematika",
        "visits": 665,
        "color": chart.colors.next()
    }, {
        "country": "Muzicko",
        "visits": 580,
        "color": chart.colors.next()
    }, {
        "country": "Veronauka",
        "visits": 443,
        "color": chart.colors.next()
    }, {
        "country": "Geografija",
        "visits": 441,
        "color": chart.colors.next()
    }, {
        "country": "Srpski jezik",
        "visits": 395,
        "color": chart.colors.next()
    }, {
        "country": "Nemacki jezik",
        "visits": 386,
        "color": chart.colors.next()
    }, {
        "country": "Gradjansko",
        "visits": 384,
        "color": chart.colors.next()
    }, {
        "country": "Psihologija",
        "visits": 338,
        "color": chart.colors.next()
    }, {
        "country": "Filozofija",
        "visits": 328,
        "color": chart.colors.next()
    }];

    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.labels.template.rotation = 270;
    categoryAxis.renderer.labels.template.hideOversized = false;
    categoryAxis.renderer.minGridDistance = 20;
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.tooltip.label.rotation = 270;
    categoryAxis.tooltip.label.horizontalCenter = "right";
    categoryAxis.tooltip.label.verticalCenter = "middle";

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "Subjects";
    valueAxis.title.fontWeight = "bold";

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueY = "visits";
    series.dataFields.categoryX = "country";
    series.name = "Visits";
    series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = .8;
    series.columns.template.propertyFields.fill = "color";

    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;
    columnTemplate.stroke = am4core.color("#FFFFFF");

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineX.strokeOpacity = 0;
    chart.cursor.lineY.strokeOpacity = 0;

    // Enable export
    chart.exporting.menu = new am4core.ExportMenu();

}); // end am4core.ready()