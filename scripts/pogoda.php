<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <style type="text/css">
  body {
    font-family: Tahoma, sans-serif;
    font-size: 13px;
  }
  
  .pogoda_table {
    border: 1px solid #ccc;
    table-layout: fixed;
  }
  
  td {
    height: 28px;
    vertical-align: middle;
  }
  
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  .td1 {
    padding-left: 5px;
    width: 40%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  
  .td2 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  
  .td3 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
    text-decoration: underline;
    font-weight: bold;
  }
  </style>
</head>
<body>
<?php

//Орск
$city = "11091";
//$city = "20102";                                                       //  GeoId города (11310 - Минусинск)
$img_folder = "https://yastatic.net/weather/i/icons/islands/32/";      //  Папка с файлами изображений (https://yastatic.net/weather/i/icons/islands/32/)
$img_ext = "png";                                                      //  Расширение файлов картинок (svg / png)
  
//  Формируем запрос
$timestamp = time();
$token = md5('eternalsun'.$timestamp);
$uuid = "8211637137c4408898aceb1097921872";
$deviceid = "315f0e802b0b49eb8404ea8056abeaaf";
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: yandex-weather-android/4.2.1 \n" .
               "X-Yandex-Weather-Client: YandexWeatherAndroid/4.2.1 \n" .
               "X-Yandex-Weather-Device: os=null;os_version=21;manufacturer=chromium;model=App Runtime for Chrome Dev;device_id=$deviceid;uuid=$uuid; \n" .
               "X-Yandex-Weather-Token: $token \n" .
               "X-Yandex-Weather-Timestamp: $timestamp \n" .
               "X-Yandex-Weather-UUID: $uuid \n" .
               "X-Yandex-Weather-Device-ID: $deviceid \n" .
               "Accept-Encoding: gzip, deflate \n" .
               "Host: api.weather.yandex.ru \n" .
               "Connection: Keep-Alive \n"
  )
);
  
$context = stream_context_create($opts);
  
//  Отправляем запрос
$file = @file_get_contents('https://api.weather.yandex.ru/v1/forecast?geoid='. $city. '&lang=ru', false, $context);
  
if ($file){
//  Разархивируем ответ
$yandex = gzdecode($file);
  
$data_fact = (array) json_decode($yandex)->fact;    
$temp_current = $data_fact['temp'];                     //  Текущая температура
$icon_fact = $data_fact['icon'];                        //  Иконка текущей температуры
$icon_fact = preg_replace('/_/i','-',$icon_fact);       //  Заменяем символ "_" на символ "-"
$icon_fact = preg_replace('/--/i','-',$icon_fact);      //  Заменяем символы "--" на символ "-"
$wind_speed = $data_fact['wind_speed'];                 //  Скорость ветра
$humidity = $data_fact['humidity'];                     //  Влажность (%)
$pressure_mm = $data_fact['pressure_mm'];               //  Атмосферное давление (мм рт. ст.)
  
$data_forecasts0 = (array) json_decode($yandex)->forecasts[0];
$sunrise = $data_forecasts0['sunrise'];                 //  Рассвет
$sunset = $data_forecasts0['sunset'];                   //  Закат
  
//  Находим температуру на каждый час за сутки
for ($h = 0; $h<24; $h++) {
        $hour_array1[$h] = (int) json_decode($yandex)->forecasts[0]->hours[$h]->temp;
    }
$min_hour = min($hour_array1);                          //  Находим из них минимальную
$max_hour = max($hour_array1);                          //  И максимальную температуру
  
//  Находим температуру на каждый час за следующие сутки
for ($h = 0; $h<24; $h++) {
        $hour_array2[$h] = (int) json_decode($yandex)->forecasts[1]->hours[$h]->temp;
    }
$min_hour_t = min($hour_array2);                        //  Находим из них минимальную
$max_hour_t = max($hour_array2);                        //  И максимальную температуру
  
$data_forecasts2 = (array) json_decode($yandex)->forecasts[0]->parts->day;
$avg_day = $data_forecasts2['temp_avg'];                //  Находим среднюю температуру днем
$icon_day = $data_forecasts2['icon'];                   //  Иконка средней температуры днем
$icon_day = preg_replace('/_/i','-',$icon_day);         //  Заменяем символ "_" на символ "-"
$icon_day = preg_replace('/--/i','-',$icon_day);        //  Заменяем символы "--" на символ "-"
  
$data_forecasts3 = (array) json_decode($yandex)->forecasts[0]->parts->night;
$avg_night = $data_forecasts3['temp_avg'];              //  Находим среднюю температуру ночью
$icon_night = $data_forecasts3['icon'];                 //  Иконка средней температуры ночью
$icon_night = preg_replace('/_/i','-',$icon_night);     //  Заменяем символ "_" на символ "-"
$icon_night = preg_replace('/--/i','-',$icon_night);    //  Заменяем символы "--" на символ "-"
  
$data_forecasts4 = (array) json_decode($yandex)->forecasts[1]->parts->day;
$avg_day_t = $data_forecasts4['temp_avg'];              //  Находим среднюю температуру завтра днем
$icon_day_t = $data_forecasts4['icon'];                 //  Иконка средней температуры завтра днем
$icon_day_t = preg_replace('/_/i','-',$icon_day_t);     //  Заменяем символ "_" на символ "-"
$icon_day_t = preg_replace('/--/i','-',$icon_day_t);    //  Заменяем символы "--" на символ "-"
  
  
$data_forecasts5 = (array) json_decode($yandex)->forecasts[1]->parts->night;
$avg_night_t = $data_forecasts5['temp_avg'];            //  Находим среднюю температуру завтра ночью
$icon_night_t = $data_forecasts5['icon'];               //  Иконка средней температуры завтра ночью
$icon_night_t = preg_replace('/_/i','-',$icon_night_t); //  Заменяем символ "_" на символ "-"
$icon_night_t = preg_replace('/--/i','-',$icon_night_t);//  Заменяем символы "--" на символ "-"
  
//  Если значение температуры положительно, для наглядности добавляем "+"
if ($temp_current>0) {$temp_current='+'.$temp_current;}
if ($min_hour>0) {$min_hour='+'.$min_hour;}
if ($max_hour>0) {$max_hour='+'.$max_hour;}
if ($min_hour_t>0) {$min_hour_t='+'.$min_hour_t;}
if ($max_hour_t>0) {$max_hour_t='+'.$max_hour_t;}
if ($avg_day>0) {$avg_day='+'.$avg_day;}
if ($avg_night>0) {$avg_night='+'.$avg_night;}
if ($avg_day_t>0) {$avg_day_t='+'.$avg_day_t;}
if ($avg_night_t>0) {$avg_night_t='+'.$avg_night_t;}
}
?>
  <table class="pogoda_table" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f8f8f8">
    <tr>
      <td class="td1" title="« Текущая температура »"><b>Сейчас:</b></td>
      <td class="td2" title="« Текущая температура »">
        <?php echo $temp_current; ?> <sup>o</sup>C
        <?php echo ("<img src=\"".$img_folder.$icon_fact ."." . $img_ext . "\" style=\"vertical-align: -7px;\" width=\"24px\" height=\"24px\"/>"); ?>
      </td>
    </tr>
    <tr>
      <td class="td1" title="« Скорость ветра »">Ветер:
        <?php echo $wind_speed; ?> м/с</td>
      <td class="td2" title="« Влажность воздуха »">Влажность:
        <?php echo $humidity; ?>%</td>
    </tr>
    <tr>
      <td class="td1" title="« Атмосферное давление »">Давление:</td>
      <td class="td2" title="« Атмосферное давление »">
        <?php echo $pressure_mm; ?> мм рт. ст.</td>
    </tr>
    <tr>
      <td class="td1" title="« Время восхода солнца »">Восход:
        <?php echo $sunrise; ?>
      </td>
      <td class="td2" title="« Время заката солнца »">Закат:
        <?php echo $sunset; ?>
      </td>
    </tr>
    <tr>
      <td class="td1" title="« Минимальная и максимальная температура сегодня »"><b>Сегодня:</b></td>
      <td class="td2" title="« Минимальная и максимальная температура сегодня »">от
        <?php echo $min_hour; ?> до
        <?php echo $max_hour; ?> <sup>o</sup>C</td>
    </tr>
    <tr>
      <td class="td1" title="« Средняя температура сегодня днем »">Днём:
        <?php echo $avg_day; ?>
        <?php echo ("<img src=\"".$img_folder. $icon_day ."." . $img_ext . "\" style=\"vertical-align: -7px;\" width=\"24px\" height=\"24px\"/>"); ?>
      </td>
      <td class="td2" title="« Средняя температура сегодня ночью »">Ночью:
        <?php echo $avg_night; ?>
        <?php echo ("<img src=\"".$img_folder.$icon_night ."." . $img_ext . "\" style=\"vertical-align: -7px;\" width=\"24px\" height=\"24px\"/>"); ?>
      </td>
    </tr>
    <tr>
      <td class="td1" title="« Минимальная и максимальная температура завтра »"><b>Завтра:</b></td>
      <td class="td2" title="« Минимальная и максимальная температура завтра »">от
        <?php echo $min_hour_t; ?> до
        <?php echo $max_hour_t; ?> <sup>o</sup>C</td>
    </tr>
    <tr>
      <td class="td1" title="« Средняя температура завтра днем »">Днём:
        <?php echo $avg_day_t; ?>
        <?php echo ("<img src=\"".$img_folder.$icon_day_t ."." . $img_ext . "\" style=\"vertical-align: -7px;\" width=\"24px\" height=\"24px\"/>"); ?>
      </td>
      <td class="td2" title="« Средняя температура завтра ночью »">Ночью:
        <?php echo $avg_night_t; ?>
        <?php echo ("<img src=\"".$img_folder.$icon_night_t ."." . $img_ext . "\" style=\"vertical-align: -7px;\" width=\"24px\" height=\"24px\"/>"); ?>
      </td>
    </tr>
    <tr>
      <td class="td3" title="« Перейти на сайт яндекса »" colspan="2">
        <a href="https://pogoda.yandex.ru/<?php echo $city ?>" target="_blank">Прогноз на неделю</a>
      </td>
    </tr>
  </table>
</body>
</html>