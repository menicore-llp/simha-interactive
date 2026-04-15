<?php

$dir = __DIR__ . '/resources/views';
$files = glob($dir . '/*.blade.php');

$routesMap = [
    'index' => 'home',
    '3d-cut-section-rendering' => '3d-cut-section-rendering',
    '3d-exterior-rendering' => '3d-exterior-rendering',
    '3d-floor-plan' => '3d-floor-plan',
    '3d-interior-rendering' => '3d-interior-rendering',
    'about-us' => 'about-us',
    'architectural-exterior-model' => 'architectural-exterior-model',
    'architectural-interior-model' => 'architectural-interior-model',
    'architecture-3d-walkthrough' => 'architecture-3d-walkthrough',
    'blog-detail' => 'blog-detail',
    'blog' => 'blog',
    'career' => 'career',
    'contact-us' => 'contact-us',
    'digital-light-processing-dlp' => 'digital-light-processing-dlp',
    'engineering-model-making' => 'engineering-model-making',
    'fused-deposition-modeling-fdm' => 'fused-deposition-modeling-fdm',
    'industrial-model-making' => 'industrial-model-making',
    'job-detail' => 'job-detail',
    'marine-model-making' => 'marine-model-making',
    'master-plan-model-making' => 'master-plan-model-making',
    'our-services' => 'our-services',
    'piping-model-making' => 'piping-model-making',
    'stereolithography-sla' => 'stereolithography-sla'
];

$changesMade = 0;
foreach ($files as $file) {
    if (!is_file($file)) continue;
    $content = file_get_contents($file);
    $original = $content;

    foreach ($routesMap as $path => $routeName) {
        $phpCode = "{{ route('$routeName') }}";
        
        // Match href="path" or href="path.html"
        $content = preg_replace('/href=[\'"]' . preg_quote($path, '/') . '(\.html)?[\'"]/', 'href="' . $phpCode . '"', $content);
        
        // Match window.location.href="path.html" or window.location.href='path.html'
        $content = preg_replace('/window\.location\.href=[\'"]' . preg_quote($path, '/') . '(\.html)?[\'"]/', "window.location.href='" . $phpCode . "'", $content);
    }

    if ($original !== $content) {
        file_put_contents($file, $content);
        $changesMade++;
        echo "Updated links in: " . basename($file) . "\n";
    }
}

echo "Completed updating $changesMade files.\n";
