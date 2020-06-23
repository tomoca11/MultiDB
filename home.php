<?php

session_start();
// DB接続の設定
// DB名は`gsacf_x00_00`にする
include('functions.php');
check_session_id();

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM startup_support WHERE 完了確認日 = ""';

// SQL準備&実行

$stmt = $pdo -> prepare($sql);
$status = $stmt -> execute();

// var_dump($stmt);
// var_dump($status);



// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する

  exit('表示できません:' .$error[2]);




} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
 
  foreach($result as $record){

    $output .= "<tr>";
    $output .= "<td>{$record["受講者番号"]}</td>";
    $output .= "<td><a href='view_update.php?id={$record["id"]}'>{$record["名前"]}</a></td>";
    $output .= "<td>{$record["生年月日"]}</td>";
    $output .= "<td>{$record["作成日"]}</td>";
    // $output .= "<td>{$record["受講状況"]}</td>";


    // $output .= "<td>{$record["経営（福岡県VB支援）"]}</td>";
    // $output .= "<td>{$record["経営（福岡商工）"]}</td>";
    // $output .= "<td>{$record["経営（政策金融）"]}</td>";
    // $output .= "<td>{$record["経営（福岡市）"]}</td>";

    // $output .= "<td>{$record["財務（福岡県VB支援）"]}</td>";
    // $output .= "<td>{$record["財務（福岡商工）"]}</td>";
    // $output .= "<td>{$record["財務（政策金融）"]}</td>";
    // $output .= "<td>{$record["財務（福岡市）"]}</td>";

    // $output .= "<td>{$record["販路（福岡県VB支援）"]}</td>";
    // $output .= "<td>{$record["販路（福岡商工）"]}</td>";
    // $output .= "<td>{$record["販路（政策金融）"]}</td>";
    // $output .= "<td>{$record["販路（福岡市）"]}</td>";

    // $output .= "<td>{$record["人材育成（福岡県VB支援）"]}</td>";
    // $output .= "<td>{$record["人材育成（福岡商工）"]}</td>";
    // $output .= "<td>{$record["人材育成（政策金融）"]}</td>";
    // $output .= "<td>{$record["人材育成（福岡市）"]}</td>";

    // $output .= "<td>{$record["完了確認日"]}</td>";
    $output .= "<td><a href='view_update.php?id={$record["id"]}'>変更</td>";

    $output .= "</tr>";

  }

}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>受講者一覧</title>
</head>

<body>
    <div>
        <div>
          <h2>受講者一覧</h2>
          <button><a href="logout.php">ログアウト</a></button>
        </div>
        
        <div>
          <a href="view_create.php">新規受講者を登録</a>
          
        </div>


    </div>


  <fieldset>
    <legend>受講中一覧</legend>
    <table>
      <thead>
        <tr>
          <th>受講者番号</th>
          <th>名前</th>
          <th>生年月日</th>
          <th>作成日</th>
          <!-- <th>受講状況</th> -->

          <!-- <th>経営（福岡ＶＢ）</th>
          <th>経営（福岡商工）</th>
          <th>経営（政策金融）</th>
          <th>経営（福岡市）</th>

          <th>財務（福岡ＶＢ）</th>
          <th>財務（福岡商工）</th>
          <th>財務（政策金融）</th>
          <th>財務（福岡市）</th>

          <th>販路（福岡ＶＢ）</th>
          <th>販路（福岡商工）</th>
          <th>販路（政策金融）</th>
          <th>販路（福岡市）</th>

          <th>人材（福岡ＶＢ）</th>
          <th>人材（福岡商工）</th>
          <th>人材（政策金融）</th>
          <th>人材（福岡市）</th>-->

          <!-- <th>完了確認日</th>  -->


        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?=$output ?>
      </tbody>
    </table>


  </fieldset>
  <a href="view_completed.php">修了者一覧</a>




</body>

</html>