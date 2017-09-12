function highcharts_bar(customData) {
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Survey\: What\'s your favorite fruit\?'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        allowDecimals: false,
        title: {
            text: 'Preference: Qty'
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Popularity',
        data: customData,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
}