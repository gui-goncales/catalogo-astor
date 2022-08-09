<?php
$output=null;
$retval=null;
exec('php /var/www/vhosts/astorbrindes.com.br/catalogo.astorbrindes.com.br/artisan queue:work --once', $output, $retval);
echo "Returned with status $retval and output:\n";
print_r($output);
?>
