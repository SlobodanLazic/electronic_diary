am4core.ready(function () {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart3D);

    // Add data
    chart.data = [{
            "subject": 'Srpski jezik i Knjizevnost',
            "income": 23.5,
            "color": chart.colors.next()
        }, {
            "subject": 'Likovno',
            "income": 26.2,
            "color": chart.colors.next()
        }, {
            "subject": 'Engleski jezik',
            "income": 30.1,
            "color": chart.colors.next()
        }, {
            "subject": 'Geografija',
            "income": 29.5,
            "color": chart.colors.next()
        }, {
            "subject": 'Istorija',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Matematika',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Biologija',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Fizicko vaspitanje',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Informatika',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Veronauka',
            "income": 24.6,
            "color": chart.colors.next()
        }, {
            "subject": 'Hemija',
            "income": 24.7,
            "color": chart.colors.next()
        }

    ];

    // Create axes
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "subject";
    categoryAxis.numberFormatter.numberFormat = "#";
    categoryAxis.renderer.inversed = true;

    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueX = "income";
    series.dataFields.categoryY = "subject";
    series.name = "Income";
    series.columns.template.propertyFields.fill = "color";
    series.columns.template.tooltipText = "{valueX}";
    series.columns.template.column3D.stroke = am4core.color("#fff");
    series.columns.template.column3D.strokeOpacity = 0.2;

}); // end am4core.ready()