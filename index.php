<?php
    require __DIR__."/vendor/autoload.php";

    use src\Leitor;

    $leitor = new Leitor();
    $leitor->setDiretorio(__DIR__."\arquivos");
    $leitor->setArquivo("dados.csv");
    $arr_csv = $leitor->lerArquivo();

    $leitor->setArquivo("dados.txt");
    $arr_txt = $leitor->lerArquivo();

    echo "<pre>";
    print_r(array_merge($arr_csv, $arr_txt));
    echo "</pre>";
