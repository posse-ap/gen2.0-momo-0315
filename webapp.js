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

var bar_ctx = document.getElementById('bar-chart').getContext('2d');

var purple_orange_gradient = bar_ctx.createLinearGradient(0, 0, 0, 600);
purple_orange_gradient.addColorStop(0, '#3DCEFE');
purple_orange_gradient.addColorStop(1, '#1170BB');

var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    data: {
        labels: ["","2","","4","","6","","8","","10","","12","","14","","16","","18","","20","","22","","24","","26","","28","","30"],
        datasets: [{
            label: '# of Votes',
            data: [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6],
						backgroundColor: purple_orange_gradient,
						hoverBackgroundColor: purple_orange_gradient,
						hoverBorderWidth: 2,
						hoverBorderColor: 'purple'
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            xAxes: [                           // Ｘ軸設定
                {
                    scaleLabel: {                 // 軸ラベル
                        display: false,               
                    },
                    gridLines: {                   // 補助線
                        color: "rgba(0, 0, 0, 0)",
                        zeroLineColor: "rgba(0, 0, 0, 0)"   // 補助線の色
                    },
                    scaleLabel: "<%=value%> kg",
                    ticks: {                      // 目盛り
                        fontColor: "#99BBD2",             // 目盛りの色
                        fontSize: 14                  // フォントサイズ
                    }
                }
            ],
            yAxes: [                           // Ｙ軸設定
                {
                    scaleLabel: {                  // 軸ラベル
                        display: false,                 
                    },
                    gridLines: {                   // 補助線
                        color: "rgba(0, 0, 0, 0)", // 補助線の色
                        zeroLineColor: "rgba(0, 0, 0, 0)"         // y=0（Ｘ軸の色）
                    },
                    ticks: {                       // 目盛り
                        min: 0,                        // 最小値
                        max: 8,                       // 最大値
                        stepSize: 2,                   // 軸間隔
                        fontColor: "#99BBD2",             // 目盛りの色
                        fontSize: 14   , 
                        callback: function(tick) {
                            return tick.toString() + 'h';
                          }
                                         // フォントサイズ
                    }
                }
            ]
        }
    }
});



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
        pieSliceBorderColor:'none',

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


//ここからカレンダー

const calendarModal = document.getElementById('calendar_modal');
let calendarInput = document.getElementById('calendar_input');
const determinationBtn = document.getElementById('determination_button');

calendarInput.addEventListener('click', () => {
    calendarModal.style.display = 'block'
});

const week = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
const today = new Date();
// 月末だとずれる可能性があるため、1日固定で取得
var showDate = new Date(today.getFullYear(), today.getMonth(), 1);

// 初期表示
    window.onload = function () {
        showProcess(today, calendar);
       
    };

// 前の月表示
function prev(){
    showDate.setMonth(showDate.getMonth() - 1);
    showProcess(showDate);
}

// 次の月表示
function next(){
    showDate.setMonth(showDate.getMonth() + 1);
    showProcess(showDate);
}

// カレンダー表示
function showProcess(date) {
    var year = date.getFullYear();
    var month = date.getMonth();
    document.querySelector('#calendar_header').innerHTML = year + "年 " + (month + 1) + "月";

    var calendar = createProcess(year, month);
    document.querySelector('#calendar').innerHTML = calendar;
   
  
}

// カレンダー作成
function createProcess(year, month) {
    // 曜日
    var calendar = "<table><tr class='dayOfWeek'>";
    for (var i = 0; i < week.length; i++) {
        calendar += "<th>" + week[i] + "</th>"; //曜日の漢字を配列から取ってくる
    }
    calendar += "</tr>";

    var count = 0;
    var startDayOfWeek = new Date(year, month, 1).getDay();
    var endDate = new Date(year, month + 1, 0).getDate();
    var lastMonthEndDate = new Date(year, month, 0).getDate();
    var row = Math.ceil((startDayOfWeek + endDate) / week.length);
    

    // 1行ずつ設定
    for (var i = 0; i < row; i++) {
        calendar += "<tr>";
        // 1colum単位で設定
        for (var j = 0; j < week.length; j++) {
            if (i == 0 && j < startDayOfWeek) {
                // 1行目で1日まで先月の日付を設定
                calendar += `<td class='invisible' onclick=input(${year},${month+1},${count})>` + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
            } else if (count >= endDate) {
                // 最終行で最終日以降、翌月の日付を設定
                count++;
                calendar += `<td class='invisible' onclick=input(${year},${month+1},${count})>` + (count - endDate) + "</td>";
            } else {
                // 当月の日付を曜日に照らし合わせて設定
                count++;
                if (count < today.getDate()){
                    calendar += `<td class='disabled' onclick=input(${year},${month+1},${count})>` + count + "</td>";
                }
                if(year == today.getFullYear()
                  && month == (today.getMonth())
                  && count == today.getDate()){
                    calendar += `<td class='today' onclick=input(${year},${month+1},${count})>` + count + `</td>`;
                } if (count > today.getDate()){
                    calendar += `<td onclick=input(${year},${month+1},${count})>` + count + "</td>";
                } 
            }
        }

        calendar += "</tr>";
    }
    return calendar;
}

function input(year,month,date) {
    calendarInput.value = `${year}年${month}月${date}日`
    console.log(year + "年 " + month + "月" + date + "日")
};

determinationBtn.addEventListener('click', ()=> {
    calendarModal.style.display = "none"
});

const yearMonthDisplayed = document.getElementById('year_month_displayed');
const yearMonthPrevBtn = document.getElementById('year_month_prev_button');
const yearMonthNextBtn = document.getElementById('year_month_next_button');

var year_text = showDate.getFullYear();
var month_text = showDate.getMonth();
var counter = 0;
yearMonthDisplayed.innerHTML = `${year_text}年${month_text+1}月`

yearMonthPrevBtn.addEventListener('click', ()=> {
    counter++;
    yearMonthDisplayed.innerHTML = `${year_text}年${month_text-counter+1}月`
    console.log(`${year_text}年${month_text+1+counter}月`)
})

yearMonthNextBtn.addEventListener('click', () => {
    counter++;
    yearMonthDisplayed.innerHTML = `${year_text}年${month_text+1+counter}月`
    console.log(`${year_text}年${month_text+1+counter}月`)
})