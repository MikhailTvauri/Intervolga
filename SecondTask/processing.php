<?php
    if($_FILES['csv_file'] and isset($_POST['file-loader']))
    {
        $filepath = $_FILES['csv_file']['tmp_name'];
        $file = fopen($filepath, 'r');
        for ($i = 0; !feof($file); $i++)
        {
            $strcsv = fgetcsv($file, null, ";");

            
            //Так как нам нужно определить формат создаваемых файлов, проверяем прочитанную строку на наличие расширения.
            //Если расширение присутствует, то записываем необходимую часть этой строки в файл, подставляя наденное расширение.

            preg_match('/\.\S*$/', $strcsv[0], $expansion);
            if($expansion)
            {
                $expansion_str = $expansion[0];
                $content = $strcsv[1];
                file_put_contents("upload/1$expansion_str", $content);
            }
        }
    }

    header('Location: upload.php');
?>