$(function(){
	var $container = $('.pic-content');
	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : '.pic-contentleft',
			gutterWidth : 20,
			isAnimated: true,
		});
	});
});

