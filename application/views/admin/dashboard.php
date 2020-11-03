<style>
	.box1 {
 width: 300px;
 height: 150px;
 background: #fbfbfb;
 float: left;
 cursor: pointer;

        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        
}

.box2 {
 width: 300px;
 height: 150px;
 background: #fbfbfb;
 float: left;
 margin-left: 30px;
 box-shadow: 2px 4px 4px grey;
 cursor: pointer;
 box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        
}

#card-title {
      letter-spacing: 4px;
      padding-bottom: 23px;
      padding-top: 13px;
      text-align: center;
}



.boxx {
 width: 1140px;
 height: 150px;
 margin-top: 20px;
 margin-left:170px;
}


</style>


<div class="main">


			<!-- MAIN CONTENT -->
			<div class="main-content">

				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div align="center">
					
							<h3 class="title">Sistem Informasi Ekstrakurikuler MTsN 2 Palangka Raya</h3>
							
						
						</div>
					<div class="panel panel-headline">
						<div class="panel-heading">
						
							<p class="panel-subtitle">Dashboard</p>
						</div>

<div class="boxx">
   <div class="box1">
    <div class="title"><h3>Data Pendaftar Keseluruhan</h3>
<h2 class="int"><?php echo $set_siswa;?></h2>
    </div>
   </div>
   <div class="box2">
        <div class="title"><h3>Data Belum Mendaftar</h2></div>
        	<h2 class="int">0</h2>
   </div>
  
  </div>
  <p></p>


						
							<div class="panel panel-headline">
						

					
						<div class="panel-body">
							<div class="metric">
								<div class="left">
							<h3 class="panel-title">Data Pendaftar Per-Ekstrakurikuler</h3>
						<hr>
						</div>
						   <div class="table-responsive">
							<table class="col-md-6" width="1000px">
							    <thead>
							        <tr>
                                         <th>Nama Ekstrakurikuler</th>
							            <th>Jumlah Pendaftar</th>
							        
							        </tr>
							    </thead>
							    <tbody>
							       
                                     <?php       
                                     
                                     foreach ($total_asset as $row)
                                     { 

 ?>
                                    <tr>	

                                    	<td><?php echo $row->nama_ekskul;?></td> 
							            <th><?php echo $row->total ?> Siswa</th>
							            
							            </tr>
							       <?php } ?>
							    </tbody>
							</table>
						</div>
                        </div>
					</div>
				</div>

					</div>
					