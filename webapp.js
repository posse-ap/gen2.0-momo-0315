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

headerBtn.addEventListener('click', ()=> {
console.log('あ')
overlay.style.display = 'block';
Filter.style.display = 'block';
});

closeBtn.addEventListener('click',()=> {
    overlay.style.display = 'none';
Filter.style.display = 'none';
})

overlayBtn.addEventListener('click',()=> {
    loading.style.display = 'block'
    window.setTimeout(function(){
        loading.style.display = 'none'
        postRecordCompleted.style.display = 'block'
    }, 3000);
});

postRecordCompletedCloseBtn.addEventListener('click',() => {
    postRecordCompleted.style.display = 'none'
    loading.style.display = 'none'
});

twitterBtn.addEventListener('click', ()=> {
    twitterBtn.classList.toggle('fa-check-circle_clicked')
})

//ここから棒グラフ

  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    
    data: {
     //凡例のラベル
      labels: ['2', '4', '6', '8', '10','12', '14', '16', '18', '20','22', '24', '26', '28', '30',],
      datasets: [
        {
          data: [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,], //グラフのデータ
          backgroundColor: "#1378C0",
        }
      ]
    },
    options: {
        // title:false,
      scales: {
        xAxes: [{
            display: true,
            stacked: false,
            gridLines: {
              display: false
            }
          }],
        yAxes: [{
          ticks: {
              callback: function(tick) {
                  return tick.toString()+"h";
              },
            display: true,
            stacked: false,
            gridLines: {
              display: false
            },
            suggestedMax: 8, //最大値
            suggestedMin: 0, //最小値
            stepSize: 2, //縦ラベルの数値単位
            }
        }],
      },
    }
  });


var ctx = document.getElementById("myDoughnutChart1");
var myDoughnutChart1 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [`JavaScript`, "CSS", "PHP", "HTML", "Laravel", "SQL", "SHELL", "情報システム基礎知識（その他）"], //データ項目のラベル
        datasets: [{
            backgroundColor: [
                "#1855EF",
                "#1170BC",
                "#20BDDE",
                "#3CCEFE",
                "#B39EF3",
                "#6C47EB",
                "#6C47EB",
                "#3004C0",
            ],
            data: [42, 18, 10, 5, 5, 5, 10, 5], //グラフのデータ
        }]
    },

    options: {
        title: {
            display: false,
            //グラフタイトル
        },
        legend: {
            display: true,
            position: 'bottom', 
            
            labels: {  
            }
        }
    }

  });
  var ctx = document.getElementById("myDoughnutChart2");
var myDoughnutChart2 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["ドットインストール","N予備","POSSE課題"], //データ項目のラベル
        datasets: [{
            backgroundColor: [
                "#1855EF",
                "#1170BC",
                "#20BDDE"
            ],
            data: [42,33,25], //グラフのデータ
        }]
    },
    options: {
        title: {
            display: false,
            //グラフタイトル
        },
        legend: {
            display: true,
            position: 'bottom', 
            labels: {  
            }
        }
    }
  });

