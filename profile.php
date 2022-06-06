<?php
  session_start();
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
        <li class="tab">Инвестиции</li>
        <li class="tab">Помощь</li>
        <li class="tab active">Профиль</li>
      </ul>
      <a href="vendor/logout.php" class="logout sidebar-btn"><button>Выйти</button></a>
    </aside>
    <main class="content">
      <marquee bgcolor="#00FF7F">
        Получить статус участника: Активация личного кабинета 50$
      </marquee>
      <div class="card" style="justify-content: center; width: 100%">
        <h1>Данные профиля</h1>
      </div>
      <div class="left">
        <div class="card" style="width: 100%">
          <img class="manager_avatar" src="svg/image1.svg" />
          <div class="manager">
            <h2 class="manager_title">Персональный менеджер</h2>
            <h3 class="manager_fio">ФИО менеджера</h3>
            <span class="manager_row">
              <img src="icons/phone.png" />
              <p>+373 78 496 384</p>
            </span>
            <span class="manager_row">
              <img src="icons/email.png" />
              <p>zxc@gmail.com</p>
            </span>
          </div>
        </div>

        <div class="card" style="display: block; width: 100%">
          <div class="owner_title">
            <img class="foto" src="png/4.png" />
            <h2>Информация о владельце</h2>
          </div>

          <table class="owner_info">
            <tr>
              <td>ФИО:</td>
              <td>
                <?= $_SESSION['user']['full_name'] ?>
              </td>
            </tr>
            <tr>
              <td>Логин:</td>
              <td>
                <?= $_SESSION['user']['login'] ?>
              </td>
            </tr>
            <tr>
              <td>Электронная почта:</td>
              <td>
                <?= $_SESSION['user']['email'] ?>
              </td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card" style="display: block; width: 59%">
        <h2 class="balance_title">Баланс:</h2>
        <table class="balance_wallet">
          <tr>
            <td class="wallet_currency">USD:</td>
            <td class="wallet_amount">
              <?= $_SESSION['user']['usd'] ?? 0 ?> $
            </td>
            <td class="wallet_actions">
              <button>Пополнить</button>
              <a href="vendor/processing.php?currency=usd"><button>Вывести</button></a>
            </td>
            <td class="wallet_indication">
              <div class="processing" style="display: <?= $_SESSION['user']['usdProc'] == " 1" ? "flex" : "none" ?>">
                <div>Обработка запроса...</div>
                <span class="spin"></span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="wallet_currency">EUR:</td>
            <td class="wallet_amount">
              <?= $_SESSION['user']['eur'] ?? 0 ?> €
            </td>
            <td class="wallet_actions">
              <button>Пополнить</button>
              <a href="vendor/processing.php?currency=eur"><button>Вывести</button></a>
            </td>
            <td class="wallet_indication">
              <div class="processing" style="display: <?= $_SESSION['user']['eurProc'] == 1 ? " flex" : "none" ?>">
                <div>Обработка запроса...</div>
                <span class="spin"></span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="wallet_currency">BTC:</td>
            <td class="wallet_amount">
              <?= $_SESSION['user']['btc'] ?? 0 ?> ₿
            </td>
            <td class="wallet_actions">
              <button>Пополнить</button>
              <a href="vendor/processing.php?currency=btc"><button>Вывести</button></a>
            </td>
            <td class="wallet_indication">
              <div class="processing" style="display: <?= $_SESSION['user']['btcProc'] == 1 ? " flex" : "none" ?>">
                <div>Обработка запроса...</div>
                <span class="spin"></span>
              </div>
            </td>
          </tr>
        </table>
        <h3>Номер карты:
          <?= $_SESSION['user']['card'] ?? 0 ?>
        </h3>
        <button class="convert" onClick="showModalWin()">Конвертация валют</button>
        <?php
            if ($_SESSION['message']) {
              echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
          ?>
      </div>

      <h3 class="podval">Есть вопросы? Ищите ответы в FAQ или звоните +357 2534 2627</h3>
      
      <div class="podval2">
        <p>EXT LTD зарегистрирована как общество с ограниченной ответственностью в соответствии с законодательством Кипра.<br>
        EXT LTD уполномочена Комиссией по ценным бумагам и биржам Кипра (CySec) предоставлять инвестиционные услуги в рамках Лицензии номер 165/12<br>
        Региональные ограничения: EXT LTD. не предоставляет услуги гражданам некоторых определенных регионов, например, США.</p>
      </div>

      <div id="popupWin" class="popupWin">

        <form action="./vendor/exchange.php" method="GET">
          <h3 class="kurs">Курс: 17.85</h3>

          <select name="from" required="required">
            <option value="">Обмениваемая валюта</option>
            <option value="usd">USD &#36</option>
            <option value="eur">EU &#8364</option>
            <option value="btc">Bitcoin &#8383</option>
          </select>

          <select name="to" required="required">
            <option value="">Получаемая валюта</option>
            <option value="usd">USD &#36</option>
            <option value="eur">EU &#8364</option>
            <option value="btc">Bitcoin &#8383</option>
          </select>

          <div>
            <h4>Сумма обмена</h4>
            <input name="amount" type="text" required="required">
          </div>

          <button><img align="center" width="40" height="30" src="png/5.png">Конвертировать</button>
        </form>
      </div>
    </main>
  </div>



  <script type="text/javascript">
    function showModalWin() {
 
    var darkLayer = document.createElement('div'); // слой затемнения
    darkLayer.id = 'shadow'; // id чтобы подхватить стиль
    document.body.appendChild(darkLayer); // включаем затемнение

    var modalWin = document.getElementById('popupWin'); // находим наше "окно"
    modalWin.style.display = 'block'; // "включаем" его

    darkLayer.onclick = function () {  // при клике на слой затемнения все исчезнет
    darkLayer.parentNode.removeChild(darkLayer); // удаляем затемнение
    modalWin.style.display = 'none'; // делаем окно невидимым
    return false;
 };
}
  </script>

</body>

</html>
