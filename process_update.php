<?php

session_start();
// DB接続の設定
// DB名は`gsacf_x00_00`にする
include('functions.php');
check_session_id();

// var_dump($_POST);

$pdo = connect_to_db();

//各値をpostで受け取る
$id = $_POST['id'];
// $uid = $_POST['受講者番号'];
// $name =$_POST['名前'];
// $birthDay = $_POST['生年月日'];
// $createDate = $_POST['作成日'];


// $k1 = $_POST['経営（福岡県VB支援）'];
// $k2 = $_POST['経営（福岡商工）'];
// $k3 = $_POST['経営（政策金融）'];
// $k4 = $_POST['経営（福岡市）'];

// $z1 = $_POST['財務（福岡県VB支援）'];
// $z2 = $_POST['財務（福岡商工）'];
// $z3 = $_POST['財務（政策金融）'];
// $z4 = $_POST['財務（福岡市）'];

// $h1 = $_POST['販路（福岡県VB支援）'];
// $h2 = $_POST['販路（福岡商工）'];
// $h3 = $_POST['販路（政策金融）'];
// $h4 = $_POST['販路（福岡市）'];

// $j1 = $_POST['人材育成（福岡県VB支援）'];
// $j2 = $_POST['人材育成（福岡商工）'];
// $j3 = $_POST['人材育成（政策金融）'];
// $j4 = $_POST['人材育成（福岡市）'];

// $end_date =$_POST['完了確認日'];

$k1 = $_POST['k1'];
$k2 = $_POST['k2'];
$k3 = $_POST['k3'];
$k4 = $_POST['k4'];

$z1 = $_POST['z1'];
$z2 = $_POST['z2'];
$z3 = $_POST['z3'];
$z4 = $_POST['z4'];

$h1 = $_POST['h1'];
$h2 = $_POST['h2'];
$h3 = $_POST['h3'];
$h4 = $_POST['h4'];

$j1 = $_POST['j1'];
$j2 = $_POST['j2'];
$j3 = $_POST['j3'];
$j4 = $_POST['j4'];

// $stats = $_POST['stats'];
$end_date =$_POST['end_date'];

// var_dump($k1);
// var_dump($k2);
// exit;


// idを指定して更新するSQLを作成
// UPDATE文を作成&実行
$sql = "UPDATE startup_support
       SET 
        経営（福岡県VB支援）= $k1, 経営（福岡商工）= $k2, 経営（政策金融）= $k3, 経営（福岡市）= $k4,
        財務（福岡県VB支援）= $z1, 財務（福岡商工）= $z2, 財務（政策金融）= $z3, 財務（福岡市）= $z4,
        販路（福岡県VB支援）= $h1, 販路（福岡商工）= $h2, 販路（政策金融）= $h3, 販路（福岡市）= $h4,
        人材育成（福岡県VB支援）= $j1, 人材育成（福岡商工）=$j2,人材育成（政策金融）= $j3, 人材育成（福岡市）= $j4,
        完了確認日 = $end_date

     
       WHERE id=:id";

    //    var_dump($sql);
    //    exit;

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        // $stmt->bindValue(':受講者番号', $uid, PDO::PARAM_STR);
        // $stmt->bindValue(':生年月日', $birthDay, PDO::PARAM_STR);
        // $stmt->bindValue(':作成日', $createDate, PDO::PARAM_STR);
        // $stmt->bindValue(':受講状況', $stats, PDO::PARAM_STR);
        // $stmt->bindValue(':経営（福岡県VB支援）', $k1, PDO::PARAM_STR);
        // $stmt->bindValue(':経営（福岡商工）', $k2, PDO::PARAM_STR);
        // $stmt->bindValue(':経営（政策金融）', $k3, PDO::PARAM_STR);
        // $stmt->bindValue(':経営（福岡市）', $k4, PDO::PARAM_STR);
        // $stmt->bindValue(':財務（福岡県VB支援）', $z1, PDO::PARAM_STR);
        // $stmt->bindValue(':財務（福岡商工）', $z2, PDO::PARAM_STR);
        // $stmt->bindValue(':財務（政策金融）', $z3, PDO::PARAM_STR);
        // $stmt->bindValue(':財務（福岡市）', $z4, PDO::PARAM_STR);
        // $stmt->bindValue(':販路（福岡県VB支援）', $h1, PDO::PARAM_STR);
        // $stmt->bindValue(':販路（福岡商工）', $h2, PDO::PARAM_STR);
        // $stmt->bindValue(':販路（政策金融）', $h3, PDO::PARAM_STR);
        // $stmt->bindValue(':販路（福岡市）', $h4, PDO::PARAM_STR);
        // $stmt->bindValue(':人材育成（福岡県VB支援）', $j1, PDO::PARAM_STR);
        // $stmt->bindValue(':人材育成（福岡商工）', $j2, PDO::PARAM_STR);
        // $stmt->bindValue(':人材育成（政策金融）', $j3, PDO::PARAM_STR);
        // $stmt->bindValue(':人材育成（福岡市）', $j4, PDO::PARAM_STR);
        // $stmt->bindValue(':受講状況', $stats, PDO::PARAM_STR);
        // $stmt->bindValue(':完了確認日', $end_date, PDO::PARAM_STR);
       
        $status = $stmt->execute();

        // var_dump($status);
        // exit;

// 各値をpostで受け取る
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
    } else {
    // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
    header("Location:home.php");
    exit();
    }

?>

