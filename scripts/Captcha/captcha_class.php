<?php
// подкл. в index.php
// реализация cтатического метода в классе Captcha
class Captcha {
    // параметры картинки
    const WIDTH = 100;
    const HEIGHT = 60;
    const FONT_SIZE = 16;
    const LENGTH = 4;
    const BG_LENGTH = 30; // фоновые символы для смущения роботов
    const FONT = 'fonts/times.ttf'; // путь к шрифту
    
    private static $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'z'];
    private static $colors = ['90', '110', '130', '150', '170', '190', '210']; // цвета букв для запутывания роботов
    
    // метод генерирует картинки и выводит в брауз.
    public static function generate() {
        session_start();
        $src = imagecreatetruecolor(self::WIDTH, self::HEIGHT); // холст
        $bg = imagecolorallocate($src, 255, 255, 255); // закрашиваем все белым цветом.
        imageFill($src, 0, 0, $bg); // ук. произв.точку и замкн.контур закрашыв. чтобы попасть в контур не больше знач. $bg. т.е. кликаем в некую точку и все закр.
        // далее вводим запутывающие буквы
        // обращаемся к константе BG_LENGTH - 30 различных символов будут запутывать. п.25 - вывод произвольным цветом
        for ($i = 0; $i < self::BG_LENGTH; $i++) {
            $color = imagecolorallocatealpha($src, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), 100); // 100 - парам. прозрачности
            $letter = self::$letters[mt_rand(0, count(self::$letters) - 1)]; // произв. перебор от 0 и размера массива letters - 1
            $size = mt_rand(self::FONT_SIZE - 2, self::FONT_SIZE + 2); // произвольный размер уст. 16 = от 14 до 18
            imagettftext($src, $size, mt_rand(0, 45), mt_rand(self::WIDTH * 0.1, self::WIDTH * 0.9), // вывод trytypeshrift. в парам. ук.: размер size, угол наклона буквы, позицию по x  -self::HEIGHT * 0.1 - почти до верх.лев.угла, self::HEIGHT * 0.9 - до почти до правого верхн.угла.
            mt_rand(self::HEIGHT * 0.1, self::HEIGHT * 0.9), $color, self::FONT, $letter); // позиция по y и цвет кот.сгенерируется случ.образом. путь к шрифту и строку для вывода символа из списка п.13
        }
        // выводим правильные символы в цикле кот. 4 
        $code = '';
        for ($i = 0; $i < self::LENGTH; $i++) {
            $color = imagecolorallocatealpha($src, self::$colors[mt_rand(0, count(self::$colors) - 1)], // получаем цвет из массива п.14 от 0 до кол-ва эл.в массиве. - 1 т.к. size возвр. размер массива, а нум.нач. с 0 , поэтому разм. массива не совп.с индексом посл.эл.
            self::$colors[mt_rand(0, count(self::$colors) - 1)],
            self::$colors[mt_rand(0, count(self::$colors) - 1)], mt_rand(20, 40)); // 20 -40 - задается прозрачность слу.обр.
            $letter = self::$letters[mt_rand(0, count(self::$letters) - 1)];
            $size = mt_rand(self::FONT_SIZE * 2 - 2, self::FONT_SIZE * 2 + 2); // размер букв увеличим на 2
            // распределение вывода символов по порядку:
            $x = ($i + 1) * self::FONT_SIZE  + mt_rand(1, 5); // учитывая итерацию + 1 * размер + рандомное смещение 
            $y = self::HEIGHT * 2  / 3 + mt_rand(1, 5); // y - маленькие буквы тоже немного сдвинутся. 
            $code .= $letter; // в обычную строку будет собиратся то, что получ. т.е. буквы не только будут сохр. в картинке но и сохр. в сессию
            imagettftext($src, $size, rand(0, 15), $x, $y, $color, self::FONT, $letter); // передаём идентиф. изобр-  $scr, размер, угол от 0-15, ......и выводимый символ
        }
        $_SESSION['code'] = $code; // после заверш.цикла код сохр. польз.в сессию
        header('Content-type: image/gif'); // чтобы отправить изо на вывод отпр.заголов. с гивкой
        imagegif($src);
    }
    // служебный метод проверки ввода данных пользователем:
    public static function check($code) {
        if (!session_id()) session_start(); // если id session false т.е. т.е. сессия не была начата то начнётся, если сессия была начата (true) - то не попадёт в session_start();
        return $code === $_SESSION['code']; // возвр.эквивалентность того что передано и сравнится с тем что хранится в сессии. если совп.= польз.ввёл данные верно.
    }
    
}
?>