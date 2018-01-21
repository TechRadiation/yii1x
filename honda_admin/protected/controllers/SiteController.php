<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 */
	public function actionIndex($id=null)
	{
		$status = array();
		if(isset($_GET['status']) && $_GET['status'] == 'deleted') {
			$status = array(
    		'code' => 'success',
    		'message' => 'Certificate deleted Successfully!'
    		);
		}

		if($id){
			$model=Certificates::model()->findByPk($id);

			$status = array(
    		'code' => 'warning',
    		'message' => 'Edit certificate and change the template file!'
    		);
		}else
			$model=new Certificates;

		if(isset($_POST['Certificates']))
		{
			$model->attributes=$_POST['Certificates'];
			$model->template_file = $file=CUploadedFile::getInstance($model,'template_file');
			if($model->validate()) {
				$path = Yii::app()->basePath . '/../images/certificates';
		        if (!is_dir($path)) {
		            mkdir($path);
		        }
	            $ext = $file->getExtensionName();
	            $template_file =  uniqid();
	            $model->template_file = $template_file;
				
	            if($model->save(false))
	            {	
	                $file->saveAs($path.'/'.$template_file.'.'.$ext);

	                $image = new Imagick($path.'/'.$template_file.'.'.$ext);
					$image->setImageFormat( "png" );
					file_put_contents ($path.'/'.$template_file.".png", $image);
	                if($id) {
	                	$status = array(
	                		'code' => 'success',
	                		'message' => 'Certificate updated Successfully!'
	                		);
	                }else {
	                	$status = array(
	                		'code' => 'success',
	                		'message' => 'Certificate created Successfully!'
	                		);
	                }
	            }else {
	            	$status = array(
                		'code' => 'danger',
                		'message' => 'Certificate not updated!'
                		);
	            }
			}
		}

		$condition = 'deleted_at is NULL';
		$filters = array(
			'id' => '',
			'name' => '',
			'description' => ''
		);
		if(isset($_POST['filters'])) {
			$criteria=new CDbCriteria;
			$filters = $_POST['filters'];
			
			if($filters['id']) {
				$condition .= ' and id = '.$filters['id'];
			}
			if($filters['name']) {
				$condition .= " and name LIKE '%".$filters['name']."%'";
			}
			if($filters['description']) {
				$condition .= " and name LIKE '%".$filters['description']."%'";
			}
			$status = array(
	    		'code' => 'info',
	    		'message' => 'Records for search data!'
	    		);
		}

		$certificates=Certificates::model()->findAll($condition);

		$this->render('index',array(
			'model' => $model,
			'certificates' => $certificates,
			'status' => $status,
			'filters' => $filters
			)
		);
	}

	public function actionConfigure($id)
	{
		$certificate=Certificates::model()->findByPk($id);

		if(!$certificate) {
			$this->redirect(array('site/index'));
		}

		if(isset($_POST['markers'])) {
			$markers = json_decode($_POST['markers'],true);
			$path = Yii::app()->basePath . '/../images/certificates/'.$certificate->template_file.'.png';
			$image = new Imagick($path);
   			$height = $image->getimageheight();

   			$width = $_POST['imgWidthOriginal'];
   			$updatedWidth = $_POST['imgWidth'];
   			$updatedHeight = $_POST['imgHeight'];

   			$widthRatio = $width/$updatedWidth;
   			$heightRatio = $height/$updatedHeight;
   			//dd($widthRatio);
			foreach ($markers as $key => $marker) {
				if($marker['x'] == 0 && $marker['y'] ==0) {
					continue;
				}
				$draw = new ImagickDraw();
			   $draw->setFillColor($marker['color']);
			   // $draw->setFont("'".$marker['fontFamily']."'");
			   $draw->setFontSize($marker['font']);
			   // $draw->setTextUnderColor('#ff000088');
			   $image->annotateImage($draw,($marker['x']*$widthRatio)+35,($marker['y']*$widthRatio)+35,0,$marker['name']);
			}
			$image->setImageFormat('pdf');
			header('Content-type: application/pdf');
			header('Content-disposition: inline; filename=certificate.pdf');
			echo $image;

		}

		$training = Yii::app()->db->createCommand()
		    ->select('t.*, head.name as head, head.digital_sign as head_sign, trainer.name as trainer,trainer.digital_sign as trainer_sign')
		    ->from('trainings t')
		    ->join('users head', 'head.id=t.training_head')
		    ->join('users trainer', 'trainer.id=t.instructor_id')
		    ->queryRow();

		$trainee = Users::model()->findByPk(5);
		$markers = array(
         array( 'name' => $trainee->name,
         	'label' => 'Trainee Name',
            'font'=>20,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
         ),
         array(  'name' => $training['name'],
         	'label' => 'Training Name',
            'font'=>25,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => $training['start_date'],
         	'label' => 'start date',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => $training['end_date'],
         	'label' => 'End date',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => ($training['head_sign'] ? $training['head_sign'] : $training['head']),
         	'label' => 'Training head sign',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => date('Y-m-d'),
         	'label' => 'Certificate issue date',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => $training['trainer'],
         	'label' => 'Instructor Name',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => 'Grade',
         	'label' => 'Grade',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => ($training['trainer_sign'] ? $training['trainer_sign'] : $training['trainer']),
         	'label' => 'Instructor Sign',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
          ),
         array(  'name' => 'ISO no',
         	'label' => 'ISO no',
            'font'=>15,
            'fontFamily' => 'Calibri',
            'color' => 'black',
            'x' => 0,
            'y' => 0
         )
      );

		$status = array();
		$this->render('configure',array('certificate' => $certificate,
			'status' => $status,
			'markers' => $markers
			));
	}

	public function actionDelete($id)
	{
		$certificate=Certificates::model()->findByPk($id);
		if(!$certificate) {
			$this->redirect(array('site/index'));
		}

		$certificate->deleted_at = date('Y-m-d H:m:i');
		$certificate->save();
		
		$this->redirect(array('site/index', 'status'=> 'deleted'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}