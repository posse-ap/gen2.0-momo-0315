<?php
// echo phpinfo();

//data source name 
$dsn = 'mysql:dbname=quizy;charset=utf8;host=db';
$user = 'momo';
$password = 'password';

    try {
        $dbh = new PDO($dsn, $user, $password,
        $options = [   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,
        ]
    );
        echo "おめでとうううう接続成功だよ(`·⊝·´)" . PHP_EOL;


//SQLを発行 big_questionsというtableをとってくる
    $tittle = $dbh->prepare('SELECT * FROM big_questions WHERE id=?');
    $tittle->execute(array($_REQUEST['id']));
    $tittle_result = $tittle->fetch();

    $img = $dbh->prepare('SELECT * FROM questions WHERE id=?');
    $img->execute(array($_REQUEST['id']));
    $img_result = $img->fetch();

    $choices = $dbh->prepare('SELECT * FROM choices WHERE id=?');
    $choices->execute(array($_REQUEST['id']));
    $choices_result = $choices->fetchAll();


     echo $img_result['image'];
     echo $choices_result[0]['name'];

    } catch (PDOException $e) {
        echo "(´･ω･`)人(`･ω･´)ﾄﾞﾝﾏｲ!!: " . $e->getMessage();
        exit();
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittle_result['name'];?></title>
    <link rel="stylesheet" href="quizy.css">
</head>

<body>
        <!-- クイズを表示してる部分 -->
         <div class="container content-wrapper">
            <div class="clearfix header-spacer"></div>
            
            <h1>ガチで東京の人しか解けない！#<?php echo $tittle_result['name'];?></h1>
    
            <img class="img_K" src="https://pbs.twimg.com/profile_images/1352968042024562688/doQgizBj_400x400.jpg" alt="">
    
            <a class="tokyo" href="https://kuizy.net/tag/tokyo">東京</a>
    
    
            <p class="view_rate">ビュー数271573　平均正答率81.2%　全問正解率18.9%</p>
            <p class="view_rate" id="answer_rate">正答率などの反映は少し遅れることがあります。</p>
    
            
            <!-- <div id="question_area"></div> -->


    <!-- foreach ($choice_data as $choice_data){ -->
        <!-- // echo ($choice_data['question_id']); -->

    

            <h2> . この地名はなんて読む？
            </h2>
            <img src="<?php  echo $img_result['image'];?>" alt="">
    
            <ul>
                <li><?php echo $choices_result[0]['name'];?></li>
                <li><?php echo $choices_result[0]['name'];?></li>
                <li><?php echo $choices_result[0]['name'];?></li>
            </ul>
    
            <div class="answerBox">
            <p class="rightWrong right">正解!</p>
            <p class="description">正解は<?php echo $choices_result['name'];?>です！</p>
        </div>
        


         
    <!-- // };  -->
  
    
        </div>
    </div>
    <script src=quizy.js></script>
    </body>
    
    </html> 