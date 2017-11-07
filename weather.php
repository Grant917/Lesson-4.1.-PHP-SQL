<?php
$json = file_get_contents('http://openweathermap.org/data/2.5/weather?q=Moscow,ru&appid=b1b15e88fa797225412429c1c50c122a1');
$json = file_get_contents('data.json');
$data = json_decode($json, true);
$tempMin = $data['main']['temp_min'];
$tempMax = $data['main']['temp_max'];
$pressure = $data['main']['pressure'];
$visibility = round($data['visibility']/1000,2);


echo <<<HTML
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Погода</title>
</head>
<body >
<div style="background-color: #efefef; min-width: 100px; max-width: 20%; padding: 1px 20px; margin: 10px; border-radius: 10px; box-shadow: #1B2426 0px 1px 0px 5px;">


<h2>Погода в Москве</h2>
<img src="http://openweathermap.org/img/w/{$data['weather'][0]['icon']}.png"/><br>
Температура: от <strong>$tempMin</strong> до <strong>$tempMax</strong> по Цельсию<br>
Давление: <strong>{$data['main']['pressure']}</strong> мм ртутного столба<br>
Влажность: <strong>{$data['main']['humidity']}</strong> %<br>
Ветер: <strong>{$data['wind']['speed']}</strong> м/c<br>
Видимость: <strong>$visibility</strong> км<br>
<p style="text-align: right; font-style: italic">Грант Севинян</p>
</div>
</body>

</html>
HTML;
