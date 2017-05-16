<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <title>
    <?php echo isset($title) ? $title : "CareerBuilders  - Applications Tracking System" ?>
  </title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="CareerBuilders  - Applications Tracking Systemt" name="description" />
  <meta name='base_url' content='{{asset("")}}' />
  <meta name='csrf_token' content='{{csrf_token()}}' />
  <meta content="" name="author" />
  <link rel="shortcut icon" href="favicon.ico" />
  @include('layouts.styles')
  @yield('head')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md <?php echo $nav_pos!='_dashboard' ? 'page-sidebar-closed' : '' ?>">
  @include('includes.page-header')
  <div class="clearfix"></div>
  <div class="page-container">
    @include('includes.page-navigation')
    <div class="page-content-wrapper">
      <div class="page-content">
        @yield('body')
      </div>
    </div>
    @include('includes.sidebar')
  </div>
  <div class="page-footer">
    <div class="page-footer-inner"> 2017 &copy; Career Builders (Pvt) Ltd
      <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
      </div>
    </div>
  </div>
  @include('layouts.scripts')
  @yield('page-scripts')
</body>
</html>
