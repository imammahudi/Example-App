@extends('Layouts.layout')
@section('content')
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-6">
                    <h3 class="mb-0">Graphics RTPO Padang</h3>
                </div>
                {{-- <div class="col-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-9 text-right">
                                <a href="" target="_blank" class="btn btn-sm btn-danger" hidden>Cetak PDF</a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="/create" class="btn btn-sm btn-primary">Add Transaksi</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Styles -->
        <style>
            #chartdiv {
                width: 100%;
                height: 500px;
            }

        </style>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

        <!-- Chart code -->
        <script>
            am4core.ready(function() {

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                // Create chart instance
                var chart = am4core.create("chartdiv", am4charts.XYChart);

                //

                // Increase contrast by taking evey second color
                chart.colors.step = 2;

                // Add data
                chart.data = generateChartData();

                // Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                dateAxis.renderer.minGridDistance = 50;

                // Create series
                function createAxisAndSeries(field, name, opposite, bullet) {
                    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                    if (chart.yAxes.indexOf(valueAxis) != 0) {
                        valueAxis.syncWithAxis = chart.yAxes.getIndex(0);
                    }

                    var series = chart.series.push(new am4charts.LineSeries());
                    series.dataFields.valueY = field;
                    series.dataFields.dateX = "date";
                    series.strokeWidth = 2;
                    series.yAxis = valueAxis;
                    series.name = name;
                    series.tooltipText = "{name}: [bold]{valueY}[/]";
                    series.tensionX = 0.8;
                    series.showOnInit = true;

                    var interfaceColors = new am4core.InterfaceColorSet();

                    switch (bullet) {
                        case "triangle":
                            var bullet = series.bullets.push(new am4charts.Bullet());
                            bullet.width = 12;
                            bullet.height = 12;
                            bullet.horizontalCenter = "middle";
                            bullet.verticalCenter = "middle";

                            var triangle = bullet.createChild(am4core.Triangle);
                            triangle.stroke = interfaceColors.getFor("background");
                            triangle.strokeWidth = 2;
                            triangle.direction = "top";
                            triangle.width = 12;
                            triangle.height = 12;
                            break;
                        case "rectangle":
                            var bullet = series.bullets.push(new am4charts.Bullet());
                            bullet.width = 10;
                            bullet.height = 10;
                            bullet.horizontalCenter = "middle";
                            bullet.verticalCenter = "middle";

                            var rectangle = bullet.createChild(am4core.Rectangle);
                            rectangle.stroke = interfaceColors.getFor("background");
                            rectangle.strokeWidth = 2;
                            rectangle.width = 10;
                            rectangle.height = 10;
                            break;
                        default:
                            var bullet = series.bullets.push(new am4charts.CircleBullet());
                            bullet.circle.stroke = interfaceColors.getFor("background");
                            bullet.circle.strokeWidth = 2;
                            break;
                    }

                    valueAxis.renderer.line.strokeOpacity = 1;
                    valueAxis.renderer.line.strokeWidth = 2;
                    valueAxis.renderer.line.stroke = series.stroke;
                    valueAxis.renderer.labels.template.fill = series.stroke;
                    valueAxis.renderer.opposite = opposite;
                }

                createAxisAndSeries("visits", "2G", false, "circle");
                createAxisAndSeries("views", "3G", true, "triangle");
                createAxisAndSeries("hits", "4G", true, "rectangle");

                // Add legend
                chart.legend = new am4charts.Legend();

                // Add cursor
                chart.cursor = new am4charts.XYCursor();

                // generate some random data, quite different range
                function generateChartData() {
                    var data = '{!! $data !!}';
                    data = JSON.parse(data);

                    var chartData = [];
                    var firstDate = new Date();
                    firstDate.setDate(firstDate.getDate() - 100);
                    firstDate.setHours(0, 0, 0, 0);

                    $.each(data, function(index) {

                        var last = data[index].last_update;
                        var A_2G = data[index].A_2G;
                        var A_3G = data[index].A_3G;
                        var A_4G = data[index].A_4G;

                        console.log(data[index].A_3G);



                        // var visits = 2000;
                        // var hits = 2900;
                        // var views = 8700;

                        // for (var i = 0; i < 15; i++) {
                        //     var newDate = new Date(firstDate);
                        //     newDate.setDate(newDate.getDate() + i);

                            // visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                            // hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                            // views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

                            chartData.push({
                                date: last,
                                visits: A_2G,
                                hits: A_3G,
                                views: A_4G
                            });
                        // }
                    });
                        return chartData;
                  
                }

            }); // end am4core.ready()

        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>
    </div>
@endsection
