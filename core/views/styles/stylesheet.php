<?php
header('Content-Type: text/css');
echo file_get_contents($_GET['style'] . '.css');