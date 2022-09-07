<html lang="ru">
<!--
    Создать PHP-страницу upload.php с формой загрузки CSV-файла
    В CSV-файле должны быть 2 столбца: название файла, содержимое
    Рядом с файлом upload.php требуется создать папку /upload/ и создать в ней файлы, прочитав CSV-файл.
    Какие дыры это может создать? Как бороться?
    Ограничений на функции и возможности PHP нет.

    Пример файла CSV:
    aaa.txt,Привет
    bbb.log,Тест
    ccc.html,<h1>Заголовок</h1>

    При загрузке такого файла должны быть созданы /upload/1.txt, /upload/2.log, /upload/3.html (с соответствующим содержимым)
-->
<head>
    <meta charset="utf-8" />
    <title>Загрузчик CVS-файла</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="mb-3">
        <form method="post" action="processing.php" enctype="multipart/form-data">    
            <label for="formFile" class="form-label">Загрузите CSV-файл</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <input class="form-control" type="file" id="formFile" name="csv_file" accept=".csv">
            <button type="submit" class="btn btn-secondary" name="file-loader">Загрузить</button>
        </form>
    </div>
</body>

</html>
