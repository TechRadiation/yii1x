<div class="content-wrapper">
    <div class="container-fluid">
     
     
      <!-- Icon Cards-->
     <div class="card mb-3">
     	<div class="card-header">
          <i class="fa fa-certificate"></i> Create Certificate</div>
     </div>
     <div class="container">
     		
     		<div class="form-group">
     			
     				<div class="form-group row">
	     				<div class="col-md-6 input-group">
	     					<span class="input-group-addon"><i class="fa fa-certificate"></i></span>
			                	<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter Certificate name ">
			              </div>
			              <div class="col-md-6 input-group">
			              	<span class="input-group-addon"><i class="fa fa-certificate"></i></span>
			                	<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter Certificate description ">
			              </div>
		              </div>
		              <div class="row form-group">
			              <div class="col-md-6 input-group">
			              	<span class="input-group-addon"><i class="fa fa-file"></i></span>
			                	<input class="form-control" id="exampleInputName" type="file" aria-describedby="nameHelp">
			              </div>
			             <!--  <div class="col-md-6 row">
			              		<div class="col-md-6">
			                		<button class="btn btn-secondary" type="submit"> <i class="fa fa-fw fa-upload"></i>Upload</button>
			                	</div>
			                	
			              </div> -->
		          </div>
		          <div class="row col-md-3">
                		<button class="btn btn-primary btn-block" type="submit"> <i class="fa fa-fw fa-plus"></i>Create</button>
                	</div>
     			
     		</div>
     </div>
     
        <!-- Icon Cards-->
     <div class="card mb-3">
     	<div class="card-header">
          <i class="fa fa-certificate"></i> Manage Certificate</div>
     </div>

     <div class="panel panel-default">
            <div class="panel-heading">
               
                <div class="col-md-6 form-group bg-default">
						<button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <i class="fa fa-fw fa-plus"></i> Filters</button>
            	</div>
               
            </div>
            <div id="collapseOne" class="panel-collapse collapse col-md-12">
                <div class="panel-body">
                   <div class="form-group row">
						<div class="col-md-4">
		                	<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Search By ID ">
		              </div>
		              <div class="col-md-4">
		                	<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Search By Certificate Name ">
		              </div>
		              <div class="col-md-4">
		                	<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Search By Certificate Name">
		              </div>
		          </div>
		          <div class="form-group row">
						
		            	<div class="col-md-6 form-group row">
		            		<div class="col-md-6">
		            			<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-window-close"></i>Clear Search</button>
		            		</div>
		            		<div class="col-md-6">
		            			<button class="btn btn-primary" type="submit"> Search</button>
		            		</div>
		            	</div>
		              
		          </div>
                </div>
            </div>
        </div>

     <div class="card-body">
     	
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S.no</th>
                  <th>ID</th>
                  <th>Certificate Name</th>
                  <th>Certificate Description</th>
                  <th>Manage</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>1</td>
                  <td>11</td>
                  <td>Certificate 1</td>
                  <td>This is 1st Certificate</td>
                  <td>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> </a>
                  		<a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-trash"></i></a>
 

                  </td>
                 
                </tr>
                <tr>
                  <td>2</td>
                  <td>13</td>
                  <td>Certificate 2</td>
                  <td>This is 2nd Certificate</td>
                  <td>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> </a>
                  		<a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-trash"></i></a>
 
 
                  	
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>13</td>
                  <td>Certificate 3</td>
                  <td>This is 3rd Certificate</td>
                  <td>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> </a>
                  		<a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-trash"></i></a>
 
 
                  	
                  </td>
                  
                </tr>
                <tr>
                 <td>4</td>
                  <td>14</td>
                  <td>Certificate 4</td>
                  <td>This is 4th Certificate</td>
                  <td>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> </a>
                  		<a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                  		<a href="#" class="btn btn-success"><i class="fa fa-fw fa-trash"></i></a>
 
 
                  	
                  </td>
                  
                </tr>
                
              </tbody>
            </table>
          </div>
        </div
      <!-- Example DataTables Card-->
     
    </div>
</div>
    <!-- /.container-fluid-->