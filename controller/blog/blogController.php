<?php 

$tmp = new Template('Blog');
$tmp->listJs = [
    'staticfiles/scripts/class.js',
];
$msg = "Blog con MVC de PHP.";


include 'view/blog/blogView.phtml';

?>