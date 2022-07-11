<?php require_once('../../include/config.php');?>
<?php 
if(isset($_POST['print_reports'])){
  $start_date_s = $_POST['start_date'];
  $end_date_s = $_POST['end_date'];
  $center_s = $_POST['center'];
  $section_s = $_POST['section'];
  $company_s = $_POST['company'];
  if(isset($_POST['send_society'])){
    $send_society_s = $_POST['send_society'];
  }else{
    $send_society_s = '';
  }
  if(isset($_POST['check_issue'])){
    $check_issue_s = $_POST['check_issue'];
  }else{
    $check_issue_s = '';
  }
  if(isset($_POST['check_receipt'])){
    $check_receipt_s = $_POST['check_receipt'];
  }else{
    $check_receipt_s = '';
  }
  if(isset($_POST['cash_a_check'])){
    $cash_a_check_s = $_POST['cash_a_check'];
  }else{
    $cash_a_check_s = '';
  }
  if(isset($_POST['budget_recording'])){
    $budget_recording_s = $_POST['budget_recording'];
  }else{
    $budget_recording_s = '';
  }
}
if($center_s != "-"){
  $sql_center_r = "SELECT `name_center` FROM `centers` WHERE `id` = $center_s";
  $center_row_r = mysqli_query($conn,$sql_center_r);
  foreach ($center_row_r as $c_item_r) {
    $center_r	= $c_item_r['name_center'];
  }
}
if($section_s != "-"){
  $sql_section_r = "SELECT `name_section` FROM `sections` WHERE `id` = $section_s";
  $section_row_r = mysqli_query($conn,$sql_section_r);
  foreach ($section_row_r as $s_item_r) {
    $section_r	= $s_item_r['name_section'];
  }
}
if($company_s != "-"){
  $sql_company_r = "SELECT `name_company` FROM `companies` WHERE `id` = $company_s";
  $company_row_r = mysqli_query($conn,$sql_company_r);
  foreach ($company_row_r as $co_item_r) {
    $company_r	= $co_item_r['name_company'];
  }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font aousem -->
  <link rel="stylesheet" href="../../static/css/all.min.css">
  <!-- css file -->
  <link rel="stylesheet" href="../../static/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="../../static/css/style.css">
  <style>
    @media print {
      body{
        font-family: Arial, sans-serif;
      }
    }
  </style>
  <title>تقرير المصاريف - إدراة المراكز الطبية - <?php echo $start_date_s; ?> -- <?php if($start_date_s != $end_date_s){ echo $end_date_s;}?></title>
</head>
<body>
<div  class="mx-1 d-flex flex-column align-items-center">
  <h1 class="fs-3 d-print-none" >تقرير المصاريف</h1>
  <?php if($center_s != '-' or $company_s != "-"): ?>
    <div class="center_box d-flex gap-3">
      <?php if($center_s != "-"): ?>
        <div class="center"><?php  echo $center_r; ?></div>
      <?php endif; ?>
      <?php if($section_s != "-"): ?>
        <div class="section"> قسم <?php echo $section_r; ?></div>
      <?php endif; ?>
      <?php if($company_s != "-"): ?> 
        <div class="co"><?php echo $company_r; ?></div>
      <?php endif; ?> 
    </div>
  <?php endif; ?>
  <div class="date_box d-flex gap-3 d-print-none">
    <span class="start-date"><?php echo $start_date_s; ?></span>
    <?php if($start_date_s != $end_date_s): ?>
      <span class="end-date"><?php echo $end_date_s; ?></span>
    <?php endif; ?>
  </div>
</div> 
<button class="btn btn-primary m-2 d-print-none" onclick="print_page()">Print</button>
<section class="mx-1">
  <table class="table table-striped table-bordered">
    <thead>
      <tr class="table-dark">
        <th scope="col" style="width: 10px;">رقم</th>
        <th scope="col">تاريخ</th>
        <th scope="col">مبلغ</th>
        <th scope="col">المركز</th>
        <th scope="col">القسم</th>
        <th scope="col">الشركة</th>
        <th scope="col" class="col-3">البيان</th>
        <th scope="col" class="col_check_head">إرسال للجمعية</th>
        <th scope="col" class="col_check_head">إصدار شيك</th>
        <th scope="col" class="col_check_head">إستلام شيك</th>
        <th scope="col" class="col_check_head">صرف شيك</th>
        <th scope="col" class="col_check_head">تسجيل ميزانية</th>
      </tr>
    </thead>
    <tbody>
    <?php
    global $conn;
    $sql_view = "SELECT * FROM `invoice_expenses`";
    $results_view = mysqli_query($conn,$sql_view);
    foreach ($results_view as $row){
    	$center_id = $row['center'];
    	$sql_center = "SELECT `name_center` FROM `centers` WHERE `id` = $center_id";
    	$center_row = mysqli_query($conn,$sql_center);
    	foreach ($center_row as $c_item) {
    	  $center	= $c_item['name_center'];
    	}
    	$section_id = $row['section'];
    	$sql_section = "SELECT `name_section` FROM `sections` WHERE `id` = $section_id";
    	$section_row = mysqli_query($conn,$sql_section);
    	foreach ($section_row as $s_item) {
    	  $section	= $s_item['name_section'];
    	}
    	$company_id = $row['company'];
    	$sql_company = "SELECT `name_company` FROM `companies` WHERE `id` = $company_id";
    	$company_row = mysqli_query($conn,$sql_company);
    	foreach ($company_row as $co_item) {
    	  $company	= $co_item['name_company'];
    	}
      if($row['invoice_date'] >= $start_date_s and $row['invoice_date'] <= $end_date_s){
        if($center_s != '-' and $company_s != '-' and $section_s != '-'){
          if($row['center'] == $center_s and $row['company'] == $company_s and $row['section'] == $section_s){
            checkbox_checked_form();
          }
        }elseif($center_s != '-' and $company_s != '-' and $section_s == '-'){
          if($row['center'] == $center_s and $row['company'] == $company_s){
            checkbox_checked_form();
          }
        }elseif($center_s != '-' and $company_s == '-' and $section_s != '-'){
          if($row['center'] == $center_s and  $row['section'] == $section_s){
            checkbox_checked_form();
          }
        }elseif($center_s != '-' and $company_s == '-' and $section_s == '-'){
          if($row['center'] == $center_s){
            checkbox_checked_form();
          }
        }elseif($center_s == '-' and $company_s != '-' and $section_s == '-'){
          if($row['company'] == $company_s){
            checkbox_checked_form();
          }
        }elseif($center_s == '-' and $company_s == '-' and $section_s == '-'){
          checkbox_checked_form();
        }
      }
    } ?>
    </tbody>
  </table>
</section>
<script>
  function print_page(){
    window.print();
  }
</script>
<?php
function checkbox_checked_form(){
  global $send_society_s, $check_issue_s, $check_receipt_s, $cash_a_check_s, $budget_recording_s , $row;
  if($send_society_s == '' and $check_issue_s == '' and $check_receipt_s == '' and $cash_a_check_s == '' and $budget_recording_s == ''){
    tr_table();
  }elseif($send_society_s != '' and $check_issue_s == '' and $check_receipt_s == '' and $cash_a_check_s == '' and $budget_recording_s == ''){
    if($row['send_society'] == $send_society_s and $row['check_issue'] == $check_issue_s and $row['check_receipt'] == $check_receipt_s and $row['cash_a_check'] == $cash_a_check_s and $row['budget_recording'] == $budget_recording_s){
      tr_table();
    }
  }elseif($send_society_s != '' and $check_issue_s != '' and $check_receipt_s == '' and $cash_a_check_s == '' and $budget_recording_s == ''){
    if($row['send_society'] == $send_society_s and $row['check_issue'] == $check_issue_s and $row['check_receipt'] == $check_receipt_s and $row['cash_a_check'] == $cash_a_check_s and $row['budget_recording'] == $budget_recording_s){
      tr_table();
    }
  }elseif($send_society_s != '' and $check_issue_s != '' and $check_receipt_s != '' and $cash_a_check_s == '' and $budget_recording_s == ''){
    if($row['send_society'] == $send_society_s and $row['check_issue'] == $check_issue_s and $row['check_receipt'] == $check_receipt_s and $row['cash_a_check'] == $cash_a_check_s and $row['budget_recording'] == $budget_recording_s){
      tr_table();
    }
  }elseif($send_society_s != '' and $check_issue_s != '' and $check_receipt_s != '' and $cash_a_check_s != '' and $budget_recording_s == ''){
    if($row['send_society'] == $send_society_s and $row['check_issue'] == $check_issue_s and $row['check_receipt'] == $check_receipt_s and $row['cash_a_check'] == $cash_a_check_s and $row['budget_recording'] == $budget_recording_s){
      tr_table();
    }
  }elseif($send_society_s != '' and $check_issue_s != '' and $check_receipt_s != '' and $cash_a_check_s != '' and $budget_recording_s != ''){
    if($row['send_society'] == $send_society_s and $row['check_issue'] == $check_issue_s and $row['check_receipt'] == $check_receipt_s and $row['cash_a_check'] == $cash_a_check_s and $row['budget_recording'] == $budget_recording_s){
      tr_table();
    }
  }
}
function tr_table(){
  global $row,$center,$section,$company;
  ?>
  <tr>
    <th scope="col"><?php echo $row['invoice_num']; ?></th>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['invoice_amount']; ?></td>
    <td><?php echo $center; ?></td>
    <td><?php echo $section; ?></td>
    <td><?php echo $company; ?></td>
    <td><?php echo $row['statement']; ?></td>
    <td><input class="form-check-input" disabled <?php echo $row['send_society']; ?> type="checkbox" name="send_society"></td>
    <td><input class="form-check-input" disabled <?php echo $row['check_issue']; ?>  type="checkbox" name="check_issue"></td>
    <td><input class="form-check-input" disabled <?php echo $row['check_receipt']; ?>  type="checkbox" name="check_receipt"></td>
    <td><input class="form-check-input" disabled <?php echo $row['cash_a_check']; ?>  type="checkbox" name="cash_a_check"></td>
    <td><input class="form-check-input" disabled <?php echo $row['budget_recording']; ?>  type="checkbox" name="budget_recording"></td>
  </tr>
<?php
}
?>
</body>
</html>