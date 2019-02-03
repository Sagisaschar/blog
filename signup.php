<?php
require_once 'app/helpers.php';

sess_start('fakebook');


if (isset($_SESSION['user_id'])) {

  header('location: blog.php');
  exit;
}

$page_title = 'Sign Up';
$error['name'] = $error['email'] = $error['password'] = '';

if (isset($_POST['submit'])) {

  if (isset($_POST['token']) && isset($_SESSION['csrf_token']) && $_POST['token'] == $_SESSION['csrf_token']) {
    
    $name = trim(filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL));
    $password = trim(filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING));
    $cpassword = trim(filter_input(INPUT_POST, 'confirm_password',FILTER_SANITIZE_STRING));
    $form_valid = true;
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
    mysqli_query($link, 'SET NAMES utf8');
    $name = mysqli_real_escape_string($link,$name);
    $email = mysqli_real_escape_string($link,$email);
    $password = mysqli_real_escape_string($link,$password);
    
    if(!name || mb_strlen($name) < 2){
      
      $error['name'] = '* Name is required (min 2 chars)';
      $form_valid = false;
      
    }
    
    if(! $email){
      $error['email'] = '* A valid email is required';
      $form_valid = false;  
    }elseif(email_exist($link,$email)) {
      $error['email'] = '* Sorry, This email is taken';
      $form_valid = false;
    }
    
    if( ! $password ){
      $error['password'] = '* Password is required';
      $form_valid = false;
    }elseif($password != $cpassword){
      $error['password'] = '* Password confirmation mismatch';
      $form_valid = false;
    }
    
    if($form_valid){
      
      $file_name = 'default_avatar.jpg';
      
      if(isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0 ){
        
        $ex = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];
        define('MAX_FILE_SIZE', 1024 * 1024 * 5);
        
        if(is_uploaded_file($_FILES['image']['tmp_name'])){
          
          if( $_FILES['image']['size'] <= MAX_FILE_SIZE){
            
            $file_info = pathinfo( $_FILES['image']['name'] );
            
            if( in_array( strtolower($file_info['extension'] ), $ex)){
              
              $file_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
              move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $file_name);
              
            }
            
          }
          
        }
        
      }
      
      $password = password_hash($password, PASSWORD_BCRYPT);
      $sql = "INSERT into users VALUES (null, '$name', '$email', '$password')";
      $result = mysqli_query($link, $sql);
      
      if( $result && mysqli_affected_rows($link) > 0 ){
        
        $uid = mysqli_insert_id($link);
        $sql = "INSERT into profile_images VALUES (null, $uid, '$file_name')";
        $result = mysqli_query($link, $sql);
        
        if( $result && mysqli_affected_rows($link) > 0 ){
          
          header('location: signin.php?sm=You\'ve successfully signed up, now you can log in to your account :)');
          exit;
          
        }
        
      }
      
    }
    
  }


  $token = csrf_token();
} else {

  $token = csrf_token();
}
?>

<?php include 'tpl/header.php'; ?>

<main style="min-height: 1000px;" class="main-signup">
  <br><br><br><br>
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-6 m-auto text-center">
        <h1 class="h1-class mx-auto">Sign Up</h1>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-6 m-auto">
        <div class="card mb-5 sign-form">
          <div class="card-header text-center">
            Here you can sign up for new account:
          </div>
          <div class="card-body">
            <form action="" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
              <input type="hidden" name="token" value="<?= $token; ?>">
              <div class="form-group">
                <label for="name"><span class="text-danger">*</span> Name:</label>
                <input value="<?= old('name'); ?>" type="text" id="name" name="name" class="form-control">
                <span class="text-danger"><?= $error['name']; ?></span>
              </div>
              <div class="form-group">
                <label for="email"><span class="text-danger">*</span> Email:</label>
                <input value="<?= old('email'); ?>" type="email" id="email" name="email" class="form-control">
                <span class="text-danger"><?= $error['email']; ?></span>
              </div>
              <div class="form-group">
                <label for="password"><span class="text-danger">*</span> Password:</label>
                <input type="password" id="password" name="password" class="form-control">
                <span class="text-danger"><?= $error['password']; ?></span>
              </div>
              <div class="form-group">
                <label for="confirm-password"><span class="text-danger">*</span> Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm_password" class="form-control">
              </div>
              <div class="form-group">
                <label for="image">Profile Image:</label>
                <input name="image" type="file" class="form-control-file" id="image" aria-describedby="fileHelp">
              </div>
              <input type="submit" name="submit" value="Sign Up" class="btn btn-info btn-block">
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php include 'tpl/footer.php'; ?>