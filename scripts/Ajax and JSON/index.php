<!DOCTYPE html>
<html lang='ru'>
<head>
    <title>Ajax и JSON</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("h3").bind("click", function(event) {
                ajax({'func': 1}); // вызов функции с ук.параметров. передаём масив data
            });
        });
        function ajax(data) {
            $.ajax({
                url: '/api.php', // указываем файл к кот.будет обращение
                type: "POST",
                data: data,
                dataType: "text",
                error: error, // функция, кот.будет выз.при ош.
                success: success
            });
        }
        // создаём функцию error
        function error() {
            alert('Ошибка при загрузке данных!');
        }
        // распарсим стр.json 
        function success(result) {
            var result = $.parseJSON(result); // запис.перем.result и обратимся к объекту jquery -методу $.parseJSON. эту стр. в json формате передаём. echo- объект
            // вывод объекта в брауз.
            // создаём цикл и посмотрим -чему будут равны i и result
            // перебираем все ключи и получ.опр.данные в формате -ключ/значение
            var str = ''; // собираем все в стр.
            for (var i in result)
                // соединяем строки: 
                str += '<b>' + i + '</b>: ' + result[i] + '<br />';
                // помещаем получ.стр.внутрь result
            $('#result').empty(); // очищ.result 
            $('#result').append(str); // jqery есть встр.возможность - обращ.к эл. id result и вызываем метод append // перед.стр. в парам.
            // Ajax+json+php+js вкратце: js не может раб.с бд.но он может отпр.запрос на сервер п.13 а сервер на php выдаёт данные кот.далее кодируются в json. затем эта стр. преобразов. в п.29  в объект в js, кот.разб.на запч. и выводится.
        }

    </script>
</head>
<body>
    <div>
        <h3 style='cursor: pointer;'>Получить случайного пользователя из БД с помощью Ajax - динамической подгрузки данных</h3>
    </div>
    <div id="result"></div>
</body>
</html>