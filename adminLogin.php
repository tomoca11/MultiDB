
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理者ログイン画面</title>
</head>

<body>
  <form action="adminLogin_act.php" method="POST">
    <fieldset>
      <legend>管理者ログイン画面</legend>
      <div>
        user_id: <input type="text" name="user_id">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="login.php">通常ユーザログイン</a>
    </fieldset>
  </form>

</body>

</html>