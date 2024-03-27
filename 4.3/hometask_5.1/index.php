<?php
$pathdir = 'site/';
$zip = new ZipArchive;
$arch = "arch.zip";
mkdir('copy_backup');
$zipname = "copy_backup/" . "b_" . time() . ".zip";
if ($zip->open($zipname, ZipArchive::CREATE)) {
    $dir = opendir($pathdir);
    while ($d = readdir($dir)) {
        if ($d !== "." && $d !== "..") {
            print_r("В архив добавлен файл " . $d . " размером " . filesize($pathdir . $d) . "<br/>");
            $zip->addFile($pathdir . '/' . $d, $d);
        }
    }
    $zip->close();
    print_r('Файлы добавлены в архив');
} else {
    print_r("Ошибка открытия файла архива!");
}