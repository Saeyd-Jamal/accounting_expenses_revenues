<?php include_once('../../include/header_pages.php'); ?>
<?php require_once('../../include/config.php'); ?>
<h1 class="my-5 mx-1">تقارير الواردات</h1>
<form action="reports.php" method="POST" target="_blank" class="d-flex flex-wrap justify-content-between align-items-center mx-1">
  <div class="mb-3 col-3">
    <label for="start_date" class="form-label">من تاريخ</label>
    <input type="date" class="form-control" id="start_date" name="start_date">
  </div>
  <div class="mb-3 col-3">
    <label for="end_date" class="form-label">إلى تاريخ</label>
    <input type="date" class="form-control" id="end_date" name="end_date">
  </div>
  <div class="mb-3 col-2">
    <label for="center" class="form-label">المركز</label>
    <select class="form-select" aria-label="center" name="center" onchange="select_section()" id="center">
      <option selected value="-">----</option>
      <?php 
        $sql_center_o = "SELECT `id`, `name_center` FROM `centers`";
        $center_row_o = mysqli_query($conn,$sql_center_o);
        foreach ($center_row_o as $c_item_o):?>
          <option value="<?php echo $c_item_o['id'];?>">
            <?php echo $c_item_o['name_center']; ?>
          </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3 col-2">
    <label for="section" class="form-label">القسم</label>
    <select class="form-select" aria-label="section" name="section" id="section">
      <option selected value="-">----</option>
      <?php 
        $sql_section_o = "SELECT `id`, `name_section` FROM `sections` WHERE `id_center` = $center_id_u";
        $section_row_o = mysqli_query($conn,$sql_section_o);
        foreach ($section_row_o as $s_item_o):?>
          <option value="<?php echo $s_item_o['id'];?>">
            <?php echo $s_item_o['name_section']; ?>
          </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3 col-3">
    <label for="company" class="form-label">الشركة</label>
    <select class="form-select" aria-label="company" name="company">
      <option selected value="-">----</option>
      <?php 
        $sql_company_o = "SELECT `id`, `name_company` FROM `companies`";
        $company_row_o = mysqli_query($conn,$sql_company_o);
        foreach ($company_row_o as $co_item_o):?>
          <option value="<?php echo $co_item_o['id'];?>">
            <?php echo $co_item_o['name_company']; ?>
          </option>
      <?php endforeach; ?>
    </select>
  </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="checked" id="send_society" name="send_society">
      <label class="form-check-label" for="send_society">إرسال للجمعية</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="checked" id="check_issue" name="check_issue">
      <label class="form-check-label" for="check_issue">إصدار شيك</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="checked" id="check_receipt" name="check_receipt">
      <label class="form-check-label" for="check_receipt">إستلام شيك</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="checked" id="cash_a_check" name="cash_a_check">
      <label class="form-check-label" for="cash_a_check">صرف شيك</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="checked" id="budget_recording" name="budget_recording">
      <label class="form-check-label" for="budget_recording">تسجيل ميزانية</label>
    </div>
    <div class="col-auto my-3">
      <input type="submit" class="btn btn-primary mb-3" value="طباعة التقرير" name="print_reports">
    </div>
</form>
<div class="box" style="display: none;">
  <?php 
    $sql_section_o = "SELECT `id`, `name_section`,`id_center` FROM `sections`";
    $section_row_o = mysqli_query($conn,$sql_section_o);
    foreach ($section_row_o as $s_item_o):?>
      <div class="section_item" data-center="<?php echo $s_item_o['id_center'];?>" data-value="<?php echo $s_item_o['id'];?>">
        <?php echo $s_item_o['name_section']; ?>
      </div>
  <?php endforeach; ?>
</div>

<?php include_once('../../include/footer_pages.php'); ?>