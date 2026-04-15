<?php

$dir = __DIR__ . '/resources/views/admin';
$files = glob($dir . '/*.blade.php');

$routesMap = [
    'dashboard' => 'admin.dashboard',
    'login' => 'admin.login',
    'add-career' => 'admin.add-career',
    'careers' => 'admin.careers',
    'applicants' => 'admin.applicants',
    'add-blog' => 'admin.add-blog',
    'blogs' => 'admin.blogs'
];

$changesMade = 0;
foreach ($files as $file) {
    if (!is_file($file)) continue;
    $content = file_get_contents($file);
    $original = $content;

    foreach ($routesMap as $path => $routeName) {
        $phpCode = "{{ route('$routeName') }}";
        
        // Match href="path" or href="path.html" or href="../path.html"
        $content = preg_replace('/href=[\'"](\.\.\/)?' . preg_quote($path, '/') . '(\.html)?[\'"]/', 'href="' . $phpCode . '"', $content);
        
        // Match window.location.href="path.html" or window.location.href='path.html'
        $content = preg_replace('/window\.location\.href=[\'"](\.\.\/)?' . preg_quote($path, '/') . '(\.html)?[\'"]/', "window.location.href='" . $phpCode . "'", $content);
    }

    // specific catch for index.html leading back to home
    $homePhpCode = "{{ route('home') }}";
    $content = preg_replace('/href=[\'"](\.\.\/)?index(\.html)?[\'"]/', 'href="' . $homePhpCode . '"', $content);

    if ($original !== $content) {
        file_put_contents($file, $content);
        $changesMade++;
        echo "Updated links in: " . basename($file) . "\n";
    }
}

echo "Completed updating $changesMade admin files.\n";
