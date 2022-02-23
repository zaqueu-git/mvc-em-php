<?php
/**
 * Toda vez que chamar uma classe pelo operador new ou que o PHP detecte 
 * que você está serializando um objeto, obviamente pela função serialize(), 
 * ela entre em ação.
 */
spl_autoload_register(function ($filename) {
    $file = '..' . DIRECTORY_SEPARATOR . $filename . '.php';

    if (DIRECTORY_SEPARATOR === '/') {
        $file = str_replace('\\', '/', $file);
    }

    //echo "<br>" . $file . "<br>";

    if (file_exists($file)) {
        require $file;
    } else {
        //echo '<br>Erro ao importar o arquivo!<br>';
    }
});
?>