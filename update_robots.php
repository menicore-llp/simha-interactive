<?php
$rootDir = 'c:/Users/Nirmal Patel/Desktop/MC/madhu/resources/views';
$metaTag = '  <meta name="robots" content="noindex, nofollow">' . PHP_EOL;

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootDir));

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $filePath = $file->getRealPath();
        $content = file_get_contents($filePath);
        
        if (strpos($content, '<head>') !== false && strpos($content, 'name="robots"') === false) {
            echo "Updating: $filePath\n";
            $newContent = str_replace('<head>', "<head>\n$metaTag", $content);
            file_put_contents($filePath, $newContent);
        }
    }
}
