<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'Homepage';
$bases_url = isset($_GET['bases_url']) ? $_GET['bases_url'] : 'Website/';
$page = str_replace('#', '', $page);

// Include the page
$file = __DIR__ . '/Website/Pages/' . $page . '/Base.php';
if (file_exists($file)) {
    include $file;
} else {
    http_response_code(404);
    include __DIR__ . '/Website/Pages/Error/Base.php';
}
?>