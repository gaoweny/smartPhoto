<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device,initial-scale=1.0" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/jquery.mobile-1.4.4.min.css">
		<script src="js/jquery-2.1.1.min.js"></script>

		<script src="js/jquery.mobile-1.4.5.min.js"></script>
		<script src="js/jquery.fullscreenslides.js"></script>
		<link rel="stylesheet" href="css/pagestyle.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/fullscreenstyle.css" />
	</head>
	<script type="text/javascript">
		$(function() {
			$('img').fullscreenslides();
			var $container = $('#fullscreenSlideshowContainer');
			$container.bind("init", function() {
				$container
					.append('<div class="ui" id="fs-close">&times;</div>')
					.append('<div class="ui" id="fs-loader">Loading...</div>')
					.append('<div class="ui" id="fs-prev">&lt;</div>')
					.append('<div class="ui" id="fs-next">&gt;</div>');
				$('#fs-prev').click(function() {
					$container.trigger("prevSlide");

				});

				$('#fs-next').click(function() {
					$container.trigger("nextSlide");

				});

				$('#fs-close').click(function() {
					$container.trigger("close");
				});

			})

			.bind("startLoading", function() {
				$('#fs-loader').show();
			})

			.bind("stopLoading", function() {
				$('#fs-loader').hide();
			})

			.bind("startOfSlide", function(event, slide) {

				$('#fs-caption span').text(slide.title);
				$('#fs-caption').show();
			})

			.bind("endOfSlide", function(event, slide) {
				$('#fs-caption').hide();
			});

			$("body").on("click", function() {

				var $this = $(event.target);
				$("#fs-next").fadeToggle(500);
				$("#fs-prev").fadeToggle(500);
				$("#fs-close").fadeToggle(500);
			});
			var mytime = setInterval(function() {
				$container.trigger("nextSlide");
			}, 10000);
		});
	</script>
	<script>
		function myWin() {
				
				var i=800;
				var refresh = setTimeout(function() {
					window.location.reload();
					
				}, i);	
			
			
		}

		//
		//		function myrefresh() {
		//			window.location.reload();
		//		}
		//		setTimeout('myrefresh()', 1000);
	</script>
	<?php
			require_once 'ConnectDb.php';
			$con = connect();
			if($con){
				mysql_select_db("imgdb",$con);
				mysql_query("set names 'utf-8'");
				
			}else{
				echo mysql_errno();
			}
		?>

		<body onload="myRefresh()">
			<div data-role="page">

				<div data-role="header" data-position="fixed">
					<h4>智能相册</h4>

					<div data-role="navbar">
						<ul>
							<li>
								<a href="index.php" data-icon="camera" onclick="myWin()">我的云相册</a>
							</li>
							<li>
								<a href="index2.php" data-icon="clock" class="ui-btn-active">幻灯片模式</a>
							</li>
						</ul>
					</div>

				</div>

				<div data-role="content">

					<ul data-role="listview">
						<li>
							<a rel="gallery" href="img/fhn.jpg">
								<img src="img/fhn1.png" />
								<h3>fire keeper</h3>
								<p>Data: 2017-4-19</p>
							</a>

						</li>
						<li>
							<a rel="gallery" href="img/111.jpg">
								<img src="img/112.png" />
								<h3>fire keeper</h3>
								<p>Data: 2017-4-19</p>
							</a>

						</li>
						<li>
							<a rel="gallery" href="img/b1.jpg">
								<img src="img/a1.jpg" />
								<h3>在英格兰科茨沃尔德,百老汇大厦</h3>
								<p>Data: 2017-4-19</p>
							</a>

						</li>
						<li>
							<a rel="gallery" href="img/b2.jpg">
								<img src="img/a2.jpg" />
								<h3>纽约的夜晚,HDR</h3>
								<p>Data: 2017-4-19</p>
							</a>

						</li>

						<?php
							$result = mysql_query("select * from image");
					
							while($arr = mysql_fetch_array($result)){
						?>
							<li>
								<a rel="gallery" href="http://115.159.89.252<?php echo $arr['url'] ?>">
									<img src="http://115.159.89.252<?php  echo $arr['url']; ?>" />
									<h3><?php echo $arr['name'] ?></h3>
									<p>Data: 2017-4-19</p>
								</a>

							</li>
							<?php
					}
				?>
					</ul>

				</div>

				<div data-role="footer" data-position="fixed">
					<h4>&nbsp;</h4>
				</div>
			</div>
		</body>

</html>