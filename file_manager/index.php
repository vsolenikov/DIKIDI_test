<?php
$site_dir = '/'.substr($_SERVER['DOCUMENT_ROOT'], 3).'/';
$path = $site_dir;
//Решил брать путь из GET-параметров
//Здесь проверяем если есть GET-параметр dir и он подходит под корневую папку ИЛИ ЖЕ этот параметр вовсе отсутствует то отображаем файловый менеджер, иначе выдаём ошибку доступа
if (isset($_GET['dir']) && strpos(realpath($_GET['dir']), realpath($_SERVER['DOCUMENT_ROOT'])) !== false || empty($_GET['dir'])) {
    if (isset($_GET['dir'])) {
        $newDir = $_GET['dir'];
        if (is_dir($newDir)) {
            $site_dir = $newDir;
        }
    }

    $files = scandir($site_dir);
    $filtered_files = array_filter($files, function ($file) use ($site_dir) {
        //определяем является ли элемент массива папкой или файлом
        return is_dir($site_dir . $file) || preg_match('/\.(jpg|jpeg|png|gif)$/i', $file);
    });

} else {
    echo 'Access Denied <br/>';
    echo '<a href="/">Вернуться</a>';
    die();
}
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></head>
<style>
    .main {
        background: lightgray;
        padding: 20px 5px;
        border-radius: 5px;
        margin: 20px 0px;
    }
    table{
        width: 50%;
        margin: 15px 0px;
    }
    tr{
        border:1px solid black;
    }
    a{
        padding: 6px;
        background: lightgreen;
        border-radius: 5px;
        color: black;

    }
    a:hover{
        color: gray;
        transition: 1s;

    }
    img{
        max-height: 50px;
    }
    img:hover{
        transition: 1s;
        max-height: 150px;
    }
</style>
<body>
<div class="container">

    <div class="row">
        <div class="col-12 main">
            <div class="center-block">
                <h3> File - Manager - Solenikov</h3>
            </div>
            <div>
                <?php
                //если находимся не в корневой папке, то выведем кнопку назад по которой вернёмся в родительскую папку
                if ($site_dir != $path) {
                    $parentDir = dirname($site_dir);
                    echo "<a href='?dir=" . $parentDir . '/' . "'>Назад</a><br>";
                }
                ?>
            </div>
            <div>
                <table>
                    <?php
                    try{
                        //разбираем элементы и в зависимости от типа элемента подставляем либо ссылку для перехода в папку, либо выводим изображение
                        foreach ($filtered_files as $file) {
                            if (is_dir($site_dir . $file)) {
                                if($file[0]!='.')
                                    echo "<tr><td class='pl-3 pt-2 pb-2'><a href='?dir=" . $site_dir . $file . "/'>" . $file . "</a></td></tr>";
                            } else {
                                $addr_picture = str_replace($path, "",$site_dir);
                                echo "<tr><td class='pl-3 pt-2 pb-2'><img src='" . $addr_picture . $file . "' alt='" . $file . "'></td></tr>";
                            }
                        }
                    }
                    catch (Exception $er){
                        echo "Возникла непредвиденная ошибка!";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>