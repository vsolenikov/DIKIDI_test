<?php
// Устанавливаем корневую папку сайта
$rootFolder = 'C:\xampp\htdocs\file_manager';

// Получаем список файлов и папок в текущей директории
$files = scandir($rootFolder);

// Отображаем содержимое текущей директории
foreach($files as $file) {
    // Проверяем, является ли текущий элемент папкой или изображением
    if(is_dir($rootFolder.'/'.$file)) {
        echo '<a href="filemanager.php?dir='.$file.'">'.$file.'</a><br>';
    } else {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo '<img src="'.$rootFolder.'/'.$file.'" alt="'.$file.'"><br>';
        }
    }
}
?>