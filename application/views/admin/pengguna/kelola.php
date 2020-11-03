<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">

						<div class="panel-heading">
							<h3 class="panel-title">Data Pendaftar</h3>
						
						</div>
                        <div class="panel-body">
                            <button class="btn btn-warning" onclick="add_supplier()">+ Tambah</button>
                                <a href="<?php echo base_url('admin/export_excel') ?>"></a>


<?php echo anchor('admin/export_excel','<button class="btn btn-info"> Export Excel</button>');?>
                               
                            </div>
						<div class="panel-body">
						
							<table class="display" id="data">
							    <thead>
							        <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Nama Siswa</th>
							            <th>NIS</th>
							            <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Ektrakurikuler</th>
							            <th>Opsi</th>
							        </tr>
							    </thead>
							    <tbody>
							        
                                    <?php $no = $this->uri->segment('3') + 1; foreach($set as $row){ ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->nama_siswa;?></td>
							            <td><?php echo $row->nis;?></td> 
							            <th><center><?php echo $row->kelas;?></center></th>
                                        <th><?php echo $row->Jenis_kelamin;?></th>
                                        <th><?php echo $row->tanggal_daftar;?></th>
                                        <th><?php echo $row->nama_ekskul;?></th>
							            <td>
							                <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_siswa;?>)"><i class="fa fa-edit"></i> Edit</button>   
							                 
							                 <?php echo anchor('pengguna/destroy/'.$row->id_siswa,'<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>');?>

							            </td>
							            </tr>
							         <?php $no++; } ?>   
							        
							    </tbody>
							</table>
						</div>
					</div>
				
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>

<script>
    
   function add_supplier(){
        $('#form')[0].reset();
        $("#myModal").modal('show');
        $('.modal-title').text('Tambah Pengguna'); // Set title to Bootstrap modal title
        $('#passwordnew').css('display','none');
        $('#password').show();
        $('#pengguna').show();
        $('#pegawai').show();
        $('#email').show();  
        $('#password label').text('Password');  
        $('[name=submit]').val('Tambah').show();
        $('#form').attr('action','<?php echo site_url('pengguna/create');?>');
        $('.modal-footer').show();
    }

    function edit_supplier(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('pengguna/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_siswa"]').val(data.id_siswa);
            $('[name="nama_siswa"]').val(data.nama_siswa);
            $('[name="password"]').val(data.password);
            $('#password').css('display','none');
            $('#passwordnew').css('display','none');
            $('#confirm').css('display','none');
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title
            $('[name=submit]').val('Edit').show();
            $('.modal-footer').show();
            $('#form').attr('action','<?php echo site_url('pengguna/update');?>');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax'+jqXHR);
        }
    });
    }
    
    function reset(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('pengguna/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_siswa"]').val(data.id_siswa);
            $('#pengguna').css('display','none');
            $('#nama_siswa').css('display','none');
            $('#password').show();
            $('#password label').text('Password Lama');
            $('#passwordnew').show();
            $('#confirm').css('display','none');
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Reset Password'); // Set title to Bootstrap modal title
            $('[name=submit]').val('Reset').show();
            $('.modal-footer').show();
            $('#form').attr('action','<?php echo site_url('pengguna/reset-password');?>');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax'+jqXHR);
        }
    });
    } 
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Jenis Kegiatan</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('pengguna/create',array('id' => 'form'));?>
        <input type="hidden"  name="id_user"/>

        <div class="form-group" id="pengguna">
            <label>NIS</label>
            <select name="id_siswa" id="" class="form-control">
                <?php foreach($set_siswa as $row_siswa){ ?>
                    <option value="<?php echo $row_siswa->id_siswa;?>"><?php echo $row_siswa->nis;?>-<?php echo $row_siswa->nama_siswa;?></option>
                <?php } ?>
            </select>
        </div>
       
        <div class="form-group" id="username">
            <label>Username</label>
            <input type="username" name="username" class="form-control">
        </div>
        <div class="form-group" id="password">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        
        <div class="form-group" id="passwordnew">
            <label>Password Baru</label>
            <input type="password" name="new_password"  class="form-control" id="new_password" >
        </div>
        <div class="form-group" id="confirm">
            <label>Konfirmasi Password</label> <small id="notif-confirm"></small>
            <input type="password" name="confirm"  class="form-control">
        </div>
       
        <div class="modal-footer">
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>

  </div>
</div>

