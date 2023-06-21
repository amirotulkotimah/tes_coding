<!DOCTYPE html>
<html>

<head>
    <title>Codeigniter - Multiple Input Dinamis dengan JQuery</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <form name="add_name" method="POST" action="<?php echo site_url('skor/insert_multiple')?>">
        <h2 class="text-center">Multiple Input</h2>
        <button type="button" name="add" id="add" class="btn btn-primary">Tambah</button>
        <br><br>
            <table class="table" id="multiple_input">
                <tr>
                    <td>
                      <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Klub Pertama</label>
                                <select class="form-control" name="klub_pertama[]" placeholder="Klub Pertama">
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
                            <input type="text" class="form-control" name="skor_pertama[]" value="" placeholder="Skor Klub Pertama">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="kode[]" value="<?php echo strtoupper(random_string('alnum', 5))?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Klub Kedua</label>
                                <select class="form-control" name="klub_kedua[]" placeholder="Klub Kedua">
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
                            <input type="text" class="form-control" name="skor_kedua[]" value="" placeholder="Skor Klub Kedua">
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Simpan" />
                </div>             
                    

    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#multiple_input').append('<tr id="row' + i + '" class="dynamic-added"><td><div class="row"><div class="col-sm-6"><div class="form-group"><label>Klub Pertama</label><select class="form-control" name="klub_pertama[]" placeholder="Klub Pertama"><option value="" hidden disabled selected>-Pilih-</option><?php foreach($klub->result() as $row):?><option value="<?php echo $row->nama_klub;?>"><?php echo $row->nama_klub;?></option><?php endforeach;?></select></div></div><div class="col-sm-6"><div class="form-group"><label>Skor</label><input type="text" class="form-control" name="skor_pertama[]" value="" placeholder="Skor Klub Pertama"></div></div></div><div class="row"><div class="col-sm-6"><div class="form-group"><label>Klub Kedua</label><select class="form-control" name="klub_kedua[]" placeholder="Klub Kedua"><option value="" hidden disabled selected>-Pilih-</option><?php foreach($klub->result() as $row):?><option value="<?php echo $row->nama_klub;?>"><?php echo $row->nama_klub;?></option><?php endforeach;?></select></div></div><div class="col-sm-6"><div class="form-group"><label>Skor</label><input type="text" class="form-control" name="skor_kedua[]" value="" placeholder="Skor Klub Kedua"></div></div></div></div></td><td><input type="hidden" name="kode[]" value="<?php echo strtoupper(random_string('alnum', 4))?>"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
</body>

</html>