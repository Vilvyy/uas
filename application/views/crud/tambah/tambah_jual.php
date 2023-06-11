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

    <title>List Barang</title>

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
        <div>&nbsp;</div>
  <div class="container">
    <div>
      <a href="<?=base_url('index.php/menu/jual')?>" class="btn btn-lg btn-primary">Back</a>
    </div>



<form action="<?=base_url('index.php/tambah/aksi_tambah_jual')?>" method="post">
  <div class="row">
    <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <h3>Tanggal</h3>
            <input type="date" name="date" class="form-control" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <h3>Nama Barang</h3>
              <select name="kode_brg" class="form-control" required>
                <option>-- Pilih Status Menu</option>
            <?php foreach($data_barang->result() as $row) { ?>
                <option value="<?=$row->kode_brg?>"><?=ucwords($row->nama_brg)?></option>
            <?php } ?>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h3>Kuantitas</h3>
            <input type="number" name="qty" class="form-control" required>
          </div>
        </div>

        <div>&nbsp;</div>

        <div class="row">
          <div class="col-md-6">
            <input type="submit" name="submit" value="Submit" class="btn btn-md btn-primary">
          </div>        
        </div>
    </div>
  </div>
</form>
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
