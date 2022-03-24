<script>
//棒グラフ chart.js
var bar_ctx = document.getElementById('bar-chart').getContext('2d');
var blue_gradient = bar_ctx.createLinearGradient(0, 0, 0, 600);
blue_gradient.addColorStop(0, '#3DCEFE');
blue_gradient.addColorStop(1, '#0056c0');
var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    data: {
        labels: ["", "2", "", "4", "", "6", "", "8", "", "10", "", "12", "", "14", "", "16", "", "18", "", "20",
            "", "22", "", "24", "", "26", "", "28", "", "30"
        ],
        datasets: [{
            label: '# of Votes',
            data: [
                <?php 
                   foreach($chart_today_hours as $chart_today_hour) {
                    echo $chart_today_hour[0] . ",";
                } ?>
            ],
            backgroundColor: blue_gradient,
            hoverBackgroundColor: blue_gradient,
            hoverBorderWidth: 2,
            hoverBorderColor: 'purple'
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            xAxes: [ // Ｘ軸設定
                {
                    scaleLabel: { // 軸ラベル非表示
                        display: false,
                    },
                    gridLines: { // 補助線透明化
                        color: "rgba(0, 0, 0, 0)",
                        zeroLineColor: "rgba(0, 0, 0, 0)"
                    },
                    ticks: {
                        fontColor: "#99BBD2",
                        fontSize: 14
                    }
                }
            ],
            yAxes: [ // Ｙ軸設定
                {
                    scaleLabel: { // 軸ラベル非表示
                        display: false,
                    },
                    gridLines: { // 補助線非表示
                        color: "rgba(0, 0, 0, 0)",
                        zeroLineColor: "rgba(0, 0, 0, 0)"
                    },
                    ticks: { // 目盛り
                        min: 0, // 最小値
                        max: 8, // 最大値
                        stepSize: 2, // 軸間隔
                        fontColor: "#99BBD2",
                        fontSize: 14,
                        callback: function(tick) {
                            return tick.toString() + 'h';
                        }
                    }
                }
            ]
        }
    }
});

google.charts.load("current", {
    packages: ["coreChart"]
});
google.charts.setOnLoadCallback(drawChart1);

function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['language', 'per Day'],
        <?php 
        foreach($languages as $language){}
        foreach($language_learning_hours as $language_learning_hour) {
    
            
           echo "[" . $language["language"] . "," . $language_learning_hour[0] . "],";
    }
        ?>
    ]);
    var options = {
        pieHole: 0.4,
        window: 10,
        pieSliceBorderColor: 'none',
        colors: [
            <?php foreach ($languages as $language) {
                 echo "\"" . $language['color'] . "\",";
               } ?>
        ],
        legend: {
            position: 'none'
        }
    };
    var chart1 = new google.visualization.PieChart(document.getElementById('donutChart1'));
    chart1.draw(data, options);
}
//学習コンテンツのドーナツチャート google.chart
google.charts.load("current", {
    packages: ["coreChart"]
});
google.charts.setOnLoadCallback(drawChart2);

function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Contents', 'per Day'],
        ['ドットインストール', 42],
        ['N予備', 18],
        ['POSSE課題', 10],
    ]);
    var options = {
        pieHole: 0.4,
        window: 10,
        pieSliceBorderColor: 'none',
        colors: [
            // "#1855EF",
            // "#1170BC",
            // "#20BDDE"
            <?php foreach ($contents as $content) {
                 echo "\"" . $content['color'] . "\",";
               } ?>
        ],
        legend: {
            position: 'none'
        }
    };
    var chart2 = new google.visualization.PieChart(document.getElementById('donutChart2'));
    chart2.draw(data, options);
}
</script>