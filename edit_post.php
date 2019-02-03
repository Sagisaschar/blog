<?php
require_once 'app/helpers.php';

sess_start('fakebook');


if (!user_verify()) {

  header('location: signin.php');
  exit;
}

$error = '';
$page_title = 'Edit Post';
$uid = $_SESSION['user_id'];
$pid = trim(filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING));

if ($pid && is_numeric($pid)) {

  $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
  mysqli_query($link, 'SET NAMES utf8');
  $pid = mysqli_real_escape_string($link, $pid);
  $sql = "SELECT * FROM posts WHERE id = $pid AND user_id = $uid";
  $result = mysqli_query($link, $sql);
  
  if ($result && mysqli_num_rows($result) == 1) {
    
    $post = mysqli_fetch_assoc($result);
    
  }
  
}

if ( empty($post) ){
  
  header('location: blog.php');
  exit;
  
}

if (isset($_POST['submit'])) {

  $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
  $article = trim(filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));


  if (!$title || mb_strlen($title) < 2 || mb_strlen($title) > 255) {

    $error = '* Title is required (min 2 chars, max 255 chars)';
  } elseif (!$article || mb_strlen($article) < 2) {

    $error = '* Article is required (min 2 chars)';
  } else {

    $title = mysqli_real_escape_string($link, $title);
    $article = mysqli_real_escape_string($link, $article);
    $sql = "UPDATE posts SET title = '$title', article = '$article', updated_at = NOW() WHERE id = $pid";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_affected_rows($link) > 0) {

      header('location: blog.php?sm=Your post was updated successfully!');
      exit;
    }
  }
}
?>

<?php include 'tpl/header.php'; ?>

<main style="min-height: 1000px;" class="main-edit">
  <br>
<br>
<br>
<br>
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-6 mx-auto">
        <h1 class="h1-class mx-auto">Edit Post Page</h1>
        <p>
          <a href="blog.php" class="text-white"><i class="fas fa-arrow-left text-white"></i> Go back</a>
        </p>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-6 mb-5 mx-auto">
        <div class="card sign-form">
          <div class="card-header">
            Edit your new post
          </div>
          <div class="card-body">
            <form action="" method="POST" novalidate="novalidate" autocomplete="off">
              <div class="form-group">
                <label for="title"><span class="text-danger">*</span> Title:</label>
                <input value="<?= $post['title']; ?>" type="text" id="title" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="article"><span class="text-danger">*</span> Article:</label>
                <textarea name="article" id="article" rows="7" class="form-control"><?= $post['article']; ?></textarea>
              </div>
              <input type="submit" name="submit" value="Save post" class="btn btn-info btn-block">
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
