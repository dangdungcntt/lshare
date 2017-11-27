<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Đăng nhập trang quản trị</title>

  <link href="/public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/public/font-awesome/css/font-awesome.css" rel="stylesheet">

  <link href="/public/css/animate.css" rel="stylesheet">
  <link href="/public/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
  <div class="middle-box text-center animated fadeInDown">
    <h2>Đăng nhập</h2>
    <form role="form" action="/admin/login/" method="POST">
      <div class="form-group"><label class="pull-left">Tài khoản</label>
        <input type="text" placeholder="Tài khoản" name="username" class="form-control">
      </div>
      <div class="form-group"><label class="pull-left">Mật khẩu</label>
        <input type="password" placeholder="••••••••" name="password" class="form-control">
      </div>
      <div>
        <button class="btn btn-primary pull-right m-t-n-xs btn-block" type="submit"><strong>Đăng nhập</strong></button>
      </div>
    </form>
  </div>

  <!-- Mainly scripts -->
  <script src="/public/js/jquery-2.1.1.js"></script>
  <script src="/public/js/bootstrap.min.js"></script>
  <script>
    $(() => {
      $("input[name=username]").focus();
    });
  </script>
</body>

</html>
