<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <title>Women in High Tech | <?= $page_title; ?></title>
  </head>
  <body>
    <header>
      
      <nav class="navbar navbar-expand-md navbar-dark fixed-top header">
        <a class="navbar-brand" href="./"><i class="fas fa-th-large fa-2x"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-3">
              <a class="nav-link text-white" href="./">Home</a>
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link text-white" href="about.php">About</a>
            </li>
            <li class="nav-item ml-3">
              <a class="nav-link text-white" href="blog.php">Blog</a>
            </li>
          </ul>
                         <?php if(!empty($_GET['sm'])): ?>
  
      <div id="sm-box">
        <div class="col">
          <div class="alert alert-success m-0">
           <?= $_GET['sm']; ?> 
          </div>
        </div>
      </div>
    
    <?php endif; ?>
         <ul class="navbar-nav ml-auto">
           <?php if( user_verify() ): ?>
            <li class="nav-item mr-3">
              <a class="nav-link text-white" href="#">Welcome <?= htmlspecialchars($_SESSION['user_name']); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="signout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
            <?php else: ?>
            <li class="nav-item mr-3">
              <a class="nav-link text-white" href="signin.php"><i class="fas fa-sign-in-alt"></i> Log In </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link text-white" href="signup.php"><i class="fas fa-user-plus"></i> Sign Up</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>


      </nav>

    
    </header>
    