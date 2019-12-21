<?php
$semuadata=array();
    if(isset($_POST['lihat']))
    {
        $tanggal_mulai = $_POST['awal'];
        $tanggal_berhenti = $_POST['akhir'];
        $ambil = $conn->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tanggal_mulai' and '$tanggal_berhenti' ");
        while($pecah = $ambil->fetch_assoc())
        {
            $semuadata[]=$pecah;
        }

        // echo "<pre>";
        //     print_r ($semuadata);
        // echo "<pre>";
    }
?>

<h1>LAPORAN PENJUALAN</h1>

<form action="" method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group"> 
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" name="awal">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Berakhir</label>
                <input type="date" class="form-control" name="akhir">
            </div>
        </div>
        <div class="col-md-2">
            <label>&nbsp</label><br>
            <button class="btn btn-primary" name="lihat">Lihat</button>
        </div>
    </div>
</form>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($semuadata as $key => $value): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value['nama_pelanggan']; ?></td>
            <td><?php echo $value['tanggal_pembelian']; ?></td>
            <td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>