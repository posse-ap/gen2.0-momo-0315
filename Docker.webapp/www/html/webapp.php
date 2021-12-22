<?php 
// tableとの接続
require('./setting.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reset.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="webapp.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>

<body id="body">
    <header class="header">
        <div class="header_inner">
            <div class="header_left">
                <div class="header_logo">
                    <img src="https://posse.anti-pattern.co.jp/img/posseLogo.png" alt="" class="header_logo_img">
                </div>
                <div class="header_text">4th week
                </div>
            </div>
        </div>
    </header>
    <button class="header_button" id="header_button">
        <span class="header_button_text">投稿・記録
        </span>
    </button>
    <div class="body_wrapper">
        <div class="bar_graph_page">
            <ul class="learning_time_ul">
                <li class="learning_time_li">
                    <span>Today</span>
                    <time><?php echo $today_study_time?></time>
                    <hour>hour</hour>
                </li>
                <li class="learning_time_li">
                    <span>Month</span>
                    <time><?php echo $month_study_time?></time>
                    <hour>hour</hour>
                </li>
                <li class="learning_time_li">
                    <span>Total</span>
                    <time><?php  echo $total_learning_time?></time>
                    <hour>hour</hour>
                </li>
            </ul>
            <div class="bar_graph_wrapper">
                <canvas class="bar_graph_style" id="bar-chart" height="215"></canvas>
            </div>
        </div>
        <div class="pie_chart_page">
            <ul class="pie_chart_ul">
                <li class="pie_chart_li">
                    <span>学習言語</span>
                    <div id="donutChart1" class="donutChart1"></div>


                    <?php 
                            foreach ($languages as $language) : ?>
                    <div>
                        <i class="fas fa-circle" style='color:<?php echo $language['color']?>'>
                        </i>
                        <span><?php echo $language['language']?></span>
                    </div>
                    <?php endforeach;?>
                </li>
                <li class="pie_chart_li">
                    <span>学習コンテンツ</span>
                    <div id="donutChart2" class="donutChart2"></div>

                    <ul class="pie_chart_component_ul">
                        <?php 
                            foreach ($contents as $content) : ?>
                        <li class="pie_chart_component_li">
                            <i class="fas fa-circle" style='color:<?php echo $content['color']?>'>
                            </i>
                            <span><?php echo $content['content']?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- もーだる-->
    <div class="black_filter" id="black_filter"></div>
    <div class="overlay" id="overlay">
        <div class="overlay_wrapper">

            <div class="left_wrapper">
                <div class="learning_date">
                    <span class="overlay_each_tittle">学習日</span>

                    <input type="text" id="calendar_input">

                    <div class="calendar_modal" id="calendar_modal">
                        <div class="calendar_wrapper">
                            <!-- xxxx年xx月を表示 -->
                            <h1 id="calendar_header">
                            </h1>

                            <!-- ボタンクリックで月移動 -->
                            <div class="calendar_next_prev_button" id="next-prev-button">
                                <button class="prev_button" id="prev" onclick="prev()">＜</button>
                                <button class="next_button" id="next" onclick="next()">＞</button>
                            </div>

                            <!-- カレンダー -->
                            <div id="calendar"></div>
                            <button class="determination_button" id="determination_button">
                                <span class="determination_button_text">決定</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="learning_content">
                    <span class="overlay_each_tittle">学習コンテンツ（複数選択可）</span>

                    <div class="overlay_leaning_contents_wrapper">
                        <?php foreach ($contents as $content) : ?>
                        <input type="checkbox" class="overlay_input" id=<?php echo $content['content']?>>
                        <label class="overlay_input_element" for=<?php echo $content['content']?>>
                            <i class="fas fa-check-circle"></i>
                            <?php echo $content['content'] . "　";?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="learning_language">
                        <span class="overlay_each_tittle">学習言語（複数選択可）</span>
                        <div class="overlay_leaning_contents_wrapper">
                            <?php foreach ($languages as $language) : ?>
                            <input type="checkbox" class="overlay_input" id=<?php echo $language['language']?>>
                            <label class="overlay_input_element" for=<?php echo $language['language']?>>
                                <i class="fas fa-check-circle"></i>
                                <?php echo $language['language'] . "　";?>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_wrapper">
                <i class="fas fa-times" id="overlay_close_button"></i>
                <div class="learning_hour">
                    <span class="overlay_each_tittle ">学習時間</span>
                    <input type="text" class="learning_hour_imput">
                </div>
                <div class="twitter_comment">
                    <span class="overlay_each_tittle">Twitter用コメント</span>
                    <input type="text" class="twitter_input" id="tweet_comment_input">
                    <input type="checkbox" id="tweet_button" name="tweet_button">
                    <label class="share_twitter" for="tweet_button">
                        <i class="fas fa-check-circle fa-2x"
                            id="twitter_check_mark_button"></i><span>Twitterにシェアする</span>
                    </label>
                </div>
            </div>
        </div>

        <button class="overlay_post_record_button" id="overlay_post_record_button">
            <span class="overlay_post_record_button_text">投稿・記録
            </span>
        </button>

        <!-- loading overlay -->
        <div class="loading_wrapper" id="loading">
            <i class="fas fa-times loading_close_button" id="close_button"></i>
            <div class="loader"></div>
        </div>

        <!-- awesome  -->
        <div class="post_record_completed_whole_wrapper" id="post_record_completed">
            <div class="post_record_completed">
                <i class="fas fa-times post_record_completed_close_button" id="post_record_completed_close_button"></i>
                <div class="post_record_completed_wrapper">
                    <span class="awesome">AWESOME!</span>
                    <i class="fas fa-check-circle awesome_check fa-3x"></i>
                    <span>記録・投稿<br>完了しました</span>
                </div>
            </div>
        </div>
    </div>
    <!-- modalの中身終了 -->

    <div class="year_month_change_part">
        <i class="fas fa-chevron-left" id="year_month_prev_button"></i>
        <span id="year_month_displayed" class="year_month_displayed">

        </span>
        <i class="fas fa-chevron-right" id="year_month_next_button"></i>
    </div>

    <!-- 学習言語のドーナツチャート google.chart読み込み -->
    <?php 
    require('./graph.php');
    ?>
    <script src="webapp.js"></script>
</body>

</html>