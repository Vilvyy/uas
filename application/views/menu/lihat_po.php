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
      <h2>List PO</h2>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-offset-10">
        <a href="<?=base_url('index.php/tambah/tambah_po')?>" class="btn btn-lg btn-primary">Tambahkan</a>
      </div>

      <div>&nbsp;</div>

      <div class="col-md-12">
        <table class="table table-bordered table-responsive table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor Pre Orer</th>
              <th>Tanggal Pre Order</th>
              <th>Status</th>
              <th>Supplier</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($data_po->result() as $row){ ?>
              <tr>
               <td><?=$no++?></td>
               <td><?=$row->po_no?></td>
               <td><?=$row->tgl_po?></td>
               <td><?=ucwords($row->stat_po)?></td>
               <td><?=$row->nama_supplier?></td>                 
               <td><a href="<?=base_url('index.php/menu/detail_po/'.$row->po_no)?>" class="btn btn-primary btn-xs">Detail</a> <a href="<?=base_url('index.php/hapus/hapus_po/'.$row->po_no)?>" class="btn btn-danger btn-xs">Hapus</a>
                <p></p>
                <p><a href="<?=base_url('index.php/status/pending/'.$row->po_no)?>" class="btn btn-xs <?=(($row->stat_po=="paid") ? "hidden" : "btn-warning")?>">Pending</a>
                <a href="<?=base_url('index.php/status/process/'.$row->po_no)?>" class="btn btn-xs <?=(($row->stat_po=="paid") ? "hidden" : "btn-warning")?>">Process</a>
                <a href="<?=base_url('index.php/status/delivery/'.$row->po_no)?>" class="btn <?=(($row->stat_po=="paid") ? "hidden" : "btn-warning")?> btn-xs">Delivery</a>
                <a href="<?=base_url('index.php/status/success/'.$row->po_no)?>" class="btn <?=(($row->stat_po=="paid") ? "hidden" : "btn-warning")?> btn-xs">Success</a> 
                <a href="<?=base_url('index.php/status/paid/'.$row->po_no)?>" class="btn btn-success <?=(($row->stat_po=="paid") ? "disabled btn-md" : "btn-xs btn-warning")?>">Paid</a> 
                </p>

               </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
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
