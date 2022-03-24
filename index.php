<?php
		$communityUrl = 'http://localhost/forum/api/index.php?';
		$apiKey = 'caffe3410e89c8de39f4e0aaa80979a9';
		$curl = curl_init( $communityUrl . '/forums/topics&sortBy=date&sortDir=desc' );
		curl_setopt_array( $curl, array(
			CURLOPT_RETURNTRANSFER	=> TRUE,
			CURLOPT_HTTPAUTH	=> CURLAUTH_BASIC,
			CURLOPT_USERPWD		=> "{$apiKey}:"
		) );
		$response = curl_exec( $curl );
		$data = json_decode($response, true);
?>

<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
		<script src="https://kit.fontawesome.com/d1095648ca.js"></script>
</head>

<body>
	<nav class="nav-bar">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="top-menu top-left">
						<ul>
							<li><a href="#">About</a></li>
							<li><a href="http://fluxious-rsps.com/play/">Download</a></li>
							<li><a href="">Discord</a></li>
						</ul>
					</div>
				</div>
				<div class="col-6">
					<div class="top-menu top-right">
						<ul>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="middle-content">
		<div class="top-nav">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<nav class="hamburger">
						  <button id="hamb">
						      <div id="rect1" class="showRect"></div> 
						      <div id="rect2" class="showRect"></div> 
						      <div id="rect3" class="showRect"></div> 
						  </button>
						  <div id="slideDown" class="hidden">
						    <ul>
							 	<li><a href="#">About</a></li>
								<li><a href="http://fluxious-rsps.com/play/">Download</a></li>
								<li><a href="#">Discord</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Login</a></li>
								<li><a href="#">Register</a></li>
								<li><img src="images/divide.png"/></li>
								<li><a href="http://fluxious-rsps.com/">Home</a></li>
								<li><a href="http://fluxious-rsps.com/community/">Forums</a></li>
								<li><a href="http://fluxious-rsps.com/hiscores/">Hiscores</a></li>
								<li><a href="http://fluxious-rsps.com/store/">Store</a></li>
								<li><a href="http://fluxious-rsps.com/vote/">Vote</a></li>
						    </ul>

				

						  </div>
						</nav>
						<div class="top-nav-menu">
							<ul>
								<li><a href="http://fluxious-rsps.com/">Home</a></li>
								<li><a href="http://fluxious-rsps.com/community/">Forums</a></li>
								<li><a href="http://fluxious-rsps.com/hiscores/">Hiscores</a></li>
								<li><a href="http://fluxious-rsps.com/store/">Store</a></li>
								<li><a href="http://fluxious-rsps.com/vote/">Vote</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="logo-wrapper">
			<div class="container">
				<div class="col-12">
					<div class="server-logo">
						<a href="#">
							<img class="logo" src="https://media.discordapp.net/attachments/872059253005885470/872131492619378728/Logo-trimmed.png" alt="Ares">
						</a>
					</div>
				</div>
			</div>
			<div class="background-component">
				 <video playsinline muted autoplay loop>
					<source src="images/splash.mp4" type="video/mp4">
				</video> 
			</div>
		</div>
	</div>

<div class="adventure">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
				<div class="start-adventure">
					<h1>Start your adventure!</h1>
					<p>
						Alunity is a full economy server, focusing on every aspect of the game. We are striving not to be another RSPS, but be a server with custom content and ideas to make your stay worthwhile.
					</p>
					<a href="http://fluxious-rsps.com/play/">
					<img src="images/play.png">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="news-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="latest-news">
					<h1>Latest News</h1>
					<a href="http://fluxious-rsps.com/community/index.php?/forum/2-news-and-announcements/">Read more on forums</a>
				</div>
				<?php
					$count = 0;
					foreach($data as $item)
					{
						if (is_array($item)) {
						 	foreach($item as $item2) if($item2['forum']['id'] == 4 || $item2['forum']['id'] == 2) {

						 		$content = $item2['firstPost']['content'];
						 		if (strlen($content) > 1550) {
						 			$content = substr($content, 0, 1550) . '...';
						 		}
						 	    if($count > 2)
						 	        continue;
						 		$postDate = date( "d-m-Y, H:i", strtotime($item2['firstPost']['date']));
						 		echo '<div class="latest-news-box">';
						 		echo '<div class="latest-news-head"><h1>'.$item2['title'].'</h1>';
						 		echo  '<div class="news-tag"><span>'.$postDate.' by <a class="author" href="'.$item2['firstPost']['author']['profileUrl'].'">'.ucfirst($item2['firstPost']['author']['formattedName']).'</span></a></div>
								<hr class="divide">
						 		</div>';
						 		echo '<div class="news-content">'.$content;
						 		echo '<div class="read"><a class="r-o-f" href="'.$item2['url'].'">Read on forums</a></div>';
						 		echo '</div>';
						 		echo '</div>';
						 		$count++;
						 	}
					 	}
					}
				?>
			</div>


			<div class="col-12 col-lg-4">
				<div class="latest-news right-news">
					<h1>Server Statics</h1>
				</div>
					<div class="server-stats">
						<span>SERVER IS</span>
						<h2>ONLINE</h2>
								<hr class="divide">
						<div class="server-info">
							<li>Players Online: 301</li>
							<li>Staff Online: 2</li>
						</div>
								<hr style="width: 50%;" class="divide">						
								<span style="font-size: 14px; font-style: italic;">Server uptime: 10 hours 23 minutes</span>
					</div>

									<div class="latest-news right-news">
					<h1>Featured Store items</h1>
				</div>
					<div class="shop-items">

						<div class="item-wrap">						
							<div class="featured-item">
								<div class="row">
									<div class="col-9">
										<div class="item-details">
												<img src="https://oldschool.runescape.wiki/images/2/25/Rune_scimitar_detail.png" class="item-img">
											<h2><a href="#">RUNE SCIMITAR</a></h2>
											<h3 class="sale">-50% OFF!</h3>
										</div>
									</div>
									<div class="col-3">
										<div class="amount-creds">
											<p class="amount">999</p>
											<span>Credits</span>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
			</div>


		</div>
	</div>
</div>

<footer class="footer-wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-menu footer-menu text-center">
                    <ul>
                        <li><a href="/index.php">Home</a></li>
                        <li><a href="/forum/">Forums</a></li>
                        <li><a href="/hiscores/">Hiscores</a></li>
                        <li><a href="/store/">Store</a></li>
                        <li><a href="/vote/">Vote</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            								<hr class="divide">
                <div class="copyright-text pt-5 text-center">
                    ©2021 Alunity. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="function.js">
</script>
