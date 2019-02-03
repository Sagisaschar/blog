<?php

require_once 'app/helpers.php';
sess_start('fakebook');


$page_title = 'About us';

?>

<?php include 'tpl/header.php'; ?>

<header class="masthead" style="background-image: url(images/background-about.jpg)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading text-center">
              <h1>About Us</h1>
              <span class="subheading">This is what We do.</span>
            </div>
          </div>
        </div>
      </div>
    </header>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto text-justify">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit vel fugiat pariatur magni explicabo ad corporis et fuga ea eum. Nobis, labore expedita eos esse fugiat magnam repellat sunt facere? Aspernatur, tenetur odit odio distinctio voluptatem quo placeat nostrum unde excepturi doloremque sunt doloribus consectetur culpa ipsa reprehenderit molestias veritatis.</p>
        </div>
      </div>
    </div>
<br>
<br>
<br>
<br>
<?php include 'tpl/footer.php'; ?>
