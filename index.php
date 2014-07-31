<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Make Ups</title>
    <meta name="viewport" content="width=device-width">
    <style>
        body {
            background: #F4F8FA;
        }
        
        .makeups_list {
            border-left: 3px solid #BCE8F1;
            margin: 50px;
            display: inline-block;
            list-style: none;
        }

        .makeups_list_counter {
            display: inline-block;
            font-size: 14px;
            color: #333333;
        }

        .makeups_list li {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 21px;
        }

        .makeups_list a {
            color: #34789A;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .makeups_list a:hover {
            color: #563D7C;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <ul class="makeups_list">
        <?
	        // проверяем корневую на корневую папку
	        $docRoot = explode('/', $_SERVER['DOCUMENT_ROOT']);
	        $currentDocRoot = $docRoot[count($docRoot) - 1];

	        $fileRoot = explode('/', $_SERVER['SCRIPT_FILENAME']);
	        $currentFileRoot = $fileRoot[count($fileRoot) - 2];

	        // смотрим в корень
	        $dir = scandir('./html');
	        $htmls = array();
	        foreach($dir as $file) {
	            if(strpos($file,'.html') && strpos($file,'.htm')) {
	                $htmls[] = $file;
	            }
	        }

	        // вытягиваем тайтлы
	        $titles = array();
	        foreach($htmls as $i => $file) {
	            $content = file_get_contents('./html/'.$file);
	            preg_match('#<title>(.*)<\/title>#u', $content, $result);
	            $titles[$i] = $result[1];
	        }
   		?>
	    <? foreach ($htmls as $i => $file): ?>
	        <li>
	            <? if ($currentDocRoot == $currentFileRoot): ?>
	                <a href="/html/<?= $file ?>" target="_blank">
	                    <span class="makeups_list_counter"><?= $i + 1 ?>. </span>
	                    <?= $titles[$i] ?>
	                </a>
	            <? else : ?>
	                <a href="<?= $_SERVER['REQUEST_URI'] ?>html/<?= $file ?>" target="_blank">
	                    <span class="makeups_list_counter"><?= $i + 1 ?>. </span>
	                    <?= $titles[$i] ?>
	                </a>
	            <? endif; ?>
	        </li>
	    <? endforeach; ?>
    </ul>
</body>
</html>

