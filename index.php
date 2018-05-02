<?php require_once('private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php

  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  require __DIR__ . '/dotenv-loader.php';

  use Auth0\SDK\Auth0;

  $domain        = getenv('AUTH0_DOMAIN');
  $client_id     = getenv('AUTH0_CLIENT_ID');
  $client_secret = getenv('AUTH0_CLIENT_SECRET');
  $redirect_uri  = getenv('AUTH0_CALLBACK_URL');
  $audience      = getenv('AUTH0_AUDIENCE');

  if($audience == ''){
    $audience = 'https://' . $domain . '/userinfo';
  }

  $auth0 = new Auth0([
  'domain' => 'spacefleethero.auth0.com',
  'client_id' => 'Tx9vHyXiUO8eKewBwJL34r6Se5Xz2v76',
  'client_secret' => 'ch24yKw91W54s8NQqUsz8ohcOj5y2mVOKEszekffVX6ip_kJfGOqMfdX2o1oaisp',
  'redirect_uri' => 'http://localhost:3000',
  'audience' => 'https://spacefleethero.auth0.com/userinfo',
  'scope' => 'openid profile',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);

  $userInfo = $auth0->getUser();

if (!$userInfo) {
    // We have no user info
    // redirect to Login
} else {
    // User is authenticated
    // Say hello to $userInfo['name']
    // print logout button
}


?>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- font awesome from BootstrapCDN -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="public/app.css" rel="stylesheet">



    </head>
    <body class="home">
        <div class="container">
            <div class="login-page clearfix">
              <?php if(!$userInfo): ?>
              <div class="login-box auth0-box before">
                <img src="https://i.cloudup.com/StzWWrY34s.png" />
                <h1>HeRo</h1>
                <p>The Next Evolution of HR Software</p>
                <a class="btn btn-primary btn-lg btn-login btn-block" href="login.php">Sign In</a>
              </div>
              <?php else: ?>
              <div id="content">
                <div id="main-menu">
                  <h2>Main Menu</h2>
                  <ul>
                    <li>
                      <a href="<?php echo url_for('../public/Staff/Employees/index.php'); ?>">Employees</a>
                    </li>
                    <li>
                      <a href="<?php echo url_for('../public//Staff/Departments/index.php'); ?>">Departments</a>
                    </li>
                    <li>
                      <a href="<?php echo url_for('../public//Staff/Department_Managers/index.php'); ?>">Department Managers</a>
                    </li>
                    <li>
                      <a href="<?php echo url_for('../public//Staff/Department_Employees/index.php'); ?>">Department Employees</a>
                    </li>
                    <li>
                      <a href="<?php echo url_for('../public//Staff/Salaries/index.php'); ?>">Salaries</a>
                    </li>
                    <li>
                      <a href="<?php echo url_for('../public//Staff/Titles/index.php'); ?>">Titles</a>
                    </li>
                  </ul>
                </div>
              </div>

             <!-- <div class="logged-in-box auth0-box logged-in">
                <h1 id="logo"><img src="//cdn.auth0.com/samples/auth0_logo_final_blue_RGB.png" /></h1>
                <img class="avatar" src="<?php echo $userInfo['picture'] ?>"/>
                <h2>Welcome <span class="nickname"><?php echo $userInfo['nickname'] ?></span></h2>
                <a class="btn btn-warning btn-logout" href="/logout.php">Logout</a>
              </div>-->
              <?php endif ?>
            </div>
        </div>
    </body>
</html>  

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
