<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 13.03.2016
 * Time: 13:05
 */

namespace app\controllers\admin;

//use yii\web\Controller; 
// импортируем AC т.к. он находится не в 1 namespace
use app\controllers\AppController; // url http://1cy/web/?r=admin/user 

class UserController extends AppController{

    public function actionIndex(){
       return $this->render('index');

    }

} 