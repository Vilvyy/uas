    <!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url('index.php/menu/index')?>">Aplikasi Inventaris</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=base_url('index.php/menu/jual')?>">Jual</a></li>
            <li><a href="<?=base_url('index.php/menu/po')?>">PO</a></li>
            <li><a href="<?=base_url('index.php/menu/index')?>">Barang</a></li>
            <li><a href="<?=base_url('index.php/menu/supplier')?>">Supplier</a></li>
            <li><a href="<?=base_url('index.php/menu/pengguna')?>">Pengguna</a></li>
            <li><a href="<?=base_url('index.php/login/do_logout')?>">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>