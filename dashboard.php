<?php
session_start();

require_once("config/config.php");
include_once('easebuzz-lib/easebuzz_payment_gateway.php');
if (isset($_SESSION["uid"]) || isset($_COOKIE['user_login'])) {
  include_once(ROOT_PATH . '/libs/function.php');
  $usercredentials = new DB_con();

  //fetching username from either session or cookies condition
  $uname = $uun = $uup = "";
  if (isset($_SESSION["uname"])) {
    $uname  = $_SESSION['uname'];
  }
  if (isset($_COOKIE['user_login'])) {
    $uname  = $_COOKIE['user_login'];
  }

  $query = "SELECT*FROM tblusers  WHERE Username='$uname'";

  $result = $usercredentials->runBaseQuery($query);

  foreach ($result as $k => $v) {
    $uun = $result[$k]['Username'];
    $uup = $result[$k]['Password'];
  }
  //session  condition  end  but it follows until bottom of the page


?>


  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/static/css/login_form_style.css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- <link href="assests/style.css" rel="stylesheet"> -->
    <title>Signin Admin</title>
    <style>


    </style>

  </head>

  <body>


    <!-- nnn -->
    <div class="container-fluid bg-light ">
      <div class="container p-4">
        <div class="row bg-white  p-4">
          <div class="col-sm-8">
            <h2>Welcome to <strong><?php echo $uun; ?></strong> </h2>
          </div>
          <div class="col-sm-2">
            <strong>
              <button data-productid="100" class="btn-white btn-md p-2 pay">
                <img src="https://cdn-icons-png.flaticon.com/512/2949/2949885.png" width="150px" height="150px">&nbsp;Pay - Rs.100
              </button>
            </strong>
            <br>
            <br>
            <a href="logout.php" class="btn btn-warning">
              Logout
            </a>
          </div>
        </div>
      </div>
    </div>


    <!-- should be in bottom -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/static/js/login_form_custom.js"></script>
    <script>
      $(".pay").on('click', function() {
        alert();
        //  ret = DetailsView.GetProject($(this).attr("#data-id"), OnComplete, OnTimeOut, OnError);
      });
    </script>

  </body>

  </html>

<?php } else {
  header('location:login/logout.php');
}
?>