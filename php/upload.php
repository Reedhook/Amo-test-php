<?php
// Указываем директорию для загрузки файлов
$target_dir = "../files";

// Проверяем, существует ли указанная директория
if (!file_exists($target_dir)) {
    // Создаем директорию, если она не существует
    mkdir($target_dir, 0777);
}

// Получаем временное имя загруженного файла
$tmp_name= $_FILES['file']['tmp_name'];

// Получаем название файла
$name = basename($_FILES["file"]["name"]);

// Получаем расширение
$fileExtension = pathinfo($name, PATHINFO_EXTENSION);

// Проверка расширения
if ($fileExtension !== 'txt') {
    header("Location: index.php?success=0&error=File upload failed. Only .txt files are allowed to be uploaded.");
    exit();
}


// перемещаем загруженный файл в указанную директорию
if (move_uploaded_file($tmp_name, "$target_dir/$name")) {

    // Перенаправляем на страницу с успешным результатом и именем файла
    header("Location: index.php?success=1&file=$name");
} else {
    header("Location: index.php?success=0&error=File upload failed"); // Перенаправляем на страницу с ошибкой загрузки файла
}
