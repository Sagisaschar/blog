<?php
require_once 'app/helpers.php';

sess_start('fakebook');
$page_title = 'Blog';

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
mysqli_query($link, 'SET NAMES utf8');
$sql = "SELECT u.name, pi.file_name,p.*,DATE_FORMAT(p.updated_at, '%d/%m/%Y %h:%i:%s') udate FROM posts p "
        . "JOIN users u ON u.id = p.user_id "
        . "JOIN profile_images pi ON u.id = pi.user_id "
        . "ORDER BY p.created_at DESC";

$result = mysqli_query($link, $sql);

if (isset($_SESSION['user_id'])) {

  $uid = $_SESSION['user_id'];
}

$file = 'blog_entrances.txt';

if (file_exists($file) && is_writable($file)) {

  $counter = file_get_contents($file);
  file_put_contents($file, ++$counter);
}
?>



<?php include 'tpl/header.php'; ?>



<main style="min-height: 700px;" class="main-blog">
  <br><br><br><br>
  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col-sm-8 mx-auto">
        <h1 class="h1-class mx-auto">Women Posts</h1>
        <?php if (user_verify()) : ?>
          <p class="mt-5">
            <a href="add_post.php" class="btn btn-info btn-lg text-white">
              <i class="fas fa-plus-square" id="add_post"></i> Add your post</a>
          </p>
        <?php endif; ?>
      </div>

    </div>
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
      <div class="row mt-5 post">
        <?php while ($post = mysqli_fetch_assoc($result)) : ?>
          <div class="col-lg-8 col-md-10 mx-auto mb-5">
            <div class="post-preview">
              <h2 class="post-title"><?= htmlspecialchars($post['title']); ?></h2>
              <h3 class="post-subtitle"><?= str_replace("\n", '<br>', htmlspecialchars($post['article'])); ?></h3>
              <p class="post-meta"><img class="rounded-circle mr-2" width="40" height="40" src="images/<?= $post['file_name']; ?>"> Posted by
                <?= htmlspecialchars($post['name']); ?>
                on <?= $post['udate']; ?></p>
              <?php if (!empty($uid) && $uid == $post['user_id']): ?> 
                <p>
                  <a href="edit_post.php?pid=<?= $post['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="delete_post.php?pid=<?= $post['id']; ?>" class="btn btn-danger btn-sm delete-post-btn"><i class="far fa-trash-alt"></i> Delete</a>
                </p>
              <?php endif; ?> 
            </div>
            <br>
            <br>
            <br>
          </div> 

        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <!-- Pager -->
    <div class="clearfix">
      <a class="btn btn-info float-right" href="#top">Back to top<i class="fas fa-arrow-up ml-2"></i></i></a>
    </div>
    <br><br>
  </div>
</main>



<?php include 'tpl/footer.php'; ?>

