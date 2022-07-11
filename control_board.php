<?php include_once('include/header.php'); ?>
<?php require_once('include/config.php'); ?>
<!-- centers -->
<?php 
global $conn;
if(isset($_POST['del_center'])){
  $id_del_center = $_POST['id_center'];
  $sql_del_center_section = "DELETE FROM `sections` WHERE `id_center` = $id_del_center";
  $result_del_center_section = mysqli_query($conn,$sql_del_center_section);
  $sql_del_center = "DELETE FROM `centers` WHERE `id` = $id_del_center";
  $result_del_center = mysqli_query($conn,$sql_del_center);
  header("location:control_board.php");
}
if(isset($_POST['edit_center'])){
  $id_edit_center = $_POST['id_center'];
  $name_edit_center = $_POST['name_center'];
  $sql_update_center = "UPDATE `centers` SET `name_center`='$name_edit_center' WHERE `id` = $id_edit_center";
  $result_update_center = mysqli_query($conn,$sql_update_center);
  header("location:control_board.php");
}
if(isset($_POST['add_center'])){
  $name_center_add = $_POST['name_center'];
  $sql_add_center = "INSERT INTO `centers` VALUES ('','$name_center_add')";
  $result_add_center = mysqli_query($conn,$sql_add_center);
  header("location:control_board.php");
}
?>
<!-- section -->
<?php 
global $conn;
if(isset($_POST['add_section'])){
  $name_section_add = $_POST['name_section'];
  $name_center_section_add = $_POST['center_section'];
  $sql_add_section = "INSERT INTO `sections`(`id`, `name_section`, `id_center`) VALUES ('','$name_section_add',$name_center_section_add)";
  $result_add_section = mysqli_query($conn,$sql_add_section);
  header("location:control_board.php");
}
if(isset($_POST['del_section'])){
  $id_del_section = $_POST['id_section'];
  $sql_del_section = "DELETE FROM `sections` WHERE `id` = $id_del_section";
  $result_del_section = mysqli_query($conn,$sql_del_section);
  header("location:control_board.php");
}
if(isset($_POST['edit_section'])){
  $id_edit_section = $_POST['id_section'];
  $name_edit_section = $_POST['name_section'];
  $center_section_edit = $_POST['center_section_edit'];
  $sql_update_section = "UPDATE `sections` SET `name_section`='$name_edit_section',`id_center`= $center_section_edit WHERE `id` = $id_edit_section";
  $result_update_section = mysqli_query($conn,$sql_update_section);
  header("location:control_board.php");
}
?>
<!-- company -->
<?php 
global $conn;
if(isset($_POST['add_company'])){
  $name_company_add = $_POST['name_company'];
  $sql_add_company = "INSERT INTO `companies`(`id`, `name_company`) VALUES ('','$name_company_add')";
  $result_add_company = mysqli_query($conn,$sql_add_company);
  header("location:control_board.php");
}
if(isset($_POST['del_company'])){
  $id_del_company = $_POST['id_company'];
  $sql_del_company = "DELETE FROM `companies` WHERE `id` = $id_del_company";
  $result_del_company = mysqli_query($conn,$sql_del_company);
  header("location:control_board.php");
}
if(isset($_POST['edit_company'])){
  $id_edit_company = $_POST['id_company'];
  $name_edit_company = $_POST['name_company'];
  $sql_update_company = "UPDATE `companies` SET `name_company`='$name_edit_company' WHERE `id` = $id_edit_company";
  $result_update_company = mysqli_query($conn,$sql_update_company);
  header("location:control_board.php");
}
?>
<h1 class="my-5">لوحة التحكم</h1>
<section>
  <div class="container-fluid row" style="gap: 40px;">
    <div class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-sack-dollar my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <button class="card-title fs-1 bg-dark text-light border-0" data-bs-toggle="modal" data-bs-target="#centers">المراكز</button>
      </div>
    </div>
    <div class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-circle-dollar-to-slot my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <button class="card-title fs-1 bg-dark text-light border-0" data-bs-toggle="modal" data-bs-target="#sections">أقسام المراكز</button>
      </div>
    </div>
    <div class="card col-3 text-center py-5 bg-dark text-light">
      <div class="card-img-top">
        <i class="fa-solid fa-screwdriver-wrench my-3 fs-1"></i>
      </div>
      <div class="card-body">
        <button class="card-title fs-1 bg-dark text-light border-0" data-bs-toggle="modal" data-bs-target="#companies">الشركات</button>
      </div>
    </div>
  </div>
</section>

<!-- Modal centers -->
<div class="modal fade" id="centers" tabindex="-1" aria-labelledby="centersLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="centersLabel">المراكز</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="table-dark">
              <th scope="col" style="width: 10px;">رقم</th>
              <th scope="col">المركز</th>
              <th scope="col"  style="width: 10px;">التعديل</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            global $conn;
            $sql_view_center = "SELECT * FROM `centers`";
            $result_centers = mysqli_query($conn,$sql_view_center);
            foreach( $result_centers as $row_center_view ):
            ?>
            <tr>
              <th scope="col" style="width: 10px;"><?php echo $row_center_view['id']; ?></th>
              <td><?php echo $row_center_view['name_center']; ?></td>
              <td>
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#edit_center_<?php echo $row_center_view['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_center">إضافة مركز</button>
      </div>
    </div>
  </div>
</div>
<?php 
global $conn;
$sql_view_center = "SELECT * FROM `centers`";
$result_centers = mysqli_query($conn,$sql_view_center);
foreach( $result_centers as $row_center_view ):
?>
<!-- Modal edit center -->
<div class="modal fade" id="edit_center_<?php echo $row_center_view['id']; ?>" tabindex="-1" aria-labelledby="edit_center_<?php echo $row_center_view['id']; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_center_<?php echo $row_center_view['id']; ?>Label">التعديل على المركز</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
            <input type="number" min="1" class="form-control" id="id_center" name="id_center" value="<?php echo $row_center_view['id']; ?>" hidden>
          <div class="mb-3 col-12">
            <label for="name_center" class="form-label">إسم المركز</label>
            <input type="text" class="form-control" id="name_center" name="name_center" value="<?php echo $row_center_view['name_center']; ?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="edit_center">حفظ التعديل</button>
        <button type="submit" class="btn btn-danger" name="del_center">حذف المركز</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Modal add center -->
<div class="modal fade" id="add_center" tabindex="-1" aria-labelledby="add_centerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_centerLabel">إضافة مركز جديد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
          <div class="mb-3 col-12">
            <label for="name_center" class="form-label">إسم المركز الجديد</label>
            <input type="text" class="form-control" id="name_center" name="name_center" value="" placeholder="الاسم">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add_center">إضافة</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal sections -->
<div class="modal fade" id="sections" tabindex="-1" aria-labelledby="sectionsLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sectionsLabel">أقسام المراكز</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="table-dark">
              <th scope="col" style="width: 10px;">رقم</th>
              <th scope="col">القسم</th>
              <th scope="col">المركز</th>
              <th scope="col"  style="width: 10px;">التعديل</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            global $conn;
            $sql_view_section = "SELECT * FROM `sections`";
            $result_sections = mysqli_query($conn,$sql_view_section);
            foreach( $result_sections as $row_section_view ):
              $center_id = $row_section_view['id_center'];
              $sql_center = "SELECT `name_center` FROM `centers` WHERE `id` = $center_id";
              $center_row = mysqli_query($conn,$sql_center);
              foreach ($center_row as $c_item) {
                $center	= $c_item['name_center'];
              }
            ?>
            <tr>
              <th scope="col" style="width: 10px;"><?php echo $row_section_view['id']; ?></th>
              <td><?php echo $row_section_view['name_section']; ?></td>
              <td><?php echo $center; ?></td>
              <td>
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#edit_section_<?php echo $row_section_view['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_section">إضافة قسم</button>
      </div>
    </div>
  </div>
</div>
<?php 
global $conn;
$sql_view_section = "SELECT * FROM `sections`";
$result_sections = mysqli_query($conn,$sql_view_section);
foreach( $result_sections as $row_section_view ):
?>
<!-- Modal edit section -->
<div class="modal fade" id="edit_section_<?php echo $row_section_view['id']; ?>" tabindex="-1" aria-labelledby="edit_section_<?php echo $row_section_view['id']; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_section_<?php echo $row_section_view['id']; ?>Label">التعديل على القسم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
            <input type="number" min="1" class="form-control" id="id_section" name="id_section" value="<?php echo $row_section_view['id']; ?>" hidden>
          <div class="mb-3 col-12">
            <label for="name_section" class="form-label">القسم</label>
            <input type="text" class="form-control" id="name_section" name="name_section" value="<?php echo $row_section_view['name_section']; ?>">
          </div>
          <div class="mb-3 col-12">
            <select class="form-select" aria-label="center" name="center_section_edit">
              <option selected>----</option>
              <?php 
                $sql_center_o = "SELECT `id`, `name_center` FROM `centers`";
                $center_row_o = mysqli_query($conn,$sql_center_o);
                foreach ($center_row_o as $c_item_o):?>
                  <option value="<?php echo $c_item_o['id'];?>" <?php if($c_item_o['id'] == $row_section_view['id_center']){ echo "selected";} ?>>
                    <?php echo $c_item_o['name_center']; ?>
                  </option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="edit_section">حفظ التعديل</button>
        <button type="submit" class="btn btn-danger" name="del_section">حذف المركز</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal add section -->
<div class="modal fade" id="add_section" tabindex="-1" aria-labelledby="add_sectionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_sectionLabel">إضافة قسم جديد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
          <div class="mb-3 col-12">
            <label for="name_section" class="form-label">إسم القسم الجديد</label>
            <input type="text" class="form-control" id="name_section" name="name_section" value="" placeholder="القسم">
          </div>
          <div class="mb-3 col-12">
            <label for="name_center" class="form-label">مركز القسم</label>
            <select class="form-select" aria-label="center" name="center_section">
              <option selected>----</option>
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
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add_section">إضافة</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal co -->
<div class="modal fade" id="companies" tabindex="-1" aria-labelledby="companiesLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="companiesLabel">الشركات</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="table-dark">
              <th scope="col" style="width: 10px;">رقم</th>
              <th scope="col">الشركة</th>
              <th scope="col" style="width: 10px;">التعديل</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            global $conn;
            $sql_view_company = "SELECT * FROM `companies`";
            $result_companies = mysqli_query($conn,$sql_view_company);
            foreach( $result_companies as $row_company_view ):
            ?>
            <tr>
              <th scope="col" style="width: 10px;"><?php echo $row_company_view['id']; ?></th>
              <td><?php echo $row_company_view['name_company']; ?></td>
              <td>
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#edit_company_<?php echo $row_company_view['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_company">إضافة شركة</button>
      </div>
    </div>
  </div>
</div>
<?php 
global $conn;
$sql_view_company = "SELECT * FROM `companies`";
$result_companies = mysqli_query($conn,$sql_view_company);
foreach( $result_companies as $row_company_view ):
?>
<!-- Modal edit co -->
<div class="modal fade" id="edit_company_<?php echo $row_company_view['id']; ?>" tabindex="-1" aria-labelledby="edit_company_<?php echo $row_company_view['id']; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_company_<?php echo $row_company_view['id']; ?>Label">التعديل على الشركة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
            <input type="number" min="1" class="form-control" id="id_company" name="id_company" value="<?php echo $row_company_view['id']; ?>" hidden>
          <div class="mb-3 col-12">
            <label for="name_company" class="form-label">إسم الشركة</label>
            <input type="text" class="form-control" id="name_company" name="name_company" value="<?php echo $row_company_view['name_company']; ?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="edit_company">حفظ التعديل</button>
        <button type="submit" class="btn btn-danger" name="del_company">حذف الشركة</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal add co -->
<div class="modal fade" id="add_company" tabindex="-1" aria-labelledby="add_companyLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_companyLabel">إضافة مركز جديد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" class="d-flex flex-wrap justify-content-between mx-1">
          <div class="mb-3 col-12">
            <label for="name_company" class="form-label">إسم المركز الجديد</label>
            <input type="text" class="form-control" id="name_company" name="name_company" value="" placeholder="الاسم">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add_company">إضافة</button>
        </form>
      </div>
    </div>
  </div>
</div>



<?php include_once('include/footer.php'); ?>