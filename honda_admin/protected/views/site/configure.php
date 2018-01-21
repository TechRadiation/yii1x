<?php
   $this->pageTitle=Yii::app()->name . ' - Configure Certificate';   
?>
<div class="content-wrapper">

   <div class="container-fluid">
      <?php if($status) { ?>

      <div class="alert alert-<?= $status['code'] ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?= $status['message'] ?>
     </div>

   <?php }  ?>
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <ul>
            <!-- <li>Double click to change the text value and press enter to update</li> -->
            <li>Drag and drop the text field to fix the position of text</li>
         </ul>
     </div>

      <!-- Icon Cards-->
      <div class="card mb-3">
         <div class="card-header">
            <i class="fa fa-certificate"></i> Configure Certificate
         </div>
         <?php $form=$this->beginWidget('CActiveForm', array(
               'id'=>'request-form',
               'enableClientValidation'=>true,
               'clientOptions'=>array(
                'validateOnSubmit'=>true,
               ),
               )); 
         ?>
         <div class="card-body">
             
            <input type="hidden" name="markers" id="jsonData" value="">
            <div class="row image-panel">
               <div class="col-md-6">
                  
                  <div class="row">
                     <div class="col-md-12">
                        <img src="<?= Yii::app()->request->baseUrl;  ?>/images/certificates/<?=$certificate->template_file ?>.png"  style="width: 100%" id="certificateImage">
                                                
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-body" id="divDetails"></div>
                  
                  </div>
               </div>
            </div>
            <div id="konvaDiv" style="position: absolute;top: 68px;width: 100%;">
            </div> 

           
         </div>
         <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
         </div>
          <?php $this->endWidget(); ?>
      </div>
   </div>
</div>
<script src="https://cdn.rawgit.com/konvajs/konva/1.7.6/konva.min.js"></script>
<script type="text/javascript">
   function drawImage() {
      var width = $('.image-panel').width();
      var height = $('#certificateImage').height();
      $('#divDetails').css('height',height);
    
      var stage = new Konva.Stage({
         container: 'konvaDiv',
         width: width,
         height: height
      });
      var layer = new Konva.Layer();

      var markers = $.parseJSON('<?= json_encode($markers) ?>');

      var x = stage.getWidth() / 2 + 15;
      var y = 15;
      $.each(markers,function(key,val){

         if(key == 5) {
            x = stage.getWidth() / 1.3;
            y = 15
         }
         var label = new Konva.Text({
            x: x,
            y: y,
            text: val.label,
            fontSize: 10,
            fill: val.color,
            padding: 20,
            align: 'center'
         });
         
         y = y+30;
         var marker = new Konva.Text({
            x: x,
            y: y,
            text: val.name,
            fontSize: val.font,
            fontFamily: val.fontFamily,
            fill: val.color,
            draggable: true,
            padding: 20,
            align: 'center'
         });
         
         y = y + 50;
         marker.on("dragstart", function() {
            this.moveToTop();
            layer.draw();
        });

        marker.on("dragmove", function() {
            document.body.style.cursor = "pointer";
            var jsonData =  $.parseJSON(marker.toJSON());
            markers[key].x = jsonData.attrs.x;
            markers[key].y = jsonData.attrs.y;
            $('#jsonData').val(JSON.stringify(markers));
        });

        // marker.on("dblclick dbltap", function() {
        //     this.destroy();
        //     layer.draw();
        // });

        marker.on("mouseover", function() {
            document.body.style.cursor = "pointer";
        });
        marker.on("mouseout", function() {
            document.body.style.cursor = "default";
        });

        layer.add(label);
        layer.add(marker);

      //   marker.on('dblclick', () => {
      //       // create textarea over canvas with absolute position

      //       // first we need to find its positon
      //       var textPosition = marker.getAbsolutePosition();
      //       var stageBox = stage.getContainer().getBoundingClientRect();

      //       var areaPosition = {
      //           x: textPosition.x + stageBox.left,
      //           y: textPosition.y + stageBox.top
      //       };


      //       // create textarea and style it
      //       var textarea = document.createElement('textarea');
      //       document.body.appendChild(textarea);

      //       textarea.value = marker.text();
      //       textarea.style.position = 'absolute';
      //       textarea.style.top = areaPosition.y + 'px';
      //       textarea.style.left = areaPosition.x + 'px';
      //       textarea.style.width = marker.width();

      //       textarea.focus();


      //       textarea.addEventListener('keydown', function (e) {
      //           // hide on enter
      //           if (e.keyCode === 13) {
      //               marker.text(textarea.value);
      //               texts[key].name = textarea.value;
      //               layer.draw();
      //               document.body.removeChild(textarea);
      //           }
      //       });
      //   })

      });

      // add the layer to the stage
      stage.add(layer);
    }
    
    $(document).ready(function(){
      drawImage();
    });
</script>