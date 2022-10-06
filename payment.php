<?php
   
    ob_start();
    session_start();
    include 'connect.php';
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

    .lead, .title {
      text-align: right;
      direction: rtl;
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

  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1 class="title">مرحباً بكم في NRF2</h1>
      <p class="lead">نقدم لك نظام توزيع الكهربائي الذكية لمساعدتك في مراقبة الشبكة التوزيع حيث يوجد عدادات ذكية متصلة بالشبكة وعرضها في موقعنا.</p>
      <a class="btn btn-lg btn-primary" id="button" href="#" role="button">بدء الاستخدام</a>
    </div>
    <div class="row">
      <div class="col-8">
        <img src="img/maxresdefault.jpg" class="img-thumbnail" alt="Cinque Terre" style="height: 500px;">
      </div>
      <div class="col-4 form-signin">
        <form action="payment.php" method="post">
          <h1 id="login-text" class="h3 mb-3 fw-normal">تسديد الكهرباء</h1>
          <div class="form-floating">
            <input type="number" class="form-control" id="floatingInput" placeholder="cost" name="cost" required="">
            <label for="floatingInput">المبلغ</label>
          </div>
          <br>
          <button class="w-100 btn btn-lg btn-primary" name="pay" type="submit" style="background-color: #212529;">دفع</button>
        </form>
      </div>
    </div>
  </main>

  <?php
  if(isset($_SESSION["Username"])){
    echo $_SESSION["Username"];
  }
    
    if(isset($_POST['pay'])){
      $cost = $_POST['cost'];
      $available_balance = $cost / 350;
      $user_id = $_SESSION['id'];

      $query = "insert into sketc (cost, available_balance) values ('$cost', '$available_balance') where id = $user_id";
      $result = mysqli_query($conn, $query);
    }
  ?>

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


</body>

</html>
<?php 
ob_end_flush();
?>
