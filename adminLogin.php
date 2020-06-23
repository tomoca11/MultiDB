
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者ログイン画面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body class="m-5">
  <form action="adminLogin_act.php" method="POST">
    <fieldset>
      <div class="card-header">
        <legend>管理者ログイン画面</legend>
      </div>
      <div class="card-footer">
        <div class="m-2">
          User <input type="text" name="user_id">
        </div>
        <div class="m-2">
          Pass <input type="text" name="password">
        </div>
        <div>
          <button class="btn btn-info">Login</button>
        </div>
      </div>
      <a href="login.php">通常ユーザログイン</a>
    </fieldset>
  </form>

</body>

</html>