<?php
     session_start();
     if(isset($_SESSION['id'])){
         header('Location: index.php');
     }
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>NRF2</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

  </style>

  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" style="font-weight: 600;">NRF2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">الصفحة الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="about.php">من نحن</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="payment.php">تسديد</a>
          </li>
          <?php
            if(session_destroy()){
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='logout.php'>تسجيل خروج</a>";
              echo "</li>";
            }else{
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='login.php'>تسجيل دخول</a>";
              echo "</li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <main class="form-signin">
    <form action="login.php" method="post">
      <img id="logo" class="mb-4" src="img/electricity logo.jpg" alt="" width="120" height="95">
      <h1 id="login-text" class="h3 mb-3 fw-normal">تسجيل دخول</h1>

      <div class="form-floating">
        <input type="test" class="form-control" id="floatingInput" placeholder="Username" name="Username" required="">
        <label for="floatingInput">المستخدم</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="Pass" required="">
        <label for="floatingPassword">كلمة المرور</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> تذكرني
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="login" type="submit" style="background-color: #212529;">تسجيل دخول</button>
    </form>
  </main>

  <div class="footer">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3" style="">
        <li class="nav-item"><a href="payment.php" class="nav-link px-2 text-muted">تسديد</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link px-2 text-muted">من نحن</a></li>
        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">الصفحة الرئيسية</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2022 NRF2 جميع الحقوق محفوظة</p>
    </footer>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
<?php
  include 'connect.php';
  if(isset($_POST['login'])){
  $Username = $_POST['Username'];
  $pass = $_POST["Pass"];

  $select = mysqli_query($conn, "select * from users where user = '$Username' and password = '$pass'");
  $row = mysqli_fetch_array($select);

  if(is_array($row)){
    $_SESSION["Username"] = $row['user'];
    $_SESSION["Pass"] = $row['password'];
    $_SESSION["name"] = $row['name'];
    $_SESSION["id"] = $row['id'];
    //$id = $row['id'];
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("المستخدم او كلمة المرور غير صحيح");';
    echo 'window.location.href = "login.php"';
    echo '</script>';
  }
  // echo $_SESSION["id"];
  if(isset($_SESSION["Username"])){
    header("Location:index.php");
    exit();
  }
  
  // if(isset($_SESSION["Username"])){
  //   echo $_SESSION["Username"];
  // }
}
?>

</body>

</html>