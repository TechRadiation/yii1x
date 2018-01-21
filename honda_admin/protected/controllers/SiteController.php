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
	            $template_file =  uniqid() . '.' . $ext;
	            $model->template_file = $template_file;
				
	            if($model->save(false))
	            {	
	                $file->saveAs($path.'/'.$template_file);
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
		$status = array();
		$this->render('configure',array('certificate' => $certificate,'status' => $status));
	}

	public function actionDelete($id)
	{
		$certificate=Certificates::model()->findByPk($id);
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