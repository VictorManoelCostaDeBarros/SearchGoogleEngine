<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motor de Busca</title>
</head>
<body>
    <?php 
        if(isset($_POST['q'])){
            $q = urlencode($_POST['q']);
            $handle = curl_init();

            $url = 'https://www.googleapis.com/customsearch/v1?key=AIzaSyDPnCy_RiZgHYnoxcbWxIKzB4d6ElyOgI4&cx=004837451977957516242:-7tg4ze3ena&q='.$q;

            // set the url
            curl_setopt($handle, CURLOPT_URL, $url);
            // set the result output to be a string.
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
            $output = curl_exec($handle);

            curl_close($handle);

            $resultado = json_decode($output);

            for($i = 0;$i < count($resultado->items);$i++){
                echo '<a href="'.$resultado->items[$i]->link.'">';
                echo $resultado->items[$i]->title;
                echo '</a>';
                echo '<br>';
            }
        }

        
    ?>

    <form method="post">
        <input type="text" name="q">
        <input type="hidden" name="busca">
        <input type="submit" name="acao" value="Buscar!">
    </form>
    
</body>
</html>