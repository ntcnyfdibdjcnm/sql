<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Личный кабинет</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="menu">
			<img src="svg/image.svg">
			<img align="left" src="png/1.png">
			<a href="inv/index.html">
				<h3 class="knopka_invest" style="color: #007F39">Инвестиции</h3>
			</a>
			<img align="left" src="png/2.png">
			<a href="https://t.me/exanteglobal">
				<h3 class="knopka_pomoch" style="color: #007F39">Помощь</h3>
			</a>
			<img align="left" src="png/3.png">
			<h3 class="knopka_dannie" style="color: #007F39">Данные профиля</h3>

			<p>Присоединяйтесь к нам в <a href="https://t.me/exanteglobal">телеграмме</a></p>
			<a href="vendor/logout.php" class="logout"><button class="vihod">Выйти</button></a>
		</div>

		<div class="dan_prof" align="center">
			<h1>Данные профиля</h1>
		</div>

		<div class="meneger">
			<img align="left" class="icon" src="svg/image1.svg"/>
			<h2 class="vas_meneger">Ваш персональный менеджер</h2>
			<h4 class="fio_meneger">ФИО менеджера</h4>
			<div class="tel_mail">
				<img align="left" src="img/3.png">
				<p>+373...</p>
				<img align="left" src="img/4.png">
				<p>zxc@gmail.com</p>
			</div>
		</div>

		<div class="inf">
			<img class="foto" align="left" src="png/4.png">
			<h2 class="inf_o_vlad">Информация о владельце</h2>
			<table class="tablicha" border="1" width="400" bordercolor="black">
				<tr>
					<td>ФИО:</td>
					<td><?= $_SESSION['user']['full_name'] ?></td>
				</tr>
				<tr>
					<td>Логин:</td>
					<td><a href="#"><?= $_SESSION['user']['login'] ?></td>
				</tr>
				<tr>
					<td>Электронная почта:</td>
					<td><a href="#"><?= $_SESSION['user']['email'] ?></td>
				</tr>
			</table>
		</div>

		<div class="kripta_dengi">
			<h2 class="balans">Баланс:<?= $_SESSION['user']['balance'] ?></h2>
			<h3 class="popolnit_balans">Пополнить баланс через биткоин-кошелёк:</h3>
			<div><a href="https://accounts.binance.com/ru/login"><button class="popolnit"><b>Пополнить</b></button></a></div>
			<p class="koshel">3Brpq3Y7HFaUMBNfi5HLvCC9iJsUPAWsdv</p>
		</div>

		<h3 class="podval">Есть вопросы? Ищите ответы в FAQ или звоните +357 2534 2627</h3>

		<div class="podval2">
			<p>
				EXT LTD зарегистрирована как общество с ограниченной ответственностью в соответствии с законодательством Кипра.<br>
				EXT LTD уполномочена Комиссией по ценным бумагам и биржам Кипра (CySec) предоставлять инвестиционные услуги в рамках Лицензии номер 165/12<br>
				Региональные ограничения: EXT LTD. не предоставляет услуги гражданам некоторых определенных регионов, например, США.
			</p>
		</div>
	</body>
</html>