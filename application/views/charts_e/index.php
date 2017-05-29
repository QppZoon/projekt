<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url();?>assets/imgs/favicon.ico">

    <title>Projekt</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Optional theme -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the line package.
        google.charts.load('current', {'packages':['bar']});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("charts_e/get_stores") ?>',

                success: function (data1) {
                    // Create our data table out of JSON data loaded from server.
                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Názov');
                    data.addColumn('number', 'Elektrina');
                    data.addColumn('number', 'Plyn');
                    data.addColumn('number', 'Voda');

                    var jsonData = $.parseJSON(data1);

                    for (var i = 0; i < jsonData.length; i++) {
                        data.addRow([jsonData[i].Názov, parseInt(jsonData[i].Elektrina), parseInt(jsonData[i].Plyn), parseInt(jsonData[i].Voda)]);
                    }
                    var options = {
                        chart: {
                            title: 'Spotreba energií',
                            subtitle: 'Čísla uvedené v kW'
                        },
                        width: 900,
                        height: 500,
                        axes: {
                            x: {
                                0: {side: 'top'}
                            }
                        }
                    };
                    var chart = new google.charts.Bar(document.getElementById('bar_chart'));
                    chart.draw(data, options);
                }
            });
        }
    </script>
</head>
<body>
    <br />
    <div style="position: relative">
        <div id="bar_chart" style="position: absolute; left: 25%"></div>
    </div>
</body>
</html>