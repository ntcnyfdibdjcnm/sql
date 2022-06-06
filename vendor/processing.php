<?php 
  require_once './connect.php';
  session_start();

  $userId = $_SESSION['user']['id'];
  $currency = $_GET['currency'];

  // Update DB field 'processing'
  $sql = "UPDATE users SET " . $currency . "Proc=1 WHERE id=$userId AND " . $currency . "> 0";
  mysqli_query($connect, $sql);

  // Update Session with DB current data
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

  header('Location: ../profile.php');
?>