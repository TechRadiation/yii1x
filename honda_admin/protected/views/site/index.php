<div class="content-wrapper">
<div class="container-fluid">
   <!-- Icon Cards-->
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-certificate"></i> Create Certificate
      </div>

      <div class="card-body">
         <div class="container">
            <?php $form=$this->beginWidget('CActiveForm', array(
               'id'=>'request-form',
               'enableClientValidation'=>true,
                  'htmlOptions' => array('enctype' => 'multipart/form-data'),
               'clientOptions'=>array(
                'validateOnSubmit'=>true,
               ),
               )); 
                ?>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                        <?php echo $form->textField($model,'name',array('class' => 'form-control',"placeholder"=>"Enter Certificate name ")); ?>                
                     </div>
                     <?php echo $form->error($model,'name'); ?>
                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file"></i></span>
                        <?php echo $form->fileField($model,'template_file',array('class' => 'form-control',"placeholder"=>"Enter Certificate Template")); ?>
                     </div>
                     <?php echo $form->error($model,'template_file'); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                        <?php echo $form->textarea($model,'description',array('class' => 'form-control',"placeholder"=>"Enter Certificate description",'rows' => 3)); ?>
                     </div>
                     <?php echo $form->error($model,'description'); ?>
                  </div>
               </div>
               <div class="col-md-3">
                  <button class="btn btn-primary btn-block" style="cursor: pointer;" type="submit">Create</button>
               </div>
            </div>
            <?php $this->endWidget(); ?>
         </div>         
      </div>
   </div>
   
   <!-- Icon Cards-->
   <div class="card mb-3">
      <div class="card-header">
         <i class="fa fa-certificate"></i> Manage Certificate
      </div>
      <div class="card-body">
         <div class="col-md-6 form-group bg-default">
            <button class="btn btn-primary" type="submit" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <i class="fa fa-fw fa-plus"></i> Filters</button>
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
               <?php $i=1;
               foreach ($certificates as $key => $certificate) { ?>
               <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $certificate->id ?></td>
                  <td><?= $certificate->name ?></td>
                  <td><?= $certificate->description ?></td>
                  <td>
                     <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> </a>
                     <a class="btn btn-success" href="<?= $this->createUrl('site/configure/'.$certificate->id) ?>"><i class="fa fa-fw fa-edit"></i></a>
                     <a href="#" class="btn btn-success"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
      </div>
   </div>
</div>
<!-- /.container-fluid-->

