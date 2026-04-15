<?php
/**
 * Script to inject a translate-hiding inline script into the <head> of all public blade templates.
 * This adds a 1-line script before </head> that checks localStorage and hides content immediately.
 */

$viewsDir = __DIR__ . '/resources/views';

$scriptLine = "    <script>if(localStorage.getItem('selectedLanguage')&&localStorage.getItem('selectedLanguage')!=='en'){document.documentElement.classList.add('notranslated');}</script>\n";

// All public blade files (not admin, not components)
$files = glob($viewsDir . '/*.blade.php');

$successCount = 0;

foreach ($files as $filePath) {
    $filename = basename($filePath);
    $content = file_get_contents($filePath);
    
    // Skip if already has the script
    if (strpos($content, 'notranslated') !== false) {
        echo "SKIP: $filename - already has the script\n";
        continue;
    }
    
    // Find </head> and insert the script before it
    $headClosePos = strpos($content, '</head>');
    if ($headClosePos === false) {
        echo "SKIP: $filename - no </head> found\n";
        continue;
    }
    
    $newContent = substr($content, 0, $headClosePos) . $scriptLine . substr($content, $headClosePos);
    file_put_contents($filePath, $newContent);
    
    echo "OK: $filename\n";
    $successCount++;
}

echo "\nDone! $successCount files updated.\n";
