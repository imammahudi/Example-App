@extends('Layouts.layout')
@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" type="text/css">


    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Testing Autoload API</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/get-api">
                    @csrf
                    <h6 class="heading-small text-muted mb-4">Pilih RTPO untuk di Monitoring</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Nama RTPO</label>
                                    {{-- <input type="text" id="input-username" class="form-control" placeholder="Username"
                                        value="lucky.jesse"> --}}
                                    <select name="nameRtpo" class="form-select form-control"
                                        aria-label="Default select example">
                                        <option selected>Pilih RTPO</option>
                                        <option value="RTPO PMS">RTPO PMS</option>
                                        <option value="RTPO PADANG">RTPO Padang</option>
                                        <option value="RTPO LHK">RTPO LHK</option>
                                        <option value="RTPO TKN">RTPO TKN</option>
                                        <option value="RTPO BNA">RTPO BNA</option>
                                        <option value="RTPO MBO">RTPO MBO</option>
                                        <option value="RTPO SKL">RTPO SKL</option>
                                        <option value="RTPO GST">RTPO GST</option>
                                        <option value="RTPO KBJ">RTPO KBJ</option>
                                        <option value="RTPO KIS">RTPO KIS</option>
                                        <option value="RTPO LGS">RTPO LGS</option>
                                        <option value="RTPO PSP">RTPO PSP</option>
                                        <option value="RTPO BJI">RTPO BJI</option>
                                        <option value="RTPO LBP">RTPO LBP</option>
                                        <option value="RTPO BUKITTINGGI">RTPO BUKITTINGGI</option>
                                        <option value="RTPO TANJUNG PINANG">RTPO TANJUNG PINANG</option>
                                        <option value="RTPO RTPO OUTER PKU">RTPO OUTER PKU</option>
                                        <option value="RTPO BATAM">RTPO BATAM</option>
                                        <option value="RTPO TEMBILAHAN">RTPO TEMBILAHAN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Return Autoload</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama RTPO</th>
                                        <th scope="col">Total Impact Site</th>
                                        <th scope="col">Total Impact NE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($datas as $item) --}}
                                    <tr>
                                        <td>RTPO Padang</td>
                                        <td>12</td>
                                        <td>29</td>
                                    </tr>    
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Return With Graphic</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Script Chart --}}
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

            createAxisAndSeries("visits", "Visits", false, "circle");
            createAxisAndSeries("views", "Views", true, "triangle");
            createAxisAndSeries("hits", "Hits", true, "rectangle");

            // Add legend
            chart.legend = new am4charts.Legend();

            // Add cursor
            chart.cursor = new am4charts.XYCursor();

            // generate some random data, quite different range
            function generateChartData() {
                var chartData = [];
                var firstDate = new Date();
                firstDate.setDate(firstDate.getDate() - 100);
                firstDate.setHours(0, 0, 0, 0);

                var visits = 1600;
                var hits = 2900;
                var views = 8700;

                for (var i = 0; i < 15; i++) {
                    // we create date objects here. In your data, you can have date strings
                    // and then set format of your dates using chart.dataDateFormat property,
                    // however when possible, use date objects, as this will speed up chart rendering.
                    var newDate = new Date(firstDate);
                    newDate.setDate(newDate.getDate() + i);

                    visits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                    hits += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
                    views += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);

                    chartData.push({
                        date: newDate,
                        visits: visits,
                        hits: hits,
                        views: views
                    });
                }
                return chartData;
            }

        }); // end am4core.ready()
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
