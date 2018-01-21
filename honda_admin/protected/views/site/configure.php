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
            <li>Double click to change the text value and press enter to update</li>
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
         {  'name' : 'Trainee Name',
            'font':20,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Training Name',
            'font':25,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Training Start Date',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         }
         ,
         {  'name' : 'Training End Date',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Training Head Sign',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         }
         ,
         {  'name' : 'Certificate Issue Date',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Dealership Name',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Grade',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'Instructor Sign',
            'font':15,
            'fontFamily' : 'Calibri',
            'color' : 'black',
            'x' : 0,
            'y' : 0
         },
         {  'name' : 'ISO no',
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

         if(key == 5) {
            x = stage.getWidth() / 1.3;
            y = 15
         }
         var text1 = new Konva.Text({
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
        // text1.on("dblclick dbltap", function() {
        //     this.destroy();
        //     layer.draw();
        // });

        text1.on("mouseover", function() {
            document.body.style.cursor = "pointer";
        });
        text1.on("mouseout", function() {
            document.body.style.cursor = "default";
        });

        layer.add(text1);

        text1.on('dblclick', () => {
            // create textarea over canvas with absolute position

            // first we need to find its positon
            var textPosition = text1.getAbsolutePosition();
            var stageBox = stage.getContainer().getBoundingClientRect();

            var areaPosition = {
                x: textPosition.x + stageBox.left,
                y: textPosition.y + stageBox.top
            };


            // create textarea and style it
            var textarea = document.createElement('textarea');
            document.body.appendChild(textarea);

            textarea.value = text1.text();
            textarea.style.position = 'absolute';
            textarea.style.top = areaPosition.y + 'px';
            textarea.style.left = areaPosition.x + 'px';
            textarea.style.width = text1.width();

            textarea.focus();


            textarea.addEventListener('keydown', function (e) {
                // hide on enter
                if (e.keyCode === 13) {
                    text1.text(textarea.value);
                    texts[key].name = textarea.value;
                    layer.draw();
                    document.body.removeChild(textarea);
                }
            });
        })

      });

    // add the layer to the stage
    stage.add(layer);
    }
    
    $(document).ready(function(){
      drawImage();
    });
</script>