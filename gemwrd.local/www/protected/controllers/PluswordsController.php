<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class PluswordsController extends CController
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
            Yii::app()->clientScript->registerCssFile('/css/bootstrap.css');

            $model=new PluswordsForm;
            $ok = true;
            if (!empty($_POST['mask'])) {
                $mask = $_POST['mask'];
            } else {
                $ok = false;
            }             
            if (!empty($_POST['keys'])) {
                $keys = $_POST['keys'];
            } else {
                $ok = false;
            }
            if ($ok) {
                $result = $model->getWords($mask, $keys);
            } else {
                $result = array();
            }
            $this->render('index',array('model'=>$model, 'result'=>$result));
	}
}