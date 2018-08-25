<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.03.2016
 * Time: 21:17
 */

namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\TestForm;

class PostController extends AppController{

   public function actionTest(){

    //    $names = ['Ivanov', 'Petrov', 'Sidorov'];
   // var_dump(Yii::$app);
   // $this->debug(Yii::$app);
   // $this->debug($names);
    return $this->render('test');
}

    public $layout = 'basic';

//отключить проверку токена post enableCsrfValidation если экшен index

public function beforeAction($action){
        if( $action->id == 'index' ){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

// ВЫВОДИТ ВСЕ СТАТЬИ
    //если был запрос проверяет каким методом пришли данные
    // если не Ajax то вернёт стр test
    public function actionIndex(){
    	 if( Yii::$app->request->isAjax ){
          //  debug($_POST);
    	 	// 2 способ обращения
    	 	debug (Yii::$app->request->post());
            return 'test'; 
        }

// Создаём объект с помощью UPDATE 
        // получить данные с поста id 3
 		
 		
 // т.к. таблица post то ТF 
        // найти 3 запись
        //получить данные 4 поста
       //  $post = TestForm::findOne(4);
        // debug ($post);
          //ручное заполнение пустого email или изм.
          /*$post->email = '7@2.com';
          $post->save();*/

       // $post->delete();
// удалить все записи, где id > 2
          // TestForm::deleteAll(['>', 'id', 2]);
       // TestForm::deleteAll();


//        TestForm::deleteAll(['>', 'id', 3]);
       // TestForm::deleteAll();



       
        // eсли объект модели пол. из бд то update, в ином - new
        // Как INSERT срабатывает если создаём объект AR с помощью new
        // UPDATE - если создаём объект с помощью запроса на получение данных
        $model = new TestForm();
        //заполняем поля объекта данными catalog.posts
        // метод validate не вызывается как в случае с формой
        // если не нужна валидация save (false)
        // РУЧНАЯ ЗАГРУЗКА ДАННЫХ добавление из php 
       /*$model->name = 'Автор';
        $model->email = 'mail@mail.ru'; // п.42 ТestForm поле должно соот.формату email
        $model->text = 'Текст сообщения';
        $model->save();*/

        //АВТОМАТИЧЕСКАЯ ЗАГРУЗКА 
// добавление записи из формы в бд
// принимаем данные, валидируем

         if( $model->load(Yii::$app->request->post()) ){
         /*	debug($model);
         	die;*/
         	// если данные созранились, записываем в сессию и перезапрашиваем стр.
            if( $model->save() ){
            	//флеш сообщение
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();// обновить данные после отправки формы
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }

        // загружать данные можно 2-мя способаки либо создавать св-ва имя майл текс или исп.массовую загрузку

        $this->view->title = 'Все статьи';
       	return $this->render('test', compact('model'));
    }
   
// ОДНА СТАТЬЯ
    public function actionShow(){
    	// установить для 1 стр.
     //$this->layout = 'basic';
        $this->view->title = 'Одна статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
     
        // переменная вернёт рез выборки из таблицы
        //обращаемся к модели и исп. метод find
        // запрос аналогичен SELECT * FROM categories
 		//$cats = Category::find()->all();
 		// $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
     // $cats = Category::find()->asArray()->all();
        // создаёт фильтр где поле = 691
//        $cats = Category::find()->asArray()->where('parent=691')->all();
//        $cats = Category::find()->asArray()->where(['parent' => 691])->all();
        // где есть два 'pp'
//        $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=', 'id', 695])->all();
        // только 1 запись 691 избыточный arr поэтому в парам указ. 1
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->one();
         //$cats = Category::find()->asArray()->where('parent=691')->count();
        // 2 способ получить 1 запись
        // объект
//        $cats = Category::findOne(['parent' => 691]);
        // arr
//        $cats = Category::findAll(['parent' => 691]);
        // НЕпараметризированный запрос
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($query)->all();
       //  ПАРАМЕТРИЗИРОВАННЫЙ ЗАПРОС
     //   $query = "SELECT * FROM categories WHERE title LIKE :search";
      //  $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

        // $cats = Category::find()->all(); // отложенная загрузка
        // найти 1 категорию
        // $cats = Category::findOne(694);
        //ОТЛОЖЕННАЯ ЗАГРУЗКА 
        //  $cats = Category::find()->with('products')->all(); 
        // ЖАДНАЯ ЗАГРУЗКА исп. меньше запросов  в п.13 show.php
        // позволяет вытаскивать товар по категориям
         $cats = Category::find()->with('products')->all(); 
       
      // передаём в вид данные рез перем. $cats*/
       return $this->render('show', compact('cats'));
    }

} 

 

