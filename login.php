
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <form action="login_act.php" method="POST">
    <fieldset>
      <legend>ログイン画面</legend>

      <div class="card">
        <div>
          user_id: <input type="text" name="user_id">
        </div>
        <div>
          password: <input type="text" name="password">
        </div>
        <div>
          <button>Login</button>
        </div>
      </div>
      <a href="adminLogin.php">管理者ログイン</a>
    </fieldset>
  </form>

</body>

</html>