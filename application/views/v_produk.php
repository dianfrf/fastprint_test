<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Home - FastPrint</title>
        <link rel="icon" type="image/png" href="<?=base_url()?>Asset/logo.png">
        <link rel="stylesheet" href="<?=base_url()?>Asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>Asset/style.css" type="text/css">
        <link rel="stylesheet" href="<?=base_url()?>Asset/fonts/fontawesome/css/all.min.css">
        <link href="<?=base_url()?>Asset/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flash-data" data-flashdata="<?=$this->session->flashdata('msg');?>"></div>
        <div class="flash-datas" data-flashdatas="<?=$this->session->flashdata('msgi');?>"></div>
        <nav class="navbar topnavbar" style="padding-top:2rem;">
            <div class="container">
                <ul class="navbar-nav topnav">
                    <li class="nav-item-top">
                        <h3>FASTPRINT</h3>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="jumbotron home">
            <div class="container">
                <div class="cardbox">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>Daftar Produk</h1>
                            <button class="btnsecond" data-toggle="modal" data-target="#tambahmodal">Tambah Produk</button>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><h6>Semua Produk</h6></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><h6>Bisa Dijual</h6></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><h6>Tidak Bisa Dijual</h6></a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <?php foreach($produkall->result() as $p) { ?>
                                <div class="col-lg-4">
                                    <div class="cardinfo">
                                        <h6><?=$p->nama_produk?></h6>
                                        <p>Kategori : <?=$p->nama_kategori?></p>
                                        <h2>Rp. <?=number_format($p->harga)?></h2>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a onclick="Edit('<?=$p->id_produk?>');">                                   
                                                    <h6 style="color:green !important" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pen"></i> Ubah</h6>
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="<?=base_url()?>Produk_Hapus/<?=$p->id_produk?>" class="btnhapus">                                        
                                                    <h6 style="color:red !important"><i class="fa fa-trash"></i> Hapus</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <?php foreach($produkavail->result() as $p) { ?>
                                <div class="col-lg-4">
                                    <div class="cardinfo">
                                        <h6><?=$p->nama_produk?></h6>
                                        <p>Kategori : <?=$p->nama_kategori?></p>
                                        <h2>Rp. <?=number_format($p->harga)?></h2>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a onclick="Edit('<?=$p->id_produk?>');">                                   
                                                    <h6 style="color:green !important" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pen"></i> Ubah</h6>
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="<?=base_url()?>Produk_Hapus/<?=$p->id_produk?>" class="btnhapus">                                        
                                                    <h6 style="color:red !important"><i class="fa fa-trash"></i> Hapus</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <?php foreach($produkunavail->result() as $p) { ?>
                                <div class="col-lg-4">
                                    <div class="cardinfo">
                                        <h6><?=$p->nama_produk?></h6>
                                        <p>Kategori : <?=$p->nama_kategori?></p>
                                        <h2>Rp. <?=number_format($p->harga)?></h2>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a onclick="Edit('<?=$p->id_produk?>');">                                   
                                                    <h6 style="color:green !important" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pen"></i> Ubah</h6>
                                                </a>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="<?=base_url()?>Produk_Hapus/<?=$p->id_produk?>" class="btnhapus">                                        
                                                    <h6 style="color:red !important"><i class="fa fa-trash"></i> Hapus</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tambahmodal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="margin:0;text-align:left">Tambah Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:2.6rem;float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Produk_Tambah')?>" method="POST" enctype="multipart/form-data">
                            <div class="row" style="margin-top:1rem">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><h6>Nama Produk</h6></label>
                                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Nama produk harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><h6>Kategori</h6></label>
                                        <select name="kategori_id" class="form-control"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Kategori harus diisi')" oninput="this.setCustomValidity('')">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach($kategori as $k) { ?>
                                                <option value="<?=$k->id_kategori?>"><?=$k->nama_kategori?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><h6>Status</h6></label>
                                        <select name="status_id" class="form-control"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Status harus diisi')" oninput="this.setCustomValidity('')">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach($status as $s) { ?>
                                                <option value="<?=$s->id_status?>"><?=$s->nama_status?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><h6>Harga</h6></label>
                                        <input type="number" class="form-control" name="harga" placeholder="Harga"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Harga harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btnprimary" name="simpan" id="simpan" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="editmodal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="margin:0;text-align:left">Edit Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size:2.6rem;float:right">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Produk_Ubah')?>" method="POST" enctype="multipart/form-data">
                            <div class="row" style="margin-top:1rem">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><h6>Nama Produk</h6></label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Nama produk harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><h6>Kategori</h6></label>
                                        <select name="kategori_id" id="kategori_id" class="form-control"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Kategori harus diisi')" oninput="this.setCustomValidity('')">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach($kategori as $k) { ?>
                                                <option value="<?=$k->id_kategori?>"><?=$k->nama_kategori?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><h6>Status</h6></label>
                                        <select name="status_id" id="status_id" class="form-control"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Status harus diisi')" oninput="this.setCustomValidity('')">
                                            <option value="" disabled selected>--Pilih--</option>
                                            <?php foreach($status as $s) { ?>
                                                <option value="<?=$s->id_status?>"><?=$s->nama_status?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><h6>Harga</h6></label>
                                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga"
                                        autocomplete="off" required oninvalid="this.setCustomValidity('Harga harus diisi')" oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btnprimary" name="simpan" id="simpan" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url()?>Asset/js/jquery-3.2.1.min.js"></script>
        <script src="<?=base_url()?>Asset/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>Asset/sweetalert/dist/sweetalert.min.js"></script>
		<script src="<?=base_url()?>Asset/swalert.js"></script>
        <script>
            function Edit(id){
                $.ajax({
                    type  : 'GET',
                    url   : '<?=base_url('FastPrintCont/produk_get_id/')?>'+id,
                    dataType : 'json',
                    success : function(data){
                        $('#id_produk').val(data.id_produk);
                        $('#nama_produk').val(data.nama_produk);
                        $('#kategori_id').val(data.kategori_id).change();
                        $('#status_id').val(data.status_id).change();
                        $('#harga').val(data.harga);
                    }
                });
            }
        </script>
    </body>
</html>