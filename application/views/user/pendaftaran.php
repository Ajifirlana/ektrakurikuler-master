
<!-- WRAPPER -->


    <div id="wrapper">
        <!-- NAVBAR -->

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="#"><b>SIE-MTsN2</b></a>
            </div>
            <div class="container-fluid">

                <div class="navbar-btn">
                    <!--<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
                </div>
            
             <?php if($this->session->userdata('role') == 1){ ?>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> Admin</i> 

                        </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('login/signout');?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>

                 <?php } else { ?>
<div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> Siswa</i> 

                        </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('login/signout');?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
                    <?php } ?>
            </div>
        </nav>
        
    <!-- LEFT SIDEBAR -->
        
        <!-- END LEFT SIDEBAR -->
        

<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
<div class="panel-heading">

<?php include'menu.php';?>

   </div>       
<?php echo form_open('user/create');?>
                 <div class="panel panel-headline">
                        
                        <div class="panel-heading">
                            <div class="panel-title">Pendaftaran</div>
                            <div class="panel-body">
                              
                          
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th >Nama</th>
                                      
                                         <th>: <input type="text" name="nama_siswa"></th>
                                      <th>NIS</th>
                                      <th>: <input type="number" name="nis"></th>
                                        
                                    </tr>

                                </thead>
                               
                                <tbody>
                                   
                                    <tr>  

                                        <th>Kelas</th>
                                        <th>: <input type="text" name="kelas"></th> 
                                       <th>Jenis Kelamin</th> 
                                       <th>: <select name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select></th>
                                       
                                        </tr>
                                </tbody>
                            </table>

                        <?php 
            $tgl = date('Y-m-d');
            { ?>
            <input type="hidden" name="tanggal_daftar" required="" value="<?php echo $tgl; ?>">
            <?php }?>
                              
                            </div>
                        </div>
                        <div class="panel-heading">*) Pramuka adalah Ektrakurikuler Yang Wajib diambil</div>
                    </div>
                   
                 <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Registrasi Ekskul</h3>
							<p class="panel-subtitle">User / Registrasi Ekskul</p>
						</div>
						<div class="panel-body">
						   <div class="table-responsive">
							<table class="display" id="data">
							    <thead>
							        <tr>
                                        <th>Nama Ekstrakurikuler</th>
							            <th>Deskripsi</th>
							            <th>Jadwal Ekskul</th> 

                                        <th>Jumlah Pendaftar</th>      
                                        <th>Opsi</th>
							        </tr>
							    </thead>
							    <tbody>
							        
                                    <?php  
                                    $total = 0;
                                    foreach($set as $row){
                                    
                                     ?>
                                     
                                    <tr>
                                        <td><?php echo $row->nama_ekskul;?></td>
							            <td><?php echo $row->lokasi;?></td> 
                                        <td><?php echo $row->hari;?>, <?php echo $row->jam_mulai;?> - <?php echo $row->jam_selesai;?></td>
                                       <td><?php echo $row->total;?> Siswa</td>
							            <td>
                                            <input type="checkbox" name="rombel" aria-label="Checkbox for following text input" value="<?php echo $row->id_ekskul;?>">
							                 <?php echo anchor('user/registered/'.$row->id_ekskul,'Pilih',array('onclick' => 'return confirm("Anda yakin ingin mengikuti ekskul ini?")'));?> 
                                            
							            </td>
							            </tr>
							         <?php } ?>   
							        
							    </tbody>
							</table>
                            <button class="btn btn-warning"><i class="fa fa-check"></i> Daftar</button>
						</div>
                        </div>
					</div>
				
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>
<?php echo form_close();?>