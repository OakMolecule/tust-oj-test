<nav>
  <head>
    <meta charset="utf-8">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <!-- Css Plugin -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slider-pro.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/woocommerce.css">
    <link rel="stylesheet" href="css/woocommerce-layout.css">
    <link rel="stylesheet" href="css/woocommerce-smallscreen.css" type="text/css" media="only screen and (max-width: 768px)">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <header class="kopa-header-02">
    <div class="bottom-header style-02">
      <div class="container">
          <div class="pull-left">
          <h1 class="kopa-logo">
          <a>
          <img src="img/icon/logo-3.png" alt="">
          </a>
          </h1>
          </div>
          <div class="pull-right">
          <nav class="kopa-main-menu style-02">
          <ul>
                    <li>
                      <a  class='btn'  href="<?php echo $OJ_HOME?>"><i class="icon-home"></i>
                      <?php echo $MSG_HOME?>
                      </a>
                    </li>
                    <li>
                      <a  class='btn <?php if ($url=="problemset.php") echo " $ACTIVE";?>' href="problemset.php"><?php echo $MSG_PROBLEMS?></a>
                    </li>
                    <li>
                      <a class='btn <?php if ($url=="status.php") echo "  $ACTIVE";?>' href="status.php"> <?php echo $MSG_STATUS?> </a>
                    </li>
                    <li>
                      <a class='btn <?php if ($url=="ranklist.php") echo "  $ACTIVE";?>' href="ranklist.php"><?php echo $MSG_RANKLIST?></a>
                    </li>
                    <li>
                      <a class='btn <?php if ($url=="contest.php") echo "  $ACTIVE";?>'  href="contest.php"><?php echo $MSG_CONTEST?></a>
                    </li>
                    <li>
                      <a class='btn <?php if ($url==(isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php")) echo " $ACTIVE";?>' href="<?php echo isset($OJ_FAQ_LINK)?$OJ_FAQ_LINK:"faqs.php"?>"><?php echo "$MSG_FAQ"?></a>
                    </li>
                  </ul>
          </nav>
          <div class="kopa-hamburger-menu">
          <i class="fa fa-bars"></i>
          </div>
        </div>
      </div>
    </div>
    <!--<hr style="size: 5px; width: 85%" />-->
  </header>
  </html>
</nav>
