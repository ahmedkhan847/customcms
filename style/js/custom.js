$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'chart',
            defaultSeriesType: 'column'
        },
        title: {
            text: 'Voting Results'
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'votes'
            }
        },
        series: [{}]
    };
    $.getJSON('votecount2.php', function(data) {
        options.series[0].name = "Votes";
        options.series[0].data = data;
        var chart = new Highcharts.Chart(options);
    });
});