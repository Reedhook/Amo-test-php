<?php

namespace ReadFile;
class ReadFile
{
    public function check($name): array
    {
        // Обработка данных
        $file = file_get_contents("../files/$name");

        // Разбиваем файл на строки
        $lines = explode("\n", $file);
        $data = [];

        // Обходим каждую строку
        foreach ($lines as $line) {
            // Проверяем, что строка не пустая
            if (trim($line) != '') {
                // Ищем все цифры в строке
                preg_match_all("/[0-9]/", $line, $matches);
                // Сохраняем количество найденных цифр в строке
                $data[$line] = count($matches[0]);
            }
        }

        // Возвращаем массив данных
        return $data;
    }
}