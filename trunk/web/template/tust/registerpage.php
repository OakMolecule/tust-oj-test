<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="favicon.png">
  <title><?php echo $view_title ?></title>

  <link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE ?>/<?php echo isset($OJ_CSS) ? $OJ_CSS : "hoj.css" ?>'
      type='text/css'>

  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Bootstrap Material Design -->
  <link href="/css/bootstrap-material-design/dist/css/bootstrap-material-design.css" rel="stylesheet">
  <link href="/css/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
  <!-- Dropdown.js -->
  <link href="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.css" rel="stylesheet">

  <link href="https://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div id="wrapper">
  <?php require_once("oj-header.php"); ?>
  <div id=main>

    <h2><?php echo $MSG_REG_INFO ?></h2>

    <form action="register.php" method="post">
      <div class="row">
        <fieldset class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12">
          <fieldset><!-- /input-group -->

            <!-- 用户名 -->
            <div class="form-group">
              <label for="user_id" class="col-md-2 control-label"><?php echo $MSG_USER_ID ?></label>
              <div class="col-md-10">
                <input name="user_id" type="text" class="form-control" id="user_id"
                     placeholder="请输入您的学号">
              </div>
            </div>

            <!-- 昵称 -->
            <div class="form-group">
              <label for="nick" class="col-md-2 control-label"><?php echo $MSG_NICK ?>:</label>
              <div class="col-md-10">
                <input name="nick" type="text" class="form-control" id="inputEmail"
                     placeholder="请输入您的昵称">
              </div>
            </div>

            <!-- 密码 -->
            <div class="form-group">
              <label for="password" class="col-md-2 control-label"><?php echo $MSG_PASSWORD ?></label>
              <div class="col-md-10">
                <input name="password" type="password" class="form-control" id="inputPassword"
                     placeholder="请输入至少8位密码">
              </div>
            </div>

            <!-- 重复密码 -->
            <div class="form-group">
              <label for="rptpassword"
                   class="col-md-2 control-label"><?php echo $MSG_REPEAT_PASSWORD ?></label>
              <div class="col-md-10">
                <input name="rptpassword" type="password" class="form-control" id="inputPassword"
                     placeholder="请再次输入密码">
              </div>
            </div>

            <!-- 学校 -->
            <div class="form-group">
              <label for="school" class="col-md-2 control-label"><?php echo $MSG_SCHOOL ?></label>
              <div class="col-md-10">
                <select name="school" id="select111" class="form-control">
                  <option><?php echo $MSG_TUST?></option>
                </select>
              </div>
            </div>

            <!-- 电子邮件 -->
            <div class="form-group">
              <label for="email" class="col-md-2 control-label"><?php echo $MSG_EMAIL ?></label>
              <div class="col-md-10">
                <input name="email" type="email" class="form-control" id="inputEmail"
                     placeholder="请输入您的邮箱">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-10 col-md-offset-2">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <button name="reset" type="reset" class="btn btn-default"><?php echo $MSG_RESET ?></button>
              </div>
            </div>
          </fieldset><!-- /input-group -->
      </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
  </form>

</div><!--end main-->
</div><!--end wrapper-->
<?php require_once("oj-footer.php"); ?>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="css/bootstrap-material-design/dist/js/material.min.js"
</script>
<script src = "css/bootstrap-material-design/dist/js/ripples.min.js" ></script>
<script>
  $.material.init();
</script>
<!-- Sliders -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>

<!-- Dropdown.js -->
<script src="https://cdn.rawgit.com/FezVrasta/dropdown.js/master/jquery.dropdown.js"></script>
</body>
</html>
