var dirTema = document.getElementsByTagName('link')[1].getAttribute('href');

require.config({
	baseUrl: '/',
    urlArgs: "v=002",
	waitSeconds: 150,
	shim: {
		"bootstrap"	: {
			deps: ['jquery'],
		},
		"bootstrap_dropdown" : {
			deps: ['jquery'],
		},
		"bootstrap_slider"	: {
			deps: ['jquery'],
		},
		"cart" : {
			deps : ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"browser_selector" : {
			deps : ['jquery'],
		},
		'carousel' : {
			deps : ['jquery']
		},
		"echo" : {
			deps : ['jquery'],
		},
		"gmap3" : {
			deps : ['jquery'],
		},
		"html5shiv" : {
			deps : ['jquery'],
		},
		"jquery_migrate" : {
			deps : ['jquery'],
		},
		"jquery_select" : {
			deps : ['jquery'],
		},
		"jquery_easing" : {
			deps : ['jquery'],
		},
		"pretty_photo" : {
			deps : ['jquery'],
		},
		"jquery_raty" : {
			deps : ['jquery'],
		},
		"jquery_validate" : {
			deps : ['jquery'],
		},
		"respond" : {
			deps : ['jquery'],
		},
		"wow" : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		jquery 				: ['//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min',dirTema+'assets/js/libs/jquery-1.10.2.min'],
		bootstrap			: ['//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min',dirTema+'assets/js/libs/bootstrap.min'],
		bootstrap_dropdown	: dirTema+'assets/js/libs/bootstrap-hover-dropdown.min',
		bootstrap_slider	: dirTema+'assets/js/libs/bootstrap-slider.min',
		cart				: 'js/shop_cart',
		jq_ui				: 'js/jquery-ui',
		noty				: 'js/jquery.noty',
		browser_selector	: dirTema+'assets/js/libs/css_browser_selector.min',
		carousel			: dirTema+'assets/js/libs/owl.carousel.min',
		echo				: dirTema+'assets/js/libs/echo.min',
		gmap3				: dirTema+'assets/js/libs/gmap3.min',
		html5shiv			: dirTema+'assets/js/libs/html5shiv',
		jquery_migrate		: dirTema+'assets/js/libs/jquery-migrate-1.2.1',
		jquery_select		: dirTema+'assets/js/libs/jquery.customSelect.min',
		jquery_easing		: dirTema+'assets/js/libs/jquery.easing-1.3.min',
		pretty_photo		: dirTema+'assets/js/libs/jquery.prettyPhoto.min',
		jquery_raty			: dirTema+'assets/js/libs/jquery.raty.min',
		jquery_validate		: dirTema+'assets/js/libs/jquery.validate',
		respond				: dirTema+'assets/js/libs/respond.min',
		wow					: dirTema+'assets/js/libs/wow.min',

		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		category        : dirTema+'assets/js/pages/category',
		home            : dirTema+'assets/js/pages/home',
		main            : dirTema+'assets/js/pages/default',
		member          : dirTema+'assets/js/pages/member',
		produk          : dirTema+'assets/js/pages/produk',
	}
});

require([
	'router',
	'cart',
	'main',
], function(router,cart,main)
{
	// HOME
	router.define('/','home@run');
	router.define('home', 'home@run');

	// PRODUK
	router.define('produk/*', 'produk@run');

	router.run();
	main.run();
	cart.run();
});