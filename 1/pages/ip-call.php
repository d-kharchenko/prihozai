<!DOCTYPE html>
<html>
<head>
	<title>IP-телефонія</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/app.css">
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
	<script src="../js/vendor.js"></script>
	<script src="../js/app.js" ></script>
</head>
<body>
	<div class="uk-container">
		<div class="uk-container uk-flex uk-flex-middle uk-flex-between uk-padding-small header">
			<div class="contacts-tel">
			<ul class="uk-subnav uk-margin-remove-bottom header-subnav" itemscope itemtype="http://schema.org/Organization">
				<li><span uk-icon="receiver"></span></li>
				<li itemprop="telephone"><a href="tel:+380542790750" class="uk-text-primary uk-text-bold ">+38 (0542) 790-750</a></li>
				<li><span class="uk-text-muted contacts-tel__item" >Багатоканальний :</span></li>
				<li itemprop="telephone"><a href="tel:+380665105008" class="uk-text-primary uk-text-bold">+38 (066) 510-50-08</a></li>
				<!-- <li><span class="uk-text-muted uk-text-bold">+38 (073) 510-50-08</span></li> -->
				<li itemprop="telephone" class="header-list__item"><a href="tel:+380985105008" class="uk-text-primary uk-text-bold ">+38 (098) 510-50-08</a></li>
				<li><span uk-icon="icon: clock"></span></li>
				<li>
					<ul class="uk-list">
						<li class="uk-text-bold">ПН-ПТ: з 9-00 до 18-00</li>
						<li class="uk-text-bold">СБ-НД : вихідний</li>
					</ul>
				</li>
			</ul>
		</div>
			<div class="social-link">
				<ul class="uk-iconnav k-flex uk-flex-middle">
					<li><a href="#"><img src="../img/skype-icon.png" alt="skype" class="social-link__icon"></a></li>
					<li><a href="#"><img src="../img/fb-icon.png" alt="facebook" class="social-link__icon"></a></li>
					<li><a href="#"><img src="../img/viber-icon.png" alt="viber" class="social-link__icon"></a></li>
					<li>
						<a href="" class=" uk-link-text header-login" uk-icon="icon: sign-in">Вхід для клієнтів</a>
					</li>
				</ul>
			</div>
		</div>
		<div  uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
			<nav class="uk-navbar-container main-nav" uk-navbar style="position: relative; z-index: 980;">
				<div class="uk-navbar-left ">
					<a class="uk-navbar-item uk-logo custom-logo" href="/"><img src="../img/logo-island.png" alt="Ісланд-Україна"></a>
				    <ul class="uk-navbar-nav">
				        <li class="uk-parent"><a href="/">Головна</a></li>
				        <li class="uk-parent">
				          	<a href="#" class="nav-hover-link">Програмне забезпечення <span uk-icon="icon: chevron-down" class="link-arrow"></span></a>
							<div class="uk-navbar-dropdown header-nav">
				                <ul class="uk-nav uk-navbar-dropdown-nav">
				                    <li><a href="accounting-automation.php">Автоматизація обліку</a></li>
				                    <li><a href="ip-call.php">IP-телефонія</a></li>
				                    <li><a href="os.php">Операційні системи</a></li>
				                    <li><a href="office-programs.php">Офісні програми</a></li>
				                </ul>
				            </div>
				        </li>
				        <li class="uk-parent"><a href="ua-budget.php">UA-Бюджет<img src="../img/ua-budget-icon.png" style="max-width: 20px; margin-left: 5px;"></a></li>
				        <li class="uk-parent">
				           	<a href="#" class="nav-hover-link">Послуги <span uk-icon="icon: chevron-down" class="link-arrow"></span></a>
							<div class="uk-navbar-dropdown header-nav">
				                <ul class="uk-nav uk-navbar-dropdown-nav ">
				                    <li><a href="#">Сервісна підтримка</a></li>
				                    <li><a href="#">Електронна звітність</a></li>
				                    <li><a href="#">Оновлення</a></li>
				                    <li><a href="#">Індивідуаньне навчання</a></li>
				                </ul>
				            </div>
				        </li>
				        <li class="uk-parent"><a href="/#our-projects">Наші розробки</a></li>
				        <li class="uk-parent"><a href="/#for-contact">Контакти</a></li>
				    </ul>
				</div>
			</nav>
			<nav class="uk-navbar-container uk-margin uk-margin-remove-top nav-magrin" uk-navbar id="mobile-nav">
				<div class="uk-flex uk-flex-between uk-flex-middle uk-width-expand">
					<a href="#offcanvas-slide" class="uk-button uk-text-muted" uk-toggle><span uk-icon="icon: menu; ratio: 2"></span></a>
					<div id="offcanvas-slide" uk-offcanvas>
					    <div class="uk-offcanvas-bar">
					        <ul class="uk-nav uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
					        	<li><a href="/">Головна</a></li>
					            <li class="uk-parent">
					            	<a href="#">Програмне забезпечення</a>
					            	<ul class="uk-nav-sub">
					                    <li><a href="accounting-automation.php">Автоматизація обліку</a></li>
					                    <li><a href="#">IP-телефонія</a></li>
					                    <li><a href="os.php">Операційні системи</a></li>
					                    <li><a href="office-programs.php">Офісні програми</a></li>
					                </ul>
					            </li>
					            <li><a href="ua-budget.php">UA-Бюджет</a></li>
					            <li class="uk-parent">
					            	<a href="#">Послуги</a>
					            	<ul class="uk-nav-sub ">
					                    <li><a href="#">Сервісна підтримка</a></li>
					                    <li><a href="#">Електронна звітність</a></li>
					                    <li><a href="#">Оновлення</a></li>
					                    <li><a href="#">Індивідуаньне навчання</a></li>
					                </ul>
					            </li>
					            <li class="uk-nav-divider"></li>
					        </ul>
							<div class="contacts-tel">
								<ul class="uk-list uk-margin-remove-bottom header-subnav" itemscope itemtype="http://schema.org/Organization">
									<li itemprop="telephone"><a href="tel:+380542790750" class="uk-text-primary uk-text-bold ">+38 (0542) 790-750</a></li>
									<li><span class="uk-text-muted contacts-tel__item" >Багатоканальний :</span></li>
									<li itemprop="telephone"><a href="tel:+380665105008" class="uk-text-primary uk-text-bold">+38 (066) 510-50-08</a></li>
									<!-- <li><span class="uk-text-muted uk-text-bold">+38 (073) 510-50-08</span></li> -->
									<li itemprop="telephone"><a href="tel:+380985105008" class="uk-text-primary uk-text-bold ">+38 (098) 510-50-08</a></li>
									<li>
										<ul class="uk-list uk-padding-remove">
											<li>ПН-ПТ: з 9-00 до 18-00</li>
											<li>СБ-НД : вихідний</li>
										</ul>
									</li>
								</ul>	
							</div>
							<div class="social-link">
								<ul class="uk-iconnav k-flex uk-flex-middle">
									<li><a href="#"><img src="../img/skype-icon.png" alt="skype" class="social-link__icon"></a></li>
									<li><a href="#"><img src="../img/fb-icon.png" alt="facebook" class="social-link__icon"></a></li>
									<li><a href="#"><img src="../img/viber-icon.png" alt="viber" class="social-link__icon"></a></li>
									<li class="login-link">
										<a href="" class=" uk-link-text header-login" uk-icon="icon: sign-in">Вхід для клієнтів</a>
									</li>
								</ul>
							</div>
					    </div>
					</div>
					<a class="uk-logo custom-logo uk-padding-small" href="#"><img src="../img/logo-island.png" alt="Ісланд-Україна"></a>
				</div> 
			</nav>
		</div>
	</div>
	<div class="uk-section">
		<h1 class="uk-text-center">IP-телефонія</h1>
	</div>
</div>
	
</body>
</html>