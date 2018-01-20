<?php
   $this->pageTitle=Yii::app()->name . ' - Configure Certificate';   
?>
<div class="content-wrapper">
   <div class="container-fluid">
      <!-- Icon Cards-->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-certificate"></i> Configure Certificate
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="card mb-3 bg-info">
                     <div class="card-header">
                        <i class="fa fa-file-text"></i> Configure Certificate
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12" id="konvaDiv">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="card mb-3 bg-info">
                     <div class="card-header">
                        <i class="fa fa-gear"></i> Configure Certificate
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 1</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 2</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 3</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 4</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 5</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 6</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 7</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 1</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 2</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 3</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 4</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 5</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 6</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                        <div class="col-md-12 form-group">
                           <button class="btn btn-secondary" type="submit"> Name 7</button>
                           <a href="#" class="btn btn-success"><i class="fa fa-fw fa-eye"></i></a>
                           <a class="btn btn-success" href="config-certificate.html"><i class="fa fa-fw fa-edit"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://cdn.rawgit.com/konvajs/konva/1.7.6/konva.min.js"></script>
<script type="text/javascript">
    var width = window.innerWidth;
    var height = window.innerHeight;

    function drawImage() {
        var imageObj = new Image();
         imageObj.src = '../images/certificates/<?=$certificate->template_file ?>';

        var stage = new Konva.Stage({
            container: 'konvaDiv',
            width: width,
            height: height
        });

        var layer = new Konva.Layer();
        // darth vader
        var darthVaderImg = new Konva.Image({
            image: imageObj,
            x: stage.getWidth() / 2 - 200 / 2,
            y: stage.getHeight() / 2 - 137 / 2,
            width: 200,
            height: 137,
            draggable: true
        });

        // add cursor styling
        darthVaderImg.on('mouseover', function() {
            document.body.style.cursor = 'pointer';
        });
        darthVaderImg.on('mouseout', function() {
            document.body.style.cursor = 'default';
        });

        layer.add(darthVaderImg);
        stage.add(layer);
    }
    
    $(document).ready(function(){
      drawImage(this);
    });
</script>