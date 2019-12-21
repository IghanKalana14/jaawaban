<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>count</title>
  </head>
  <body>
    
<?php 
  $conn = mysqli_connect("localhost", "root", "", "count");
?>


 
<div class="container">
    <br>
    <br>
    <br>
    <table class="table table-striped">

    <thead>
        <th>Nomor</th>
        <th>Nama Caleg</th>
        <th>partai</th>
        <th>vote</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        
        <?php $ambil = $conn->query("SELECT * FROM tb_caleg JOIN tb_partai ON tb_partai.id_partai = tb_caleg.id_partai"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $pecah['name']; ?></td>
            <td><?= $pecah['name_partai']; ?></td>
            <td><?= $pecah['earned_vote']; ?></td>
            <td>
                <a href="editcaleg.php?id=<?php echo $pecah['id_caleg']; ?>" class="btn btn-info">EDIT</a>
                <a href="hapuscaleg.php?id=<?php echo $pecah['id_caleg']; ?>" class="btn btn-danger">HAPUS</a>
            </td>

        </tr>
        <?php $nomor++; ?>
        <?php } ?> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahcaleg">Tambah Produk</button>

        <!-- Modal -->
            <div class="modal fade" id="tambahcaleg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Nama Caleg</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="vote">vote</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>            

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="save" class="btn btn-primary">Tambah Produk</button>
                    </form>
                  
                  </div>
                </div>
              </div>
            </div>
            <?php 
                if (isset($_POST['save'])) {
                  $conn->query("INSERT INTO tb_caleg(name, earned_vote) VALUES 
                      ('$_POST[nama]' , '$_POST[vote]')");

                  echo "<script>
                        alert('Data tersimpan');
                        document.location.href = 'count.php';
                      </script>";
                }
            ?> 
    </tbody>
</table>

    <br>
    <br>
    <br>

<table class="table table-striped">

    <thead>
        <th>Nomor</th>
        <th>Nama Partai</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        
        <?php $ambil = $conn->query("SELECT * FROM tb_partai"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= $pecah['name_partai']; ?></td>
            <td>
                <a href="editpartai.php?id=<?php echo $pecah['id_partai']; ?>" class="btn btn-info">EDIT</a>
                <a href="hapuspartai.php?id=<?php echo $pecah['id_partai']; ?>" class="btn btn-danger">HAPUS</a>
            </td>
     
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahpartai">Tambah Produk</button>

         <!-- Modal -->
            <div class="modal fade" id="tambahpartai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Nama partai</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>           

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="save" class="btn btn-primary">Tambah partai</button>
                    </form>
                  
                  </div>
                </div>
              </div>
            </div>
            <?php 
                if (isset($_POST['save'])) {
                  $conn->query("INSERT INTO tb_partai(name_partai) VALUES 
                      ('$_POST[nama]')");

                  echo "<script>
                        alert('Data tersimpan');
                        document.location.href = 'count.php';
                      </script>";
                }
            ?> 
    </tbody>

</table>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>