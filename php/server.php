<?php
$start_time = microtime(true);
session_start();
unset($_SESSION['hit']);

$r = floatval($_GET['r']);
$x = floatval($_GET['x']);
$y = floatval($_GET['y']);
$hit = false;

if ($x >= 0 && $y >= 0) {
    $hit = $r/2 - $r/2 * $x >= $y; 
} else if ($x > 0 && $y < 0) {
    $hit = false;
}  else if ($x < 0 && $y <= 0) {
    $hit = ($x >= -$r && $y >= -$r/2);
} else if ($x <= 0 && $y > 0) {
    $hit = $r >= sqrt($x*$x + $y*$y);
}
if ($hit) {
    $_SESSION['hit'] = 'Successful hit';
} else {
    $_SESSION['hit'] = 'You missed';
}
$attempt = ["x" => $x, "y" => $y, "r" => $r, "hit" => $hit, "attempt_time" => $start_time, "process_time" => round((microtime(true) - $start_time), 5)];
if (isset($_SESSION['attempts'])) {
    array_push($_SESSION['attempts'], $attempt);
} else {
    $_SESSION['attempts'] = array($attempt);
}
header('Location: ./index.php');