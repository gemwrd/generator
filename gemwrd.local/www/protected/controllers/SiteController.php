<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends CController
{
	/**
	 * Index action is the default action in a controller.
	 */
	protected $title = 'Генератор списка минус-слов для Яндекс.Директ и Google AdWord';
        protected $author = 'contact@gemwrd.ru (gemwrd)';
	
	public function actionIndex()
	{
            $this->pageTitle = $this->title.' | '.Yii::app()->name;
            Yii::app()->clientScript->registerMetaTag($this->author, 'author');
            Yii::app()->clientScript->registerCssFile('css/bootstrap.css');

            $model=new SiteForm;
            if (!empty($_POST['keys'])) {
                $model->keys = $_POST['keys'];
            }
            $result = $model->getWords($model->keys);
            $this->render('index',array('model'=>$model, 'result'=>$result));
	}
}