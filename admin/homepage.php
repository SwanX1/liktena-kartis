<!DOCTYPE html>
<html lang="en">
<head>
	<title>Likteņa Kārtis</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" type="text/css" href="css/font_style.css">
	<script src="/js/functions.js"></script>
	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150849605-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-150849605-1');
	</script>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="sidebar red collapse top large padding animate-left" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
	<a href="javascript:void(0)" onclick="cstm_close()" class="button hide-large display-topleft" style="width:100%;font-size:22px">☰</a>
	<div class="container">
		<h3 class="padding-64"><b>Izvēlne</b></h3>
	</div>
	<div class="bar-block">
		<a href="#" onclick="cstm_close()" class="bar-item button hover-white">Uz augšu!</a> 
		<a href="#ideja" onclick="cstm_close()" class="bar-item button hover-white">Ideja</a>
		<a href="#prototips" onclick="cstm_close()" class="bar-item button hover-white">Prototips</a>
		<a href="#veidotaji" onclick="cstm_close()" class="bar-item button hover-white">Veidotāji</a> 
		<a href="#pasutit" onclick="cstm_close()" class="bar-item button hover-white">Kur nopirkt?</a> 
		<a href="#sazinaties" onclick="cstm_close()" class="bar-item button hover-white">Sazināties</a>
	</div>
</nav>

<!-- Top menu on small screens -->
<header class="container top hide-large red xlarge padding animate-top">
	<a href="javascript:void(0)" class="button red margin-right" onclick="cstm_open()">☰</a>
	<span>Likteņa Kārtis</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="overlay hide-large" onclick="cstm_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="main animate-opacity" style="margin-left:340px;margin-right:40px">

	<!-- Header -->
	<div class="container" style="margin-top:80px">
		<h1 class="jumbo"><b>Likteņa kārtis</b></h1>
	</div>
	<!-- The Idea -->
	<div class="container" id="ideja" style="margin-top:75px">
		<h1 class="xxxlarge text-red"><b>Mūsu ideja.</b></h1>
		<hr style="width:50px;border:5px solid red" class="round">
		<p>
		Teksts
		</p>
	</div>
	<!-- Photo grid (modal) -->
	<div class="container" id="prototips">
		<h1 class="xxxlarge text-red"><b>Prototips.</b></h1>
		<hr style="width:50px;border:5px solid red" class="round">
		<h3>Vēl nav izveidots :(</h3>
		<?php /*<div class="row-padding">
			<div class="half">
				<img src="img/img-not-found.svg" style="width:100%" onclick="//onClick(this)" alt="Foto 1">
			</div>
			<div class="half">
				<img src="img/img-not-found.svg" style="width:100%" onclick="//onClick(this)" alt="Foto 2">
			</div>
		</div>
	<!-- Modal for full size images on click-->
		<div id="modal01" class="modal black" style="padding-top:0" onclick="this.style.display='none'">
			<span class="button black xxlarge display-topright">×</span>
			<div class="modal-content animate-zoom center transparent padding-64">
				<img id="img01" class="image">
				<p id="caption"></p>
			</div>
		</div>*/?>
	</div>
	
	<!-- Creators -->
	<div class="container" id="veidotaji" style="margin-top:75px">
		<h1 class="xxxlarge text-red"><b>Veidotāji.</b></h1>
		<hr style="width:50px;border:5px solid red" class="round">
		<p><h3>Mūsu komanda:</h3></p>
	</div>

	<!-- The Team -->
	<div class="row-padding grayscale">
		<div class="col m4 margin-bottom">
			<div class="light-grey">
				<img src="<?php echo $userdata[0]->getData('image'); ?>" alt="foto nav atrasts" style="width:100%">
				<div class="container">
					<h3><?php echo $userdata[0]->getData('fullName'); ?></h3>
					<p class="opacity"><?php echo $userdata[0]->getData('title'); ?></p>
					<p><?php echo $userdata[0]->getData('about'); ?></p>
				</div>
			</div>
		</div>
		<div class="col m4 margin-bottom">
			<div class="light-grey">
				<img src="<?php echo $userdata[1]->getData('image'); ?>" alt="foto nav atrasts" style="width:100%">
				<div class="container">
					<h3><?php echo $userdata[1]->getData('fullName'); ?></h3>
					<p class="opacity"><?php echo $userdata[1]->getData('title'); ?></p>
					<p><?php echo $userdata[1]->getData('about'); ?></p>
				</div>
			</div>
		</div>
		<div class="col m4 margin-bottom">
			<div class="light-grey">
				<img src="<?php echo $userdata[2]->getData('image'); ?>" alt="foto nav atrasts" style="width:100%">
				<div class="container">
					<h3><?php echo $userdata[2]->getData('fullName'); ?></h3>
					<p class="opacity"><?php echo $userdata[2]->getData('title'); ?></p>
					<p><?php echo $userdata[2]->getData('about'); ?></p>
				</div>
			</div>
		</div>
	</div>

	<!-- how to buy -->
	<div class="container" id="pasutit" style="margin-top:75px">
		<h1 class="xxxlarge text-red"><b>Kur nopirkt?</b></h1>
		<hr style="width:99%;border:5px solid red" class="round">
		<div class="row-padding">
			<div class="half margin-bottom">
				<ul class="ul light-grey center">
					<li class="dark-grey xlarge padding-32">Uz vietas</li>
					<li class="padding-16">Šobrīd vēl nav pieejams</li>
					<li class="padding-16">
						<h2>€ -</h2>
						<span class="opacity">100% aiziet mācību uzņēmumam</span>
					</li>
					<li class="light-grey padding-24">
						<button class="button white padding-large hover-black" disabled>Pasūtīt</button>
					</li>
				</ul>
			</div>
					
			<div class="half">
				<ul class="ul light-grey center">
					<li class="red xlarge padding-32">Mājaslapā</li>
					<li class="padding-16">Šobrīd vēl nav pieejams</li>
					<li class="padding-16">
						<h2>€ -</h2>
						<span class="opacity"><100% aiziet mācību uzņēmumam</span>
					</li>
					<li class="light-grey padding-24">
						<button class="button red padding-large hover-black" disabled>Pasūtīt</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Contact -->
	<div class="container" id="sazinaties" style="margin-top:75px">
		<h1 class="xxxlarge text-red"><b>Kontakti.</b></h1>
		<hr style="width:50px;border:5px solid red" class="round">
		<h3>Gribi uzzināt vairāk? Sazinies ar</h3>
		<p><a href="mailto:karliscern@gmail.com">karliscern@gmail.com</a>,</p>
		<h3>vai nosūti vēstuli šeit!</h3>
		<form action="/#sazinaties" method="POST">
				<div class="half">
					<label>Vārds</label>
					<input id="name_msg" class="input border" type="text" name="name" style="width:90%;" required>
				</div>
				<div class="half">
					<label>E-pasts</label>
					<input id="email_msg" class="input border" type="text" name="email" style="width:90%;" required>
				</div>
			<div class="section">
				<label>Ziņa</label>
				<textarea id="text_msg" class="input border" name="message" style="height:200px;width:95%" required></textarea>
			</div>
			<div align="right" style="padding-right:5%;">
				<button type="submit" class="button block padding-large red margin-bottom" style="width:20%;">Sūtīt Ziņu</button>
			</div>
		</form>
	</div>

<!-- End page content -->
</div>

<footer>
	<h5>
		<div class="light-grey container padding-32" style="margin-top:75px;padding-right:58px">
			<div class="right" style="text-align:right;">
				<p>
					Kārlis Čerņavskis © <?php echo date("Y") ?>
				</p>
				<p>
					Mājaslapas paraugs ņemts no 
					<a href="https://w3schools.com/w3css/w3css_templates.asp">
						W3.CSS
					</a>
				</p>
				<p>
					<a href="admin/" id="adminlink" style="color:#a9a9a9;text-decoration:none;">
						Administrator Page
					</a>
				</p>
			</div>
		</div>
	</h5>
</footer>

</body>
</html>									