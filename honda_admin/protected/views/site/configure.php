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
         <?php $form=$this->beginWidget('CActiveForm', array(
               'id'=>'request-form',
               'enableClientValidation'=>true,
               'clientOptions'=>array(
                'validateOnSubmit'=>true,
               ),
               )); 
         ?>
         <div class="card-body">
             
            <input type="hidden" name="jsonData" id="jsonData" value="">
            <div class="row image-panel">
               <div class="col-md-6">
                  
                  <div class="row">
                     <div class="col-md-12">
                        <img src="<?= Yii::app()->request->baseUrl;  ?>/images/certificates/<?=$certificate->template_file ?>"  style="width: 100%" id="certificateImage">
                                                
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

      var texts = [
         {  'name' : 'name1',
            'font':20,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'txt2',
            'font':25,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'name3',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         }
      ];

      var x = stage.getWidth() / 2 + 15;
      var y = 15;
      $.each(texts,function(key,val){
         var text1 = new Konva.Text({
            x: x,
            y: y,
            text: val.name,
            fontSize: val.font,
            fontFamily: val.fontFamily,
            fill: val.color,
            draggable: true
         });
         y = y + 50;
         text1.on("dragstart", function() {
            this.moveToTop();
            layer.draw();
        });

        text1.on("dragmove", function() {
            document.body.style.cursor = "pointer";
            var jsonData =  $.parseJSON(text1.toJSON());
            texts[key].x = jsonData.attrs.x;
            texts[key].y = jsonData.attrs.y;
            $('#jsonData').val(JSON.stringify(texts));
        });
        /*
           * dblclick to remove box for desktop app
           * and dbltap to remove box for mobile app
           */
        text1.on("dblclick dbltap", function() {
            this.destroy();
            layer.draw();
        });

        text1.on("mouseover", function() {
            document.body.style.cursor = "pointer";
        });
        text1.on("mouseout", function() {
            document.body.style.cursor = "default";
        });

        layer.add(text1);
      });

    // add the layer to the stage
    stage.add(layer);
    }
    
    $(document).ready(function(){
      drawImage();
    });
</script>