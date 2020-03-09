$(document).ready(function () {
	    $.history.init(pageload);	
		$('a[href=' + window.location.hash + ']').addClass('selected');
		$('a[rel=ajax]').click(function () {
			var hash = this.href;
			hash = hash.replace(/^.*#/, '');
	 		$.history.load(hash);	
	 		$('a[rel=ajax]').removeClass('selected');
	 		$(this).addClass('selected');
	 		$('#body').hide();
			getPage();
			return false;
		});	
	});
	function pageload(hash) {
		if (hash) getPage();    
	}
	function getPage() {
		var data = 'page=' + encodeURIComponent(document.location.hash);
		$.ajax({
			url: "loader.php",	
			type: "GET",		
			data: data,		
			cache: false,
			success: function (html) {	
				$('#content').html(html);
				$('#body').fadeIn('slow');
			}		
		});
	}