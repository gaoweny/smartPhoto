<!DOCTYPE html>
<html>
   <?php
   	 $url=$_GET['url'];
	 echo $url;
   	?>
	<head>
		<meta name="viewport" content="width=device,initial-scale=1.0" />
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/pagestyle.css" />
		<link rel="stylesheet" href="css/jquery.mobile-1.4.4.min.css">
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/jquery.mobile-1.4.5.min.js"></script>
		<script src="js/jquery.fullscreenslides.js"></script>
		<link rel="stylesheet" type="text/css" href="css/fullscreenstyle.css" />
		<title></title>
	</head>
	<script type="text/javascript">
		$(function() {
			$('img').fullscreenslides();
			var $container = $('#fullscreenSlideshowContainer');
			$container.bind("init", function() {
				$container
					.append('<div class="ui" id="fs-close">&times;</div>')
					.append('<div class="ui" id="fs-loader">Loading...</div>')
					;
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

		});
	</script>
	<script>
		function myReload() {
				
				var i=800;
				var refresh = setTimeout(function() {
					window.location.reload();
					
				}, i);	
			
			
		}
	</script>

	<body class="keBody" onUnload="opener.location.reload()">
		<div data-role="page" id="pageone">
			<div data-role="header" data-position="fixed">
				<h4>相片详情</h4>
			</div>
			<div data-role="content">
				<div class="wrapper">
					<div class="image">
						<a rel="gallery"  href="<?php echo $url;?>"><img src="<?php echo $url;?>"></a>
						<div class="caption">纽约的夜晚,HDR<br> 来自：保罗Barcellos Jr</div>
					</div>
				</div>
				<a href="#delete" data-role="button">删除图片</a>
				<a href="index.php" data-role="button" data-rel="back" onclick="myReload()">返回</a>
			</div>
			<div data-role="footer" data-position="fixed">
				<h4></h4>
			</div>
		</div>

		<div data-role="dialog" id="delete">
			<div data-role="header">
				<h1>相片删除</h1>
			</div>

			<div data-role="content">
				<p>确认删除图片？</p>
				<a href="#pageone"  data-role="button" data-icon="delete" data-inline="true" onclick="myReload()">否</a>
				<a href="delete.php?url=<?php echo $url;?>" data-role="button" data-icon="check"data-inline="true" onclick="myReload()">是</a>
			</div>

			<div data-role="footer">
				<h1></h1>
			</div>
		</div>

	</body>

</html>