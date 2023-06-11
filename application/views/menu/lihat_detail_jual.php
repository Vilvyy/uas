<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/navbar-static-top/">

    <title>List Supplier</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-theme.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php $this->load->view('navbar.php');?>
  <div class="container">
    <div class="col-md-4">
      <h2>List PO Detail Kode PO <?=$no_faktur?></h2>
    </div>
  </div>

  <div class="container">

      <div>&nbsp;</div>

      	<div class="col-md-6 col-lg-6 col-sm-6">
      		        <a href="<?=base_url('index.php/menu/jual')?>" class="btn btn-lg btn-primary">Back</a>
      		<h3>INVOICE</h3>
      		<br>
      		<h4><b>Nama Inventaris</b></h4>
      		<h4>Alamat Inventaris: Alamat Inventaris</h4>
      		<h4>Nomor Telp: Nomor Telp Inventaris </h4>
      		<h4>Nomor Faktur: <?=$no_faktur?></h4>
      		<h4>Tanggal Faktur: <?=$tgl_faktur?></h4>
      		<h2>Status</h2>
	      	<p>
	      		<h3><code><?=ucfirst("Terjual")?></code></h3>
	      	</p>
      	</div>
  		<div class="col-md-12 col-lg-12 col-sm-12">
  		<h2>My Order</h2>
  		<table class="table table-responsive table-bordered">
  		<tr>
  			<th>No</th>
  			<th>Menu Name</th>
  			<th>Quantity</th>
  			<th>Price</th>
  			<th>Sub Total</th>
  		</tr>
  		<tr>
  			<?php $i=1; ?>
		      		<td><?=$i++?></td>
		      		<td><?=ucwords($nama_barang)?></td>
		      		<td><?=$qty?></td>
		      		<td>Rp<?=number_format($harga_jual,'0','.','.')?></td>
		      		<td>Rp<?=number_format($sub_total,'0','.','.')?></td>
		      	</tr>
		      	<tr style="font-weight:bold">
		      		<td colspan="4" align="right">Total</td>
		      		<td>Rp<?=number_format($total,'0','.','.')?></td>
		      	</tr>
      	</table>
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
