<?php

session_start();
// DB接続の設定
// DB名は`gsacf_x00_00`にする
// 関数ファイルの読み込み
include('functions.php');
check_session_id();

// 送信データのチェック
// var_dump($_POST);
// exit();

// 送信されたidをgetで受け取る
$id = $_GET['id'];


// DB接続
$pdo = connect_to_db();


// UPDATE文を作成&実行
$sql = 'SELECT * FROM startup_support WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// var_dump($status);

// fetch()で1レコード取得できる．
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  } else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // var_dump($record)

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>内容の更新</title>
</head>

<body>
  <form action="process_update.php" method ="POST">
    <fieldset>
      <legend>受講状況更新</legend>
      <a href="admin_home.php">受講中一覧へ戻る</a>

      <!-- 名前とIDを抽出して表示  -->
      <div>
        <p>受講者番号：<?= $record['受講者番号'] ?></p>
        <p>氏名　　　：<?= $record['名前'] ?></p>
        <p>生年月日　：<?= $record['生年月日']?></p>
      </div>


      <div class="keiei">
        <h3>経営</h3> 
        <ol>
         <p>１ 福岡県　　　: <input type="date" name="k1" value="<?= $record['経営（福岡県VB支援）'] ?>"></p> 
         <p>２ 福岡商工　　: <input type="date" name="k2" value="<?= $record['経営（福岡商工）'] ?>"></p> 
         <p>３ 日本政策金融: <input type="date" name="k3" value="<?= $record['経営（政策金融）'] ?>"></p>  
         <p>４ 福岡市　　　: <input type="date" name="k4" value="<?= $record['経営（福岡市）'] ?>"></p>        
        </ol>
      </div>

      <div class="zaimu">
        <h3>財務</h3>
        <ol>
          <p>１ 福岡県　　　: <input type="date" name="z1" value="<?= $record['財務（福岡県VB支援）'] ?>"></p> 
          <p>２ 福岡商工　　: <input type="date" name="z2" value="<?= $record['財務（福岡商工）'] ?>"></p> 
          <p>３ 日本政策金融: <input type="date" name="z3" value="<?= $record['財務（政策金融）'] ?>"></p> 
          <p>４ 福岡市　　　: <input type="date" name="z4" value="<?= $record['財務（福岡市）'] ?>"></p> 
        </ol> 
      </div>

      <div class="hanro">
        <h3>販路</h3> 
        <ol>
          <p>１ 福岡県　　　: <input type="date" name="h1" value="<?= $record['販路（福岡県VB支援）'] ?>"></p> 
          <p>２ 福岡商工　　: <input type="date" name="h2" value="<?= $record['販路（福岡商工）'] ?>"></p> 
          <p>３ 日本政策金融: <input type="date" name="h3" value="<?= $record['販路（政策金融）'] ?>"></p> 
          <p>４ 福岡市　　　: <input type="date" name="h4" value="<?= $record['販路（福岡市）'] ?>"></p> 
        </ol>
      </div>

      <div class="jinzai">
        <h3>人材育成</h3> 
        <ol>
          <p>１ 福岡県　　　: <input type="text" name="j1" value="<?= $record['人材育成（福岡県VB支援）'] ?>" readonly></p>
          <p>２ 福岡商工　　: <input type="date" name="j2" value="<?= $record['人材育成（福岡商工）'] ?>"></p> 
          <p>３ 日本政策金融: <input type="date" name="j3" value="<?= $record['人材育成（政策金融）'] ?>"></p> 
          <p>４ 福岡市　　　: <input type="date" name="j4" value="<?= $record['人材育成（福岡市）'] ?>"></p> 
        </ol>
      </div>

      <div>
        <h3>完了確認</h3>
        <ol>
          <!-- <p>１ 受講状況:</p>
           <label></label><input type="radio" name="stats" id="rd1" value="0"{$checked[$record = 0]}>受講中</label>
           <label><input type="radio" name="stats" id="rd1" value="1"{$checked["stats"]["1"]}>完了</label> -->


          <p>1 全項目の完了日: <input type="date" name="end_date"></p> 

          <p>2 削除フラグ　　: <input type="text" name="delete_flag"></p>
        </ol> 

      </div>
      <div>
        <button>登録する</button>
      </div>
    </fieldset>
    <input type="hidden" name="id" value="<?=$record['id']?> disabled" >
  </form>

</body>

</html>