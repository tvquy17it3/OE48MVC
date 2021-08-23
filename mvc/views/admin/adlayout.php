<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $data['title'] ?? "Admin";?></title>
  <link href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo BASE_URL; ?>public/fonts/font-awesome.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo BASE_URL; ?>public/css/custom.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>public/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>public/css/toastr.css" rel="stylesheet"/>

</style>
</head>
<body class="nav-md" >
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><span>MVC</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo BASE_URL; ?>public/images/ad.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>
                <?php echo Auth::getUser()->name; ?>
              </h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <!-- <li><a href="index.php"><i class="fa fa-server" aria-hidden="true"></i>Hoạt động</a></li> -->
                <li><a ><i class="fa fa-edit"></i>Bài đăng<span class="fa fa-chevron-down" aria-hidden="true"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo BASE_URL; ?>admin/post_draft">Chờ duyệt</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/post_show">Đã duyệt</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/post_create">Tạo bài viết</a></li>
                  </ul>
                </li>
                  <!-- <li><a><i class="fa fa-bar-chart-o"></i>Thống kê<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Hôm nay</a></li>
                      <li><a href="#">Theo tuần</a></li>
                      <li><a href="#">Theo tháng</a></li>
                    </ul>
                  </li> -->
                </ul>
              </div>
              <div class="menu_section">
                <h3>Quản lý tài khoản</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users" aria-hidden="true"></i>Tài khoản<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo BASE_URL; ?>admin/editor">Kiểm duyệt</a></li>
                      <li><a href="<?php echo BASE_URL; ?>admin/all_accounts">Tất cả</a></li>
                      <li><a href="<?php echo BASE_URL; ?>admin/block">Đã khóa</a></li>
                    </ul>
                  </li>   
                  <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>Về trang chính</a></li>            
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Đăng xuất" href="../logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo BASE_URL; ?>public/images/ad.png" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span><?php echo Auth::getUser()->name; ?></span>
                    </a>
                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>login/logout"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <?php 
          if(isset($data['page'])){
            require_once "./mvc/views/".$data['page'].".php";    
          }
          ?>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>public/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo BASE_URL; ?>public/js/custom.min.js"></script>
    <script type="text/javascript">
      function thongbao(){
        alert("Chưa hoàn thiện hành động này!");
      }
      function del(){
        alert("Xoa!");
      }

      function confirm_delete() {
        return confirm('Are you sure?');
      }

      function confirm_block() {
        return confirm('Are you sure?');
      }

      function confirm_post() {
        return confirm('Are you sure?');
      }
    </script>
    <script src="<?php echo BASE_URL;?>public/js/toastr.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var check = "<?php echo $_SESSION['success']?? "";?>";
            if (check !="") {
                toastr["success"]("<?php echo $_SESSION['success']?? ""; unset($_SESSION['success'])?>");
            }   
        })
    </script>

    <script src="<?php echo BASE_URL;?>public/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL;?>public/js/dataTables.bootstrap.min.js"></script>

  </body>
  </html>