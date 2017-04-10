<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="shortcut icon" href="favicon.png">
  <title>
    <?php echo $view_title?>
  </title>
  <link rel=stylesheet href='./template/<?php echo $OJ_TEMPLATE?>/<?php echo isset($OJ_CSS)?$OJ_CSS:"hoj.css" ?>' type='text/css'>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  
  <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
   crossorigin="anonymous">

  <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
   crossorigin="anonymous">

  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
   crossorigin="anonymous"></script>

   <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>

  <!-- Latest compiled and minified Locales -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/locale/bootstrap-table-zh-CN.min.js"></script>

</head>

<body>
  <div id="wrapper">
    <?php require_once("oj-header.php");?>
    <div id=main>

      <script type="text/javascript" src="include/jquery-latest.js"></script>
      <script type="text/javascript" src="include/jquery.tablesorter.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
          $("#problemset").tablesorter();
        }
      );

      </script>

     <!-- <h3 align='center'>
        <?php
          for ($i=1;$i<=$view_total_page;$i++){
            if ($i>1) echo '&nbsp;';
            if ($i==$page) echo "<span class=red>$i</span>";
            else echo "<a href='problemset.php?page=".$i."'>".$i."</a>";
          }
        ?>
      </h3>-->
      
      <center>
        <form>
          <div class="form-group">
            <div class="col-sm-2">
              <input type="search" class="form-control" name=search placeholder="<?php echo $MSG_SEARCH?>">
              <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
            </div>
          </div>
        </form>

        <table class="table table-striped">
          <thead>
            <tr>
              <th width='5'></th>
              <th width='120'>
                  <center><?php echo $MSG_PROBLEM_ID?></center>
              </th>
              <th>
                <center>
                  <?php echo $MSG_TITLE?>
                </center>
              </th>
              <th width='10%'>
                <?php echo $MSG_SOURCE?>
              </th>
              <th style="cursor:hand" width=60>
                <?php echo $MSG_AC?>
              </th>
              <th style="cursor:hand" width=60>
                <?php echo $MSG_SUBMIT?>
              </th>
            </tr>
          </thead>

          <tbody>
            <?php
              $cnt=0;
              foreach($view_problemset as $row){
                echo "<tr>";
                foreach($row as $table_cell){
                  echo "<td>";
                  echo $table_cell;
                  echo "</td>";
                }
                echo "</tr>";
                $cnt=1-$cnt;
              }
            ?>
          </tbody>
        </table>
      </center>

    </div>
    <!--end main-->
  </div>
  <!--end wrapper-->
  <?php require_once("oj-footer.php");?>
</body>

</html>