<?php

session_start();
// DB接続の設定
// DB名は`gsacf_x00_00`にする
include('functions.php');
check_session_id();

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM startup_user LEFT OUTER JOIN startup_loginrecord
        ON startup_user.名前 = startup_loginrecord.log_id';

// SQL準備&実行

$stmt = $pdo -> prepare($sql);
$status = $stmt -> execute();

// var_dump($stmt);
// var_dump($status);
// exit;



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
    $output .= "<td>{$record["名前"]}</td>";
    $output .= "<td>{$record["所属"]}</td>";
    $output .= "<td>{$record["log_dateTime"]}</td>";;
    $output .= "</tr>";

  }

}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>受講者一覧（管理者用）</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
    <div>
      <a href="admin_home.php">戻る</a>
    </div>
    <div>
        <div>
          <h2>ログイン履歴一覧（管理者用）</h2>
          <button><a href="logout.php">ログアウト</a></button>
        </div>
        
        <div>
          <!-- <a href="view_create.php">新規受講者を登録</a> -->
          
        </div>


    </div>


  <fieldset>
    <legend>受講中一覧</legend>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>名前</th>
          <th>所属</th>
          <th>ログイン日時</th>


        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?=$output ?>
      </tbody>
    </table>


  </fieldset>
  <!-- <input type="hidden" name="user_id" value="<?=$record['user_id']?> disabled" >
  <input type="hidden" name="password" value="<?=$record['password']?> disabled" > -->




</body>

</html>