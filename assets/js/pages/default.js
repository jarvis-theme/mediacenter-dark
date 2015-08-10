define(['jquery','echo','wow','bootstrap','bootstrap_dropdown','browser_selector','html5shiv','jquery_migrate','jquery_select','jquery_easing','jquery_validate','respond'], function($,echo)
{
	return new function()
	{
		var self = this;
		self.run = function()
		{
			$(document).ready(function () {
				new WOW().init();

				$('.top-drop-menu').change(function() {
					var loc = ($(this).find('option:selected').val());
					window.location = loc;
				});

				echo.init({
					offset: 100,
					throttle: 250,
					unload: false
				});
			});

			if($('.le-select').length > 0){
	            $('.le-select select').customSelect({customClass:'le-select-in'});
	        }

			// Scroll to Top
			$(".totop").hide();
			$(window).scroll(function(){
				if ($(this).scrollTop()>300){
					$('.totop').slideDown();
				} else{
					$('.totop').slideUp();
				}
			});
			$('.totop a').click(function (e) {
				e.preventDefault();
				$('body,html').animate({scrollTop: 0}, 500);
			});

			showOption();
		};

		var showOption = function(){
			$('#show').change(function(){
				id=this.value;		
				link = $(this).attr('data-rel');
				arr = new Array();
				data = getQueryVariable();
				qry = '';
				if(data['page']!=undefined){
					qry = qry+'?page='+data['page'];
				}
				if(data['show']!=undefined){
					if(qry==''){
						qry = qry+'?show='+id;
					}				
					else{
						qry = qry+'&show='+id;
					}
						
				}else{
					if(qry==''){
						qry = qry+'?show='+id;
					}
					else{
						qry = qry+'&show='+id;
					}

				}
				if(data['view']!=undefined){
					if(qry==''){
						qry = qry+'?view='+data['view'];
					}
					else{
						qry = qry+'&view='+data['view'];
					}
				}
				window.location = link+qry;
			});
		};
		var getQueryVariable = function() {
		    var query = window.location.search.substring(1);
		    var vars = query.split('&');
		    var rs = new Array();
		    for (var i = 0; i < vars.length; i++) {
		        var pair = vars[i].split('=');
		        rs[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
		    }
		    return rs;
		};
	};
});