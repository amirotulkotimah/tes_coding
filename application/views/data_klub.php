<div class="container-fluid">
    <div class="row mt-10">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right"></div>
                <h4 class="page-title">Data Klub</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <p>
                        <a href="#">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Data</button>
                        </a>
                    </p>
                    <?php if ($validation_valid) : ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-info mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Success !</strong>
                                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('sukses');?>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($validation_error) : ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="alert alert-danger mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Ops !</strong>
                                <a href="#" class="alert-link"></a> <?php echo $this->session->flashdata('error');?>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Klub</th>
                                <th>Kota Klub</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            $no = 1; //no default 1
                            foreach ($klub as $baris) { 
                            ?>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $baris->nama_klub; ?></td>
                                <td><?php echo $baris->kota_klub?></td>
                                <td><button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->id_klub; ?>" ></button></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="user" action="<?php echo site_url('data_klub/input');?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Klub</label>
                        <input type="text" class="form-control" name="nama_klub" value="" placeholder="Nama Klub">
                    </div>
                    <div class="form-group">
                        <label>Kota Klub</label>
                        <input type="text" class="form-control" name="kota_klub" value="" placeholder="Kota Klub">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach($klub as $baris): ?>
<form class="user" action="<?php echo site_url('data_klub/delete');?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_klub" value="<?php echo $baris->id_klub; ?>">
    <div class="modal fade" id="hapus<?php echo $baris->id_klub; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php endforeach;
    ?>



