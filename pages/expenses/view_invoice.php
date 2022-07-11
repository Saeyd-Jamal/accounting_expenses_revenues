<?php include_once('../../include/header_pages.php'); ?>
<?php require_once('../../include/config.php');?>
<?php
  if(isset($_POST['updat_invoice'])){
    global $conn;
    $invoice_num = $_POST["invoice_num"];
    $invoice_date = $_POST["invoice_date"];
    $invoice_amount = $_POST["invoice_amount"];
    $center = $_POST["center"];
    $section = $_POST["section"];
    $company = $_POST["company"];
    $statement = $_POST["statement"];
    $send_society = $_POST["send_society"];
    $check_issue = $_POST["check_issue"];
    $check_receipt = $_POST["check_receipt"];
    $cash_a_check = $_POST["cash_a_check"];
    $budget_recording = $_POST["budget_recording"];
    $sql_update = "UPDATE `invoice_expenses` SET `invoice_date`='$invoice_date',`invoice_amount`=$invoice_amount,`center`=$center,`section`=$section,`company`=$company,`statement`='$statement',`send_society`='$send_society',`check_issue`='$check_issue',`check_receipt`='$check_receipt',`cash_a_check`='$cash_a_check',`budget_recording`='$budget_recording' WHERE `invoice_num` = $invoice_num";
    $update_invoice = mysqli_query($conn, $sql_update);
    header("location:view_invoice.php");
  }
  if(isset($_POST['del_invoice'])){
    global $conn;
    $invoice_num = $_POST["invoice_num"];
    $sql_del = "DELETE FROM `invoice_expenses` WHERE `invoice_num` = $invoice_num";
    $del_invoice = mysqli_query($conn, $sql_del);
    header("location:view_invoice.php");
  }
?>
<h1 class="my-5 mx-1">فواتير المصروفات</h1>
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
        <th scope="col" class="col_check_head">التعديل</th>
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
        <td><input class="form-check-input" disabled <?php echo $row['cash_a_check']; ?>  type="checkbox" name="cash_a_check"></th>
        <td><input class="form-check-input" disabled <?php echo $row['budget_recording']; ?>  type="checkbox" name="budget_recording"></td>
        <td>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#edit_invoice_<?php echo $row['invoice_num']; ?>">
            <i class="fa-solid fa-pen-to-square"></i>
          </button>
        </th>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</section>
<?php
global $conn;
$sql_view = "SELECT * FROM `invoice_expenses`";
$results_view = mysqli_query($conn,$sql_view);
foreach ($results_view as $row){
	$center_id_u = $row['center'];
  $sql_center_u = "SELECT `name_center` FROM `centers` WHERE `id` = $center_id_u";
  $center_row_u = mysqli_query($conn,$sql_center_u);
  foreach ($center_row_u as $c_item_u) {
    $center_u	= $c_item_u['name_center'];
  }
  $section_id_u = $row['section'];
  $sql_section_u = "SELECT `name_section` FROM `sections` WHERE `id` = $section_id_u";
  $section_row_u = mysqli_query($conn,$sql_section_u);
  foreach ($section_row_u as $s_item_u) {
    $section_u	= $s_item_u['name_section'];
  }
  $company_id_u = $row['company'];
  $sql_company_u = "SELECT `name_company` FROM `companies` WHERE `id` = $company_id_u";
  $company_row_u = mysqli_query($conn,$sql_company_u);
  foreach ($company_row_u as $co_item_u) {
    $company_u	= $co_item_u['name_company'];
  }
?>
<!-- Modal edit invoice -->
<div class="modal fade" id="edit_invoice_<?php echo $row['invoice_num']; ?>" tabindex="-1" aria-labelledby="edit_invoice_<?php echo $row['invoice_num']; ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">التعديل على الفاتورة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
        <div class="mb-3 col-3">
          <label for="invoice_num" class="form-label">رقم الفاتورة</label>
          <input type="number" min="1" class="form-control" id="invoice_num" name="invoice_num" value="<?php echo $row['invoice_num']; ?>" readonly>
        </div>
        <div class="mb-3 col-4">
          <label for="invoice_date" class="form-label">التاريخ</label>
          <input type="date" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo $row['invoice_date']; ?>">
        </div>
        <div class="mb-3 col-2">
          <label for="invoice_amount" class="form-label">المبلغ</label>
          <input type="number" min="1" class="form-control" id="invoice_amount" name="invoice_amount" value="<?php echo $row['invoice_amount']; ?>">
        </div>
        <div class="mb-3 col-4">
          <label for="center" class="form-label">المركز</label>
          <select class="form-select" aria-label="center" name="center" onchange="select_section()" id="center">
            <?php 
              $sql_center_o = "SELECT `id`, `name_center` FROM `centers`";
              $center_row_o = mysqli_query($conn,$sql_center_o);
              foreach ($center_row_o as $c_item_o):?>
                <option value="<?php echo $c_item_o['id'];?>" <?php if($c_item_o['id'] == $center_id_u ){ echo "selected"; $center_id_o = $c_item_o['id'];}?>>
                  <?php echo $c_item_o['name_center']; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3 col-3">
          <label for="section" class="form-label">القسم</label>
          <select class="form-select" aria-label="section" name="section" id="section">
            <?php 
              $sql_section_o = "SELECT `id`, `name_section` FROM `sections` WHERE `id_center` = $center_id_u";
              $section_row_o = mysqli_query($conn,$sql_section_o);
              foreach ($section_row_o as $s_item_o):?>
                <option value="<?php echo $s_item_o['id'];?>" <?php if($s_item_o['id'] == $section_id_u){ echo "selected";}?>>
                  <?php echo $s_item_o['name_section']; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3 col-4">
          <label for="company" class="form-label">الشركة</label>
          <select class="form-select" aria-label="company" name="company">
            <?php 
              $sql_company_o = "SELECT `id`, `name_company` FROM `companies`";
              $company_row_o = mysqli_query($conn,$sql_company_o);
              foreach ($company_row_o as $co_item_o):?>
                <option value="<?php echo $co_item_o['id'];?>" <?php if($co_item_o['id'] == $company_id_u ){ echo "selected";}?>>
                  <?php echo $co_item_o['name_company']; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-floating col-12 my-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="statement" name="statement"><?php echo $row['statement']; ?></textarea>
          <label for="statement">البيان</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="checked" id="send_society" name="send_society" <?php echo $row['send_society']; ?>>
          <label class="form-check-label" for="send_society">إرسال للجمعية</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="checked" id="check_issue" name="check_issue" <?php echo $row['check_issue']; ?>>
          <label class="form-check-label" for="check_issue">إصدار شيك</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="checked" id="check_receipt" name="check_receipt" <?php echo $row['check_receipt']; ?>>
          <label class="form-check-label" for="check_receipt">إستلام شيك</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="checked" id="cash_a_check" name="cash_a_check" <?php echo $row['cash_a_check']; ?>>
          <label class="form-check-label" for="cash_a_check">صرف شيك</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="checked" id="budget_recording" name="budget_recording" <?php echo $row['budget_recording']; ?>>
          <label class="form-check-label" for="budget_recording">تسجيل ميزانية</label>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="del_invoice" value="حذف الفاتورة" class="btn btn-danger">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <input type="submit" name="updat_invoice" value="حفظ التعديل" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<div class="box" style="display: none;">
  <?php 
    //  WHERE `id_center` = $center_id_u
    $sql_section_o = "SELECT `id`, `name_section`,`id_center` FROM `sections`";
    $section_row_o = mysqli_query($conn,$sql_section_o);
    foreach ($section_row_o as $s_item_o):?>
      <div class="section_item" data-center="<?php echo $s_item_o['id_center'];?>" data-value="<?php echo $s_item_o['id'];?>">
        <?php echo $s_item_o['name_section']; ?>
      </div>
  <?php endforeach; ?>
</div>
<?php include_once('../../include/footer_pages.php'); ?>
