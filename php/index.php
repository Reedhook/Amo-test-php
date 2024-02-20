<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>File Upload</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
<div id="result">
    <h2>Result:</h2>
    <?php
    require_once 'ReadFile.php'; // Подключаем файл с классом
    use ReadFile\ReadFile;

    if (isset($_GET['success'])) { // Проверяем наличие параметра success в URL
        if ($_GET['success'] == 1) { // Проверяем, была ли успешная загрузка файла
            echo "<div class='circle green'></div><br>"; // Выводим зеленый кружок для успешной загрузки
            $read = new ReadFile(); // Создаем экземпляр класса ReadFile
            $response [] = $read->check($_GET['file']); // Проверяем содержимое загруженного файла
            echo '<h3>Strings:</h3>'; // Выводим заголовок "Strings"
            foreach ($response as $data){ // Перебираем данные из файла
                foreach ($data as $key => $value){ // Перебираем каждую строку и количество цифр в ней
                    echo "$key = $value<br><br>"; // Выводим информацию о строке
                }
            }
        } else {
            if (isset($_GET['error'])) {
                echo "<div class='red-circle'></div>";
                echo "<p class='error-message'>" . $_GET['error'] . "</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>