<?php
$viewsDir = __DIR__ . '/resources/views';
$files = glob($viewsDir . '/*.blade.php');

foreach ($files as $file) {
    if (in_array(basename($file), ['index.blade.php', 'about.blade.php', 'services.blade.php', 'portfolio.blade.php', 'contact.blade.php'])) {
        $content = file_get_contents($file);
        
        // Replace asset paths
        $content = preg_replace('/src="\.\/assets\/(.*?)"/', 'src="{{ asset(\'assets/$1\') }}"', $content);
        $content = preg_replace('/href="\.\/assets\/(.*?)"/', 'href="{{ asset(\'assets/$1\') }}"', $content);
        // Sometimes it's just 'assets/...'
        $content = preg_replace('/src="assets\/(.*?)"/', 'src="{{ asset(\'assets/$1\') }}"', $content);
        $content = preg_replace('/href="assets\/(.*?)"/', 'href="{{ asset(\'assets/$1\') }}"', $content);

        // Videos might have src="..."
        $content = preg_replace('/<video(.*?)src="\.\/assets\/(.*?)"/', '<video$1src="{{ asset(\'assets/$2\') }}"', $content);
        $content = preg_replace('/<video(.*?)src="assets\/(.*?)"/', '<video$1src="{{ asset(\'assets/$2\') }}"', $content);

        // Replace route links
        $content = str_replace('href="index.html"', 'href="{{ route(\'home\') }}"', $content);
        $content = str_replace('href="about.html"', 'href="{{ route(\'about\') }}"', $content);
        $content = str_replace('href="services.html"', 'href="{{ route(\'services\') }}"', $content);
        $content = str_replace('href="portfolio.html"', 'href="{{ route(\'portfolio\') }}"', $content);
        $content = str_replace('href="contact.html"', 'href="{{ route(\'contact\') }}"', $content);

        file_put_contents($file, $content);
        echo "Updated " . basename($file) . "\n";
    }
}
