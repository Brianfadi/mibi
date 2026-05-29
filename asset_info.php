<?php
echo "=== Images ===\n";
$files = glob('public/images/IMG-*.jpg');
sort($files);
foreach ($files as $f) {
    $info = getimagesize($f);
    $name = basename($f);
    $size = filesize($f);
    echo $name . ' => ' . ($info[0]??'?') . 'x' . ($info[1]??'?') . ' ' . round($size/1024) . 'KB' . PHP_EOL;
}
echo "\n=== Videos ===\n";
$videos = glob('public/videos/VID-*.mp4');
foreach ($videos as $f) {
    $name = basename($f);
    $size = filesize($f);
    echo $name . ' => ' . round($size/1024/1024, 1) . 'MB' . PHP_EOL;
}
echo "\n=== Logo ===\n";
echo 'logo.jpg => ' . round(filesize('public/images/logo.jpg')/1024) . 'KB' . PHP_EOL;
