<?php

class MainController extends AbstractController {
// 3 сво-ва:
    protected $title;
    protected $meta_desc;
    protected $meta_keywords;
    
    // объявляем констр.
    public function __construct() {
        parent::__construct(new View(DIR_TMPL)); // вызываем род.констр. и перед.новый объект View c константой DIR_TMPL
        // в конст.сод.путь к дир. template
    }
    
    public function action404() {
        parent::action404(); // берём род.реализ.чтобы все заголовки были отпр.
        $this->title = 'Страница не найдена - 404';
        $this->meta_desc = 'Запрошенная страница не существует.';
        $this->meta_keywords = 'страница не найдена, страница не существует, 404';
        // получ.сод.из tmplfile
        // файлик созд.отдельно
        $content = $this->view->render('404', [], true); // обращаемся к св-ву protected view из п.6 род.класса
        $this->render($content); // и вызываем у него метод рендер (п.11 view_class.php)
    }
    
    // главная страница сайта
    public function actionIndex() {
        $this->title = 'Главная страница';
        $this->meta_desc = 'Описание главной страницы';
        $this->meta_keywords = 'описание, главная страниц';
        // обращение к тому файлу кот.отвечает за вывод гл.стр:
        $content = $this->view->render('index', [], true); // вызываем сод.стр. из tmpl file 'index.tmpl'
        $this->render($content);
    }

    //чтобы создать ещё один файл нужно создать tplfile где указ. чему = соntent 
    // создать ещё один action

    /*public function action_() {
        $this->title = '';
        $this->meta_desc = '';
        $this->meta_keywords = '';
        $email = '@mail.ru'; // Допустим, получено из базы с помощью Model
        $content = $this->view->render('', ['email' => $email], true); // получ.соntent из бд
        // далее можно подставить email в page.tpl загр. к прим.из бд
        $this->render($content);
    }
    */
    
    public function actionPage() {
        $this->title = 'Внутренняя страница';
        $this->meta_desc = 'Описание внутренней страницы';
        $this->meta_keywords = 'описание, внутренняя страниц';
        $email = 'abc@mail.ru'; // Допустим, получено из базы с помощью Model
        $content = $this->view->render('page', ['email' => $email], true);
        $this->render($content);
    }
    //
    protected function render($content) {
        $params = [];
        $params['title'] = $this->title;
        $params['meta_desc'] = $this->meta_desc;
        $params['meta_keywords'] = $this->meta_keywords;
        $params['content'] = $content;
        $this->view->render(MAIN_LAYOUT, $params); // передаём константу кот.будет сод.общий вид сайта. в этот шаблоны вводятся парам.
    }
}

?>