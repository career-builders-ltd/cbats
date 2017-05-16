<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title>CB ATS - User Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="CB ATS - User Login" name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="{{asset('css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
  <link href="{{asset('css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="{{asset('css/login.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
  <!-- END THEME LAYOUT STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<body class="login">
  <!-- BEGIN LOGO -->
  <div class="logo">
    <a href="index.html">
      <img src="{{asset('images/cb-ats-large.png')}}" alt="Career Builders ATS" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
      <!-- BEGIN LOGIN FORM -->
      <form class="login-form" action="{{asset('login')}}" method="post">
        <h3 class="form-title font-green">Sign In</h3>
        <div class="alert alert-danger display-hide">
          <button class="close" data-close="alert"></button>
          <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
          <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
          <label class="control-label visible-ie8 visible-ie9">Username</label>
          <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username" /> </div>
          <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" /> </div>
            @if($errors->has('unpwErr'))
            <span class='text-danger'> * {{$errors->first('unpwErr')}}</span>
            @endif
            <div class="form-actions">
              {{csrf_field()}}
              <button type="submit" class="btn green uppercase">Login</button>
              <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />Remember
                <span></span>
              </label>
              <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>

            <div class="create-account">
              <p>
                <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
              </p>
            </div>
          </form>
          <!-- END LOGIN FORM -->
          <!-- BEGIN FORGOT PASSWORD FORM -->
          <form class="forget-form" action="#" method="post">
            <h3 class="font-green">Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group">
              <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
              <div class="form-actions">
                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
              </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="{{asset('register')}}" method="post">
              <h3 class="font-green">Sign Up</h3>
              <p class="hint"> Enter your personal details below: </p>
              <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname" /> </div>
                <div class="form-group">
                  <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                  <label class="control-label visible-ie8 visible-ie9">Email</label>
                  @if($errors->has('email'))
                  <span class='text-danger'> * {{$errors->first('email')}}</span>
                  @endif
                  <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" /> </div>
                  <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Address</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address" /> </div>
                    <div class="form-group">
                      <label class="control-label visible-ie8 visible-ie9">City/Town</label>
                      <input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city" /> </div>
                      <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Country</label>
                        <select name="country" class="form-control">
                          <option value="">Country</option>
                          <option value="AU">Australia</option>
                          <option value="IN">India</option>
                          <option value="MV">Maldives</option>
                          <option value="SG">Singapore</option>
                          <option value="LK">Sri Lanka</option>
                          <option value="AE">United Arab Emirates</option>
                          <option value="GB">United Kingdom</option>
                          <option value="US">United States</option>
                        </select>
                      </div>
                      <p class="hint"> Enter your account details below: </p>
                      <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Username</label>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                        <div class="form-group">
                          <label class="control-label visible-ie8 visible-ie9">Password</label>
                          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
                          <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" /> </div>
                            <div class="form-group margin-top-20 margin-bottom-20">
                              <label class="mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="tnc" /> I agree to the
                                <a href="javascript:;">Terms of Service </a> &
                                <a href="javascript:;">Privacy Policy </a>
                                <span></span>
                              </label>
                              <div id="register_tnc_error"> </div>
                            </div>
                            <div class="form-actions">
                              <button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>
                              {{csrf_field()}}
                              <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
                            </div>
                          </form>
                          <!-- END REGISTRATION FORM -->
                        </div>
                        <div class="copyright"> 2017 © Career Builders Ltd. Application Tracking System. </div>
                        <!--[if lt IE 9]>
                        <script src="{{asset('plugins/respond.min.js')}}"></script>
                        <script src="{{asset('plugins/excanvas.min.js')}}"></script>
                        <script src="{{asset('plugins/ie8.fix.min.js')}}"></script>
                        <![endif]-->
                        <!-- BEGIN CORE PLUGINS -->
                        <script src="{{asset('plugins/jquery.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/js.cookie.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
                        <!-- END CORE PLUGINS -->
                        <!-- BEGIN PAGE LEVEL PLUGINS -->
                        <script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
                        <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
                        <!-- END PAGE LEVEL PLUGINS -->
                        <!-- BEGIN THEME GLOBAL SCRIPTS -->
                        <script src="{{asset('js/app.min.js')}}" type="text/javascript"></script>
                        <!-- END THEME GLOBAL SCRIPTS -->
                        <!-- BEGIN PAGE LEVEL SCRIPTS -->
                        <script src="{{asset('js/login.min.js')}}" type="text/javascript"></script>
                        <!-- END PAGE LEVEL SCRIPTS -->
                        <!-- BEGIN THEME LAYOUT SCRIPTS -->
                        <!-- END THEME LAYOUT SCRIPTS -->
                        <script>
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                        ga('create', 'UA-37564768-1', 'auto');
                        ga('send', 'pageview');
                        </script>
                        <!-- End -->
                      </body>
                      </html>
