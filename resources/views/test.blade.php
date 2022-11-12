<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Webpage description goes here" />
    <meta charset="utf-8">
    <title>Change_me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>

<body>
hhhg
<div style="width:75%;">
    {!! $chartjs->render() !!}
</div>

<script>
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'sales',
            data: [30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
            categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>

</body>
</html>
