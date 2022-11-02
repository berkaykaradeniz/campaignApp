<?php
session_start();
?>

<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Mivento Assessment</title>

    <style>
      .container {
        margin-top: 2rem !important;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <?php 
            if (isset($_SESSION['insert_fail'])){
            ?>
              <div class="alert alert-danger" id="wrong">Hatalı Kayıt Sayısı : <?php echo $_SESSION['insert_fail'];?> </div>
            <?php
              }
            ?>
            <?php 
            if (isset($_SESSION['insert_success'])){
            ?>
              <div class="alert alert-success" id="success">Başarılı Kayıt Sayısı : <?php echo $_SESSION['insert_success'];?></div>
            <?php
              }
?>
            <div class="mb-3">
              <form class="form-horizontal needs-validation" action="api/add_details.php" method="post" name="upload_excel" enctype="multipart/form-data">
              <label for="campaign-name" class="form-label">Kampanya Adı</label>
              <input type="text" class="form-control" id="campaign-name" name="campaign_name" required />
            </div>
            <div class="mb-3">
              <select class="form-select" id="campaign" name="campaign" required>
                <option selected disabled value="">Tarih Seçin</option>
                <option value="1">Temmuz 2022</option>
                <option value="2">Ağustos 2022</option>
                <option value="3">Eylül 2022</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="campaign-file" class="form-label">Dosya Yükleyin</label>
              <input class="form-control" type="file" name="file" id="campaign-file" required />
            </div>
            <div class="d-grid">
              <button class="btn btn-primary btn-block" name="submit" type="submit">Yükle</button>
            </form>
            </div>
        </div>
      </div>
    </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="js/functions.js"></script>

    <script src="js/jquery-csv.js"></script>


   
    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    <script>


      (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();

              }
              form.classList.add('was-validated');

            }, false);
          });
      })();

   
    </script>
  </body>
</html>
