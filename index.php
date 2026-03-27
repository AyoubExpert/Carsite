<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'Homepage';
$page = str_replace('#', '', $page);
$file = __DIR__ . '/Website/Pages/' . $page . '/Base.php';

if (file_exists($file)) {
    include $file;
} else {
    http_response_code(404);
    include __DIR__ . '/Website/Pages/Error/Base.php';
}