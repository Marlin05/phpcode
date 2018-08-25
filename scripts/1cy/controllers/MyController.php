<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 13.03.2016
 * Time: 12:49
 */

namespace app\controllers;
use yii\web\Controller;

/*
class MyController extends Controller {

    public function actionIndex(){
    	 $hi = 'Hello, World!';
    	 $names = ['Ivanov', 'Petrov', 'Sidorov'];
    	//return $this->render('index', ['hi'=>$hi, 'names' =>$names]);
// 2 способ
    	 return $this->render('index', compact('hi', 'names', 'id'));
    }


*/
class MyController extends Controller{

    public function actionIndex($id = null){
        $hi = 'Hello, World!';
        $names = ['Ivanov', 'Petrov', 'Sidorov'];

// получить данные от пользователя в экшен index передаём id и передаём в return
        // если не не передан другой параметр то выводит test
       if(!$id) $id = 'test';

      /* return $this->render('index', ['hello' => $hi, 'names' => $names,]);*/
       return $this->render('index', compact('hi', 'names', 'id')); // url http://1cy/web/index.php?r=my/index&id=test
    }
    public function actionBlogPost(){
        // my/blog-post
        // url http://1cy/web/?r=my/blog-post
        //return 'Blog Post';
         return $this->render('BlogPost');
    }


} 