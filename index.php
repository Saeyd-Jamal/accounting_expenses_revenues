<?php require_once('include/config.php');?>
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
  <link rel="stylesheet" href="static/css/all.min.css">
  <!-- css file -->
  <link rel="stylesheet" href="static/css/normalize.css">
  <link rel="stylesheet" href="static/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="static/css/style.css">
  <title>Accounting</title>
</head>
<body>
<form class="login d-flex flex-column align-items-center col-lg-4 col-md-8" method="post" action="">
  <div class="user-box my-3 col-8">
    <label for="username" class="form-label">إسم المستخدم</label>
    <input type="text" name="username" id="username" class="form-control" required>
  </div>
  <div class="password-box my-3 col-8">
    <label for="password" class="form-label">كلمة السر</label>
    <input type="password" name="password" id="password" class="form-control" required>
  </div>
  <div class="col-auto my-3">
    <input name="log" type="submit" class="btn btn-primary mb-3" value="تسجيل الدخول">
  </div>
    <?php
    global $conn;
    $sql = "SELECT * FROM `users`";
    $results = mysqli_query($conn,$sql);
    $verification_value = "";
    foreach ($results as $row){
        if (isset($_POST['log'])){
            if($row['username'] != $_POST['username']){
                $verification_value = 'Fail';
                continue;
            }elseif($row['password'] != $_POST['password']){
                echo'<div>يوجد خطأ في كلمة السر</div>';
                $verification_value = 'Succeeded';
                break;
            }else{
                $verification_value = 'Succeeded';
                $id_user = $row['id'];
                header("location:home.php?id=$id_user");
                break;
            }
        }
    }
    if (isset($_POST['log'])){
        if ($verification_value != 'Succeeded'){
            echo'<div> لم ينجح تسجيل الدخول تأكد من اليوزر نيم</div>';
        }
    }
    ?>
</form>


<?php include_once('include/footer.php'); ?>