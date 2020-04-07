<?php

$dir = $argv[1] ?? '';
$pharFile = $argv[2] ?? '';
if (empty($dir)) {
    echo "First argument - source directory is required\n";
    exit;
}
if (empty($pharFile)) {
    echo "Second argument - output file is required!\n";
    exit;
}
if (!file_exists($dir.'/index.php')) {
    echo "$dir/index.php doesnt exits!\n";
    exit;
}
if (file_exists($pharFile)) {
    unlink($pharFile);
}
$phar = new Phar($pharFile);
$phar->startBuffering();
$defaultStub = $phar->createDefaultStub('index.php');
$phar->buildFromDirectory($dir, '/\.php$/');
$stub = "#!/usr/bin/php \n".$defaultStub;
$phar->setStub($stub);
$phar->stopBuffering();

exec("chmod +x $pharFile");

echo "$pharFile successfully created. Ready to execute\n";