<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>
    <?= $title ?>
  </title>

  <link href="/public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/public/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="/public/css/animate.css" rel="stylesheet">
  <link href="/public/css/style.css" rel="stylesheet">

</head>

<body class="fixed-nav fixed-sidebar">
  <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
          <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-header">
              <div class="dropdown profile-element">
                <span>
                  <img alt="image" class="img-circle" src="https://graph.facebook.com/<?= $_SESSION['user']['fb_id'] ?>/picture?type=large&redirect=true&width=48&height=48"
                  />
                </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <span class="clear">
                    <span class="block m-t-xs">
                      <strong class="font-bold">
                        <?= "<strong>{$_SESSION['user']['full_name']}</strong>" ?></strong>
                    </span>
                    <span class="text-muted text-xs block"><?= $_SESSION['user']['name'] ?>
                      <b class="caret"></b>
                    </span>
                  </span>
                </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                  <li>
                    <a href="#">Cá nhân</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="/admin/logout/">Đăng xuất</a>
                  </li>
                </ul>
              </div>
              <div class="logo-element">
                IN+
              </div>
            </li>
          <?php endif ?>
          <?php 
          if (!empty($menu)) : 
            foreach ($menu as $key => $value) :
              if (ValCheckGreater($_SESSION, 'permission', $value['permission'])) : ?>
          <li class="<?= $value['active'] ?? '' ?>">
            <a href="<?= $value['href'] ?>">
              <i class="fa <?= $value['icon'] ?>"></i>
              <span class="nav-label">
                <?= $value['name'] ?>
              </span>
              <?php if ($value['has-child'] == 1) : ?>
              <span class="fa arrow">
                <?php endif ?>
            </a>
            <?php if ($value['has-child'] == 1) : ?>
            <ul class="nav nav-second-level collapse">
              <?php foreach ($value['childs'] as $k => $v) : ?>
              <li class="<?= $v['active'] ?? '' ?>">
                <a href="<?= $v['href'] ?>">
                  <i class="fa <?= $v['icon'] ?>"></i>
                  <span class="nav-label">
                    <?= $v['name'] ?>
                  </span>
                </a>
              </li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>
          </li>
          <?php
              endif;
            endforeach; 
          endif;
          ?>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
              <i class="fa fa-bars"></i>
            </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
              <div class="form-group">
                <input type="text" placeholder="Tìm kiếm" class="form-control" name="top-search" id="top-search">
              </div>
            </form>
          </div>
          <?php if (isset($_SESSION['user'])) : ?>
            <ul class="nav navbar-top-links navbar-right">
              <li>
                <a href="/admin/logout/">
                  <i class="fa fa-sign-out"></i> Đăng xuất
                </a>
              </li>
            </ul>
          <?php endif ?>
        </nav>
      </div>

      <?php if (!empty($breadcrumb)) : ?>
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-9">
            <h2><?= $title ?></h2>
            <ol class="breadcrumb">
              <?php $last = array_pop($breadcrumb); foreach ($breadcrumb as $key => $value) : ?>
              <li>
                <a href="<?= $value['href'] ?>">
                  <?= $value['name'] ?>
                </a>
              </li>
              <?php endforeach ?>
              <li class="active">
                <a href="<?= $last['href'] ?>">
                  <?= $last['name'] ?>
                </a>
              </li>
            </ol>
          </div>
        </div>
      <?php endif ?>
      <div class="wrapper wrapper-content animated fadeInRight">
