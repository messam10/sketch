<?php
session_start();
  include("connect.php");
  
  $query = "SELECT * From users INNER JOIN sketc ON users.id_energy = sketc.id_sketch";
  $result = mysqli_query($conn, $query);
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
  </main>

  <main id="table" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">لوحة القيادة</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">مشاركة</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">تصدير</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          هذا الأسبوع
        </button>
      </div>
    </div>

    <h2>المستهلكون</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">رقم العداد</th>
            <th scope="col">المبلغ</th>
            <th scope="col">القراءة الحالية</th>
            <th scope="col">المبلغ الغير مدفوع</th>
            <th scope="col">الاستهلاك الغير مدفوع</th>
            <th scope="col">حالة العداد</th>
          </tr>
        </thead>
        <tbody>
          <?php
            //if($result["is_admin"][1] == 1){
              while($rows=mysqli_fetch_assoc($result)){
          ?>
          
          <tr>
            <td><?php echo $rows["id"];?></td>
            <td><?php echo $rows["name"];?></td>
            <td><?php echo $rows["id_energy"];?></td>
            <td><?php echo $rows["cost"];?></td>
            <td><?php echo $rows["energy"];?></td>
            <td><?php echo $rows["cost_ds"];?></td>
            <td><?php echo $rows["energy_ds"];?></td>
            <td><?php echo $rows["status"];?></td>
          </tr>

          <?php
              }
            //}
          ?>
        </tbody>
      </table>
    </div>
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


</body>

</html>
