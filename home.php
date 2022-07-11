<?php include_once('include/header.php'); ?>
<?php require_once('include/config.php'); ?>
<?php
global $conn;
$sql = "SELECT * FROM `users`";
$results = mysqli_query($conn,$sql);
$name = "";
foreach ($results as $row){
    if($row['id'] == $_GET['id']){
        $name = $row['name'];
    }
}
?>
<h1 class="my-5">مرحبا بك، أستاذنا <span class="text-primary"><?php echo $name; ?></span></h1>
<section>
  <div class="container-fluid row" style="gap: 40px;">
    <a href="pages/expenses/expenses.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-sack-dollar my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">المصاريف</h2>
      </div>
    </a>
    <a href="pages/revenues/revenues.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-circle-dollar-to-slot my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">الإيرادات</h2>
      </div>
    </a>
    <a href="control_board.php" class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-screwdriver-wrench my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <h2 class="card-title fs-1">لوحة التحكم</h2>
      </div>
    </a>
  </div>
</section>
<?php include_once('include/footer.php'); ?>