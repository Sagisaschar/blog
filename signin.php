<?php
require_once 'app/helpers.php';

sess_start('fakebook');


if (isset($_SESSION['user_id'])) {

  header('location: blog.php');
  exit;
}

$page_title = 'Sign In';
$error = '';

if (isset($_POST['submit'])) {

  if (isset($_POST['token']) && isset($_SESSION['csrf_token']) && $_POST['token'] == $_SESSION['csrf_token']) {

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    if (!$email) {

      $error = ' * A valid email is required';
    } elseif (!$password) {

      $error = ' * Password is required';
    } else {

      $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
      mysqli_query($link, 'SET NAMES utf8');
      $email = mysqli_real_escape_string($link, $email);
      $password = mysqli_real_escape_string($link, $password);
      $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
      $result = mysqli_query($link, $sql);

      if ($result && mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

          $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
          $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
          $_SESSION['user_id'] = $user['id'];
          $_SESSION['user_name'] = $user['name'];
          header('location: blog.php?sm=' . 'Welcome back, ' . $user['name'] . ' !');
          exit;
        } else {

          $error = '* Wrong email/password';
        }
      } else {

        $error = '* Wrong email/password';
      }
    }
  }


  $token = csrf_token();
} else {

  $token = csrf_token();
}
?>

<?php include 'tpl/header.php'; ?>

<main style="min-height: 1000px;" class="main-sign">
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-6 m-auto text-center">
        <h1 class="h1-class mx-auto">Log In</h1>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-6 m-auto mb-5">
        <div class="card sign-form">
          <div class="card-header text-center">
            Here you can sign in with your account:
          </div>
          <div class="card-body">
            <form action="signin.php" method="POST" novalidate="novalidate" autocomplete="off">
              <input type="hidden" name="token" value="<?= $token; ?>">
              <div class="form-group">
                <label for="email"><span class="text-danger">*</span> Email:</label>
                <input value="<?= old('email'); ?>" type="email" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password"><span class="text-danger">*</span> Password:</label>
                <input type="password" id="password" name="password" class="form-control">
              </div>
              <input type="submit" name="submit" value="Log In" class="btn btn-info btn-block">
<?php if ($error): ?>
                <div class="alert alert-danger mt-3"><?= $error; ?></div>
<?php endif; ?>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php include 'tpl/footer.php'; ?>