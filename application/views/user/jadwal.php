
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

   <div class="panel panel-headline">

                        <div class="panel-heading">
                            <div class="panel-title">Pengumuman</div>
                            <div class="panel-body">
                                <div class="row">
                                <div class="panel-heading">
                                    <div class="col-md-12">
                                        <hr>
                                         <?php   
                                         $no = $this->uri->segment('3') + 1;
                                     foreach ($png as $row)
                                     { 
                                        ?>

                                        
                                            <h3 class="panel-title">
                                            <img src="<?php echo base_url('assets/img/announcement.png');?>" width="100px" height="100px"> <?php echo $row->nama_pengumuman;?></h3>

                                            <h3 class="panel-title">
                                                <img src="<?php echo base_url('assets/css/images/ui-bg_glass_100_f6f6f6_1x400.png');?>" width="100px" height="100px"><?php echo $row->isi_pengumuman;?></h3>
                                            <hr>
                                     <?php $no++; }?>
                                    
                                    </div>
                                </div>
                        
                                
                                
                            </div>
                             
                            
                                
                            </div>
                        </div>
                    </div>    
                            </div>
                        </div>
                    </div>
                   
                 <?php echo $this->session->flashdata('notify');?>
				    <?php echo validation_errors();?>
					<!-- OVERVIEW -->
					
			<!-- END MAIN CONTENT -->
		</div>
    </div>
</div>