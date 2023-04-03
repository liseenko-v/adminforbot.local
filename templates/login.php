<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<form class="form-signin" method="POST" action="login.php">  
  <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, авторизуйтесь!</h1>
  <?php 
    if ($data['error'] != '') {
        echo '<div class="alert alert-danger" role="alert">
                '.$data['error'].'
            </div>';
    }
  ?>
  <label for="inputEmail" class="sr-only">Логин</label>
  <input type="text" id="inputLogin" class="form-control" name="login" placeholder="Login" required autofocus>
  <label for="inputPassword" class="sr-only">Пароль</label>
  <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Войти</button>
  <p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y');?></p>
</form>
