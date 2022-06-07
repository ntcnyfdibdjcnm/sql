<?php
  require_once './connect.php';
  session_start();

  $from = $_GET['from'];
  $to = $_GET['to'];
  $amount = floatval($_GET['amount']);
  $user = $_SESSION['user'];
  $userId = $user['id'];

  $sql = "SELECT * FROM exchange WHERE name='$from $to'";
  $rate = mysqli_fetch_assoc(mysqli_query($connect, $sql))['rate'];

  $fromResult = $user[$from] - $amount * $rate;
  $toResult = $user[$to] + $amount;
  if ($fromResult >= 0) {
    $sql = "UPDATE `users` SET `$to` = '$toResult', `$from` = '$fromResult' WHERE id=$userId";
    mysqli_query($connect, $sql);
  };

  $sql = "SELECT * FROM users WHERE id=$userId";
  $user = mysqli_fetch_assoc(mysqli_query($connect, $sql));
  $_SESSION['user'] = [
    "id" => $user['id'],
    "full_name" => $user['full_name'],
    "email" => $user['email'],
    "login" => $user['login'],
    "card" => $user['card'],
    "usd" => $user['usd'],
    "eur" => $user['eur'],
    "btc" => $user['btc'],
    "usdProc" => $user['usdProc'],
    "eurProc" => $user['eurProc'],
    "btcProc" => $user['btcProc']
  ];

  if ($fromResult < 0) {
    $_SESSION['message'] = "Недостаточно средств";
  };

  header('Location: ../profile.php');
?>