<div class="container-fluid">
    <div class="row mt-10">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right"></div>
                <h4 class="page-title">Data Skor</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <p>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Data</button>
                        <a href="<?php echo site_url('skor/add_multiple')?>">
                            <button type="button" class="btn btn-primary btn-sm">Tambah Multiple</button>
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
                                <th>Klub 1</th>
                                <th>Skor </th>
                                <th>VS</th>
                                <th>Skor </th>
                                <th>Klub 2</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            $no = 1; //no default 1
                            foreach ($skor as $baris) { 
                            ?>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $baris->klub_pertama; ?></td>
                                <td><?php echo $baris->skor_klub_pertama?></td>
                                <td></td>
                                <td><?php echo $baris->skor_klub_kedua?></td>
                                <td><?php echo $baris->klub_kedua; ?></td>
                                <td><button type="button" class="far fa-trash-alt bg-danger" data-toggle="modal" data-target="#hapus<?php echo $baris->id_skor; ?>" ></button></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="user" action="<?php echo site_url('skor/input');?>" method="post" enctype="multipart/form-data">
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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Klub Pertama</label>
                                <select class="form-control" name="klub_pertama" placeholder="Klub Pertama">
                                    <option value="" hidden disabled selected>-Pilih-</option>
                                    <?php foreach($klub->result() as $row):?>
                                    <option value="<?php echo $row->nama_klub;?>"><?php echo $row->nama_klub;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Skor</label>
                            <input type="text" class="form-control" name="skor_pertama" value="" placeholder="Skor Klub Pertama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Klub Kedua</label>
                                <select class="form-control" name="klub_kedua" placeholder="Klub Kedua">
                                    <option value="" hidden disabled selected>-Pilih-</option>
                                    <?php foreach($klub->result() as $row):?>
                                    <option value="<?php echo $row->nama_klub;?>"><?php echo $row->nama_klub;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Skor</label>
                            <input type="text" class="form-control" name="skor_kedua" value="" placeholder="Skor Klub Kedua">
                            </div>
                        </div>
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

<?php foreach($skor as $baris): ?>
<form class="user" action="<?php echo site_url('skor/delete');?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_skor" value="<?php echo $baris->id_skor; ?>">
    <div class="modal fade" id="hapus<?php echo $baris->id_skor; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



