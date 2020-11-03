<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                 <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Sistem Informasi Ekstrakurikuler MTsN 2 Palangka Raya</h3>
							<p class="panel-subtitle">Data Siswa</p>
						</div>

                        <div class="panel-body"><button class="btn btn-warning" data-toggle="modal" data-target="#myModal">+ Tambah</button>
</div>
						<div class="panel-body">
						   <div class="table-responsive">
							<table class="display" id="data">
							    <thead>
							        <tr>

                                        <th>No</th>
                                        <th>Nama</th>
							            <th>NIS</th>
                                        <th>Kelas</th>
							            <th>Jenis Kelamin</th>
							            <th>Username</th>
                                       <th>Password</th>
                                       
                                        
                                        <th>Opsi</th>
							        </tr>
							    </thead>
							    <tbody>
							        
                                    <?php $no = $this->uri->segment('3') + 1;
                                     foreach($set as $row){ ?>
                                    <?php $date = date_create($row->tanggal_lahir);
                                          $new_date = date_format($date,"d-F-Y"); ?>    
                                    <tr>

                                        <td><?php echo $no; ?></td> 
                                        <td><?php echo $row->nama_siswa;?></td> 
                                        <td><?php echo $row->nis;?></td>
							            <th><center><?php echo $row->kelas;?></center></th>
							            <th><?php echo $row->Jenis_kelamin;?></th>
                                        <th><?php echo $row->alamat;?></th>
                                        <th><?php echo $row->password;?></th>
                                        
							            <td>
							                <button class="btn btn-warning" onclick="edit_supplier(<?php echo $row->id_siswa;?>)"><i class="fa fa-edit"></i> Edit</button>   
							                 
							                 <?php echo anchor('siswa/destroy/'.$row->id_siswa,'<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>');?>

							            </td>
							            </tr>
							         <?php $no++; } ?>   
							        
							    </tbody>
							</table>
						</div>
                        </div>
					</div>
				
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>

<script>
    
 

    function edit_supplier(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('siswa/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_siswa"]').val(data.id_siswa);
                $('[name="nis"]').val(data.nis);
            $('[name="nama_siswa"]').val(data.nama_siswa);
            $('[name="tempat_lahir"]').val(data.tempat_lahir);
            $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
            $('[name="alamat"]').val(data.alamat);
            $('[name="password"]').val(data.password);

            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Siswa'); // Set title to Bootstrap modal title
            $('[name=submit]').val('Edit').show();
            $('.modal-footer').show();
            $('#form').attr('action','<?php echo site_url('siswa/update');?>');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax'+jqXHR);
        }
    });
    }
    
   
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Siswa</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('siswa/create',array('id' => 'form'));?>
        <div class="row">
            <div class="col-md-6">
                <input type="hidden"  name="id_siswa"/>

                <div class="form-group" id="pengguna">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control">
                </div>
               
                <div class="form-group" id="email">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control">
                </div>
                 
                <div class="form-group" id="email">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                </div>

                <div class="form-group" id="email">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" id="email">
                    <label>Username </label>
                    <input type="text" name="alamat" class="form-control">
                </div>
                <div class="form-group" id="email">
                    <label>Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>
                    <select name="kelas" id="" class="form-control">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            
                <div class="form-group">
            <?php 
            $tgl = date('Y-m-d');
            { ?>
            <input type="hidden" class="form-control" name="tanggal_daftar" required="" value="<?php echo $tgl; ?>">
            <?php }?>
          </div>
                <div class="form-group">
                    <label for="">Ekstrakurikuler</label>
                    <select name="rombel" id="" class="form-control">
                        <?php 


          foreach ($dtbidang->result() as $row) {
           ?> 
                        <option value="<?php echo $row->id_ekskul; ?>"><?php echo $row->nama_ekskul; ?></option>
                        

          <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        
        
        <div class="modal-footer">
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>

  </div>
</div>

