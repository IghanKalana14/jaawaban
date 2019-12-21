<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>edit caleg</title>
  </head>
  <body>
    
    
            <div class="container">
              <h1>Edit Caleg</h1>

            <?php 
              
              include 'koneksi.php';
              $ambil = $conn->query("SELECT * FROM tb_partai WHERE id_partai = '$_GET[id]'");
              $pecah = $ambil->fetch_assoc();

            ?>
            <br>
            <br>

            <form method="POST" enctype="multipart/form-data">
              
              <div class="form-group">
                <label>Nama Partai :</label>
                <input type="text" name="nama" class="form-control" value="<?= $pecah['name']; ?>">
              </div>
              <div class="form-group">
                <button class="btn btn-primary" name="ubah">Simpan</button>
              </div>
              
            </form> 
            </div> 

            <?php 
              if (isset($_POST['ubah'])) {
                 
                  $conn->query("UPDATE tb_partai SET 
                  name_partai='$_POST[nama]' 
                  WHERE id_caleg='$_GET[id]' ");
                

                echo "<script>
                    alert('Data produk berhasil di ubah');
                    document.location.href = 'count.php';
                  </script>";
              }
            ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>