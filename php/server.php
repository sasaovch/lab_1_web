<?php
function checkX() {
    if (isset($_GET['x'])) {
        $x = floatval($_GET['x']);
        if ($x == -2 || $x == -1.5 || $x == -1 || $x == -0.5 || $x == 0 || $x == 0.5 || $x == 1 || $x == 1.5 || $x == 2) {
            return true;
        }
    }
    return false;
}

function checkY() {
    if (isset($_GET['y'])) {
        $y = $_GET['y'];
        if (is_numeric($y)) {
            if ($y >= -3 && $y <= 5) {
                return true;
            }
        }
    }
    return false;
}

function checkR() {
    if (isset($_GET['r'])) {
        $r = floatval($_GET['r']);
        if ($r == 1 || $r == 2 || $r == 3 || $r == 4 || $r == 5) {
            echo 'true';
            return true;
        }
    }
    return false;
}
$start_time = microtime(true);
session_start();
unset($_SESSION['hit']);

if (checkX() & checkY() & checkR()) {
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
}
header('Location: ./index.php');
