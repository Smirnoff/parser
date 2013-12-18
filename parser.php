<?php
mb_internal_encoding('UTF-8');

// Загружаем библиотеку Simple HTML DOM - Start
include_once 'simple_html_dom.php';
// Загружаем библиотеку Simple HTML DOM - End


$page_counter = 101; // Страница начала процесса
$ending_page = 106; // Страница окончания процесса

// Просто для информирования - Start
echo 'Процесс выполнения: ' . $page_counter . '/' . $ending_page;
echo '<br><br>';
// Просто для информирования - End

while ($page_counter <= $ending_page) {
$current_page= 'http://www.resto.uz/catalog-zavedeniy/tashkent/page-' . $page_counter . '/';

// Задаем данные для парсинга ссылок на страницы товаров - Start
$html = file_get_html($current_page);
// Задаем данные для парсинга ссылок на страницы товаров - End

$item_counter = 0;
while ($item_counter < 6) {
$names[$item_counter] = $html->find('div.preview', $item_counter)->find('div a', 0)->plaintext;
echo '<b>Название: </b>' . $names[$item_counter];
echo '<br>';
$cities[$item_counter] = $html->find('div.preview', $item_counter)->find('div div dl dd', 0)->plaintext;
echo '<b>Город: </b>' . $cities[$item_counter];
echo '<br>';
$addresses[$item_counter] = $html->find('div.preview', $item_counter)->find('div div dl dd', 1)->plaintext;
echo '<b>Адрес: </b>' . $addresses[$item_counter];
echo '<br>';
$phones[$item_counter] = $html->find('div.preview', $item_counter)->find('div div dl dd', 2)->plaintext;
echo '<b>Телефон: </b>' . $phones[$item_counter];
echo '<br>';
$times[$item_counter] = $html->find('div.preview', $item_counter)->find('div div dl dd', 3)->plaintext;
echo '<b>Рабочее время: </b>' . $times[$item_counter];
echo '<br><br>';
$item_counter ++;
}


$page_counter++;
}



?>

