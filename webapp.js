const headerBtn = document.getElementById('header_button');
const overlayBtn = document.getElementById('overlay_post_record_button');
const closeBtn = document.getElementById('overlay_close_button');
const overlay = document.getElementById('overlay');
const body = document.getElementById('body');
const Filter = document.getElementById('black_filter');
const loading = document.getElementById('loading');
const postRecordCompleted = document.getElementById('post_record_completed');
const postRecordCompletedCloseBtn = document.getElementById('post_record_completed_close_button');
const twitterBtn = document.getElementById('twitter_button');

headerBtn.addEventListener('click', () => {
    overlay.style.display = 'block';
    Filter.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    overlay.style.display = 'none';
    Filter.style.display = 'none';
})

overlayBtn.addEventListener('click', () => {
    loading.style.display = 'block'
    window.setTimeout(function () {
        loading.style.display = 'none'
        postRecordCompleted.style.display = 'block'
    }, 3000);
});

postRecordCompletedCloseBtn.addEventListener('click', () => {
    postRecordCompleted.style.display = 'none'
    loading.style.display = 'none'
});

twitterBtn.addEventListener('click', () => {
    twitterBtn.classList.toggle('fa-check-circle_clicked')
})

google.load("visualization", "1", { packages: ["barChart"] });
google.setOnLoadCallback(
    function () {
        var data = google.visualization.arrayToDataTable([
            ["date", "hour", { role: 'style' }],
            ["", 1,'color: #1378C0'],
            ["2", 2,'color: #1378C0'],
            ["", 3,'color: #1378C0'],
            ["4", 4,'color: #1378C0'],
            ["", 5,'color: #1378C0'],
            ["6", 6,'color: #1378C0'],
            ["", 7,'color: #1378C0'],
            ["8", 8,'color: #1378C0'],
            ["", 1,'color: #1378C0'],
            ["10", 2,'color: #1378C0'],
            ["", 3,'color: #1378C0'],
            ["12", 4,'color: #1378C0'],
            ["", 5,'color: #1378C0'],
            ["14", 6,'color: #1378C0'],
            ["", 7,'color: #1378C0'],
            ["16", 8,'color: #1378C0'],
            ["", 1,'color: #1378C0'],
            ["18", 2,'color: #1378C0'],
            ["", 3,'color: #1378C0'],
            ["20", 4,'color: #1378C0'],
            ["", 5,'color: #1378C0'],
            ["22", 6,'color: #1378C0'],
            ["", 7,'color: #1378C0'],
            ["24", 8,'color: #1378C0'],
            ["", 1,'color: #1378C0'],
            ["26",2,'color: #1378C0'],
            ["", 3,'color: #1378C0'],
            ["28", 4,'color: #1378C0'],
            ["", 5,'color: #1378C0'],
            ["30", 6,'color: #1378C0'],
        ]);

        var options = {
            vAxis: {
                format: '#h',
                
            },

        };

        var chart = new google.visualization.ColumnChart(document.getElementById('gct_sample_column'));
        chart.draw(data, options);
    }
);


google.charts.load("current", { packages: ["coreChart"] });
google.charts.setOnLoadCallback(drawChart1);
function drawChart1() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 42],
        ['Eat', 18],
        ['Commute', 10],
        ['Watch TV', 6],
        ['Watch TV', 6],
        ['Watch TV', 6],
        ['Watch TV', 6],
        ['Sleep', 6]
    ]);

    var options = {
        pieHole: 0.4,
        window: 10,

        colors: ["#1855EF",
            "#1170BC",
            "#20BDDE",
            "#3CCEFE",
            "#B39EF3",
            "#6C47EB",
            "#6C47EB",
            "#3004C0",],
        legend: { position:'none' }
    };

    var chart1 = new google.visualization.PieChart(document.getElementById('donutChart1'));
    chart1.draw(data, options);
}

google.charts.load("current", { packages: ["coreChart"] });
google.charts.setOnLoadCallback(drawChart2);
function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work', 42],
        ['Eat', 18],
        ['Commute', 10],
        
    ]);

    var options = {
        pieHole: 0.4,
        window: 10,
        pieSliceBorderColor:'none',
        colors: [
            "#1855EF",
            "#1170BC",
            "#20BDDE"
            ],
        legend: { position: 'none' }
    };

    var chart2 = new google.visualization.PieChart(document.getElementById('donutChart2'));
    chart2.draw(data, options);
}