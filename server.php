<?php
$port = getenv('PORT') ?: '8080';
$host = '0.0.0.0';
echo "Server running on http://$host:$port\n";
passthru("php -S $host:$port");
