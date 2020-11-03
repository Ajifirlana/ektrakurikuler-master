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
							<p class="panel-subtitle">Pengumuman</p>

						</div>
            <div class="panel-body">
              <button class="btn btn-warning" data-toggle="modal" data-target="#Modal_baru">+ Tambah</button>
            </div>
						<div class="panel-body">
						   <div class="table-responsive">
							<table class="display" id="data">
							    <thead>
							        <tr>

                                        <th>No</th>
                                        <th>Judul Pengumuman</th>
							            <th>Isi Pengumuman</th>
                                
                                       
                                        
                                        <th>Opsi</th>
							        </tr>
							    </thead>
							    <tbody>
							        
                                    <?php $no = $this->uri->segment('3') + 1;
                                     foreach($png as $row){ ?>   
                                    <tr>

                                        <td><?php echo $no; ?></td> 
                                        <td><?php echo $row->nama_pengumuman;?></td> 
                                        <td><?php echo $row->isi_pengumuman;?></td>
							            
							          
							            <td>
                                            <button class="btn btn-warning" onclick="edit_pengumuman(<?php echo $row->id_ekskul;?>)"><i class="fa fa-edit"></i>Edit</button>   
                                           
                                             <?php echo anchor('ekskul/destroypengumuman/'.$row->id_ekskul,'<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>');
                                             ?>
                                             
                                              

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
    
    
    function dokumentasi(id){
        $('#form')[0].reset();
        $("#dokumentasi").modal('show');
        $('#id_ekskul').val(id);
        $('[name=submit]').val('Tambah').show();
        $('.modal-footer').show();

    }   
   
    function edit_pengumuman(id)
    {
      save_method = 'updatepengumuman';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('ekskul/getpengumuman')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_ekskul"]').val(data.id_ekskul);
            $('[name="nama_pengumuman"]').val(data.nama_pengumuman);
            $('[name="isi_pengumuman"]').val(data.isi_pengumuman);
            $('#Modal_Add').modal('show'); 
            $('.modal-title').text('Edit Pengumuman'); 
            $('[name=submit]').val('Edit').show();
            $('.modal-footer').show();
            $('#form').attr('action','<?php echo site_url('ekskul/updatepengumuman');?>');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax'+jqXHR);
        }
    });
    }
    
   
</script>
<div id="Modal_Add" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Pengumuman</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('ekskul/createpengumuman',array('id' => 'form'));?>
        
         
                <input type="hidden"  name="id_ekskul"/>

                <div class="form-group" >
                    <label>Judul Pengumuman</label>
                    <input type="text" name="nama_pengumuman" id="nama_pengumuman" class="form-control">
                </div>
               
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <input type="text" name="isi_pengumuman" id="isi_pengumuman" class="form-control">
                </div>
                 
               
               
        <div class="modal-footer">
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>

  </div>
</div>

<div id="Modal_baru" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Pengumuman</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url(). 'ekskul/createpengumuman'; ?>" method="post">  
         
                <div class="form-group" >
                    <label>Judul Pengumuman</label>
                    <input type="text" name="nama_pengumuman" id="nama_pengumuman" class="form-control">
                </div>
               
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <input type="text" name="isi_pengumuman" id="isi_pengumuman" class="form-control">
                </div>
                 
               
               
        <div class="modal-footer">
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
        </div>
      </div>
  </form>
      
    </div>

  </div>
</div>

