<?php include_once('../../include/header_pages.php'); ?>
<?php require_once('../../include/config.php'); ?>
<h1 class="my-5">قسم المصاريف</h1>
<section>
  <div class="container-fluid row" style="gap: 40px;">
    <a href="add_invoice_ex.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-plus my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">أدخال فاتورة</h2>
      </div>
    </a>
    <a href="view_invoice.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-eye my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">الفواتير</h2>
      </div>
    </a>
    <a href="expenses_reports.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-lines-leaning my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">التقارير</h2>
      </div>
    </a>
  </div>
</section>
<?php include_once('../../include/footer_pages.php'); ?>