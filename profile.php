<?php
session_start();
$processing = $_SESSION['user']['processing'];
if (!$_SESSION['user']) {
  header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
  </head>
  <body>
    <div class="container">
      <aside class="sidebar">
        <img src="svg/image.svg" class="logo" />
        <ul class="tabs">
          <li class="tab active">Invests</li>
          <li class="tab">Help</li>
          <li class="tab">Profile</li>
        </ul>
      </aside>
      <main class="content">
        <div class="card" style="justify-content: center; width: 100%">
          <h1>Данные профиля</h1>
        </div>
        <div class="card">
          <img class="icon" src="svg/image1.svg" />
          <div class="manager">
            <h2 class="manager_title">Ваш персональный менеджер</h2>
            <h4 class="manager_name">ФИО менеджера</h4>
            <p class="manager_phone">+373 78 496 384</p>
            <p class="manager_email">zxc@gmail.com</p>
          </div>
        </div>
        <div class="card">
          <div class="balance">
            <h2 class="balance_title">Баланс:</h2>
            <h4 class="balance_subtitle">
              Пополнить баланс через биткоин-кошелёк:
            </h4>
            <p class="wallet">3Brpq3Y7HFaUMBNfi5HLvCC9iJsUPAWsdv</p>
          </div>
          <div class="actions">
            <button class="fill">Пополнить</button>
            <button id="withdraw" class="withdraw">Вывести</button>
            <div id="processing" style="display: <?= $processing ?>">
              <div>Обработка запроса...</div>
              <span class="spin"></span>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script type="text/javascript">
      const withdrawBtn = document.querySelector("#withdraw");
      const processing = document.querySelector("#processing");

      withdrawBtn.addEventListener("click", () => {
        processing.style.display = "flex";

        <?php
          require_once 'vendor/connect.php';
          $id_local = $_SESSION['user']['id'];
          mysqli_query($connect, "UPDATE users SET processing='1' WHERE id=$id_local");
        ?>
      })
    </script>
  </body>
</html>
