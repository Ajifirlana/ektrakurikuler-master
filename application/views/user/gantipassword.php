
<!-- WRAPPER -->


    <div id="wrapper">
        <!-- NAVBAR -->

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="#"><b>SIE-MTsN2</b></a>
            </div>
            <div class="container-fluid">

                <div class="navbar-btn"> <!--<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>-->
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
   <form action="<?php echo base_url();?>user/edit" method="POST" enctype="multipart/form-data">
                    <div class="panel panel-headline">
                        
                        <div class="panel-heading">
                            <div class="panel-title">Pengaturan</div>
                            <div class="panel-body">
                              
                           <div class="table-responsive">
                            <div class="panel-title">Password Lama</div>
                            <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">
                            <input type="text" name="pwlama" value="">
                            <br>
                            <div class="panel-title">Password Baru</div>
                            <input type="text" name="password" value="">
                            <br>
                            <div class="panel-title">Ulangi Password Baru</div>
                            <input type="text" name="ulangi" value="">
                            <input type="hidden" name="role" value="0">
                            <p><p></p></p>
                            <input type="submit" class="btn btn-success" value="Ubah Password">
                        </div>
                        
                            </div>
                        </div>
                           
                       
                    </div></form>
                   
                 <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>