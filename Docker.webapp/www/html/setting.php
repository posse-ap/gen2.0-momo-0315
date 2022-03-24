<?php
        $dsn = 'mysql:host=db;dbname=webapp;charset=utf8';
        $user = 'momo';
        $password = 'password';
    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "おめでとうううう接続成功だよ( ㆆ ㆆ)و✧<br>";
        // phpinfo();
    
    } catch (PDOException $e) {
        echo "(´･ω･`)人(`･ω･´)ﾄﾞﾝﾏｲ!!: " . $e->getMessage() . "\n";
        exit();
    } 

    //records,contents,languageテーブル取得
    $records = $dbh->query("SELECT * FROM language_records")->fetchAll();
    $contents = $dbh->query("SELECT * FROM contents")->fetchAll();
    $languages = $dbh->query("SELECT * FROM languages")->fetchAll();
    
    //今日の学習時間
    $stmt = $dbh->query( 
        "SELECT SUM(learning_time) 
        FROM language_records 
        WHERE DATE(learning_date) = DATE(now()) 
        ORDER BY learning_date;"
    );
    $today_learning_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;
    
    //月の学習時間 今月以外を除いた合計学習時間
    $stmt = $dbh->query(
        "SELECT SUM(learning_time) 
        FROM language_records 
        WHERE DATE_FORMAT(learning_date, '%Y%m') 
        = DATE_FORMAT(now(), '%Y%m')"
    );
    $month_learning_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;

    //合計学習時間
    $stmt = $dbh->query(
        "SELECT SUM(learning_time) 
        FROM language_records;"
    );
    $total_learning_time = $stmt->fetch(PDO::FETCH_COLUMN) ?: 0;

    //棒グラフ用 日毎の学習時間
    $stmt = $dbh->query(
        "SELECT SUM(learning_time) 
        FROM language_records
        GROUP BY learning_date;"
    );
    $chart_today_hours = $stmt->fetchAll();

    //言語毎の学習時間
    $stmt = $dbh->query(
        "SELECT SUM(learning_time) 
        FROM language_records
        GROUP BY language_id
        ;"
    );
    $language_learning_hours = $stmt->fetchAll();
 
    $stmt = $dbh->query(
        "SELECT *FROM language_records 
        INNER JOIN languages 
        ON languages.id 
        = language_records.language_id
        ORDER BY language_records.language_id"
    );
    



    $language_graphs  = $stmt->fetchAll();
    foreach($language_graphs as $language_graph){?>
        
        ['<?php echo $language_graph['language'] ?>',
          <?php echo $language_graph['learning_time'] ?>],
          <br>
        <?php };?> 
