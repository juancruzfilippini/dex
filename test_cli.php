<?php
$host = "bbdd.gde4t.mendoza.gov.ar";
$port = "1521";
$service = "GDE4T";
$user = "consulta01";
$pass = "rcYpUS56qhrd2XOn";

echo "USER=", $user, " LEN_USER=", strlen($user), PHP_EOL;
echo "LEN_PASS=", strlen($pass), PHP_EOL;

$tns = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))(CONNECT_DATA=(SERVICE_NAME=$service)))";
$c = oci_connect($user, $pass, $tns, 'AL32UTF8');
if (!$c) { print_r(oci_error()); exit; }
echo "OK\n";
