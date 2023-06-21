<div class="container-fluid">
    <div class="row mt-10">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right"></div>
                <h4 class="page-title">Klasemen</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <a href="<?php echo site_url('klasemen/clear')?>">
                        <button type="button" class="btn btn-primary btn-sm">Clear</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Klub</th>
                                <th>Ma</th>
                                <th>Me</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                            $no = 1; //no default 1
                            foreach ($klasemen as $baris) { 
                            ?>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $baris->klub; ?></td>
                                <td><?php echo $baris->main?></td>
                                <td><?php echo $baris->menang?></td>
                                <td><?php echo $baris->seri; ?></td>
                                <td><?php echo $baris->kalah; ?></td>
                                <td><?php echo $baris->gol_menang; ?></td>
                                <td><?php echo $baris->gol_kalah; ?></td>
                                <td><?php echo $baris->point; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





