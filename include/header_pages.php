<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;800&display=swap" rel="stylesheet">
  <!-- font aousem -->
  <link rel="stylesheet" href="../../static/css/all.min.css">
  <!-- css file -->
  <link rel="stylesheet" href="../../static/css/normalize.css">
  <link rel="stylesheet" href="../../static/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="../../static/css/style.css">
  <title>Accounting</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../home.php">الرئيسية</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                المصروفات
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../expenses/add_invoice_ex.php">إضافة فاتورة</a></li>
                <li><a class="dropdown-item" href="../expenses/view_invoice.php">الفواتير</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../expenses/expenses_reports.php">التقارير</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                الإيرادات
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../revenues/add_invoice_revenues.php">إضافة فاتورة</a></li>
                <li><a class="dropdown-item" href="../revenues/view_invoice.php">الفواتير</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../revenues/revenues_reports.php">التقارير</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../control_board.php">لوحة التحكم</a>
            </li>
          </ul>
        </div>
        <a href="#" class="navbar-brand text-primary">Accounting</a>
      </div>
    </nav>
  </header>