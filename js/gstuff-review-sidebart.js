jQuery(document).ready(function() {
	if (jQuery('#sidebar').length){
		console.log('there is a sidebar');
		var $referent = jQuery(window),
			$masterContent = jQuery('.review_wrap'),
			$slaveContent = jQuery('#sidebar .review_wrap'),
			$content = jQuery('#sidebar'),
			iInitialContentTop = $content.offset().top,
			iTopFixed = "60px",
			iLeftOrigin = '';
	
		if($masterContent.length){
			var getOriginalStyle = function(content){
				iLeftOrigin = content.offset().left;
				iWidthOrigin = content.width();
			}
	
			var isEnoughtHeight = function(content) {
				var bEnoughtHeight = '';

				if ( $referent.height() > content.height() ) {
					bEnoughtHeight = true;
				} else {
					bEnoughtHeight = false;
				}
				return bEnoughtHeight;
			}

			var isTopVisible = function(referent,content,init) {
				var referentTop = referent.scrollTop(),
					contentTop = content.offset().top;

				if( referentTop < init ){
					changePosition(content,'reset');
				} else {
					changePosition(content);
				}
			}

			var changePosition = function(content,option){
				if ( option == 'reset') {
				  content.css({"position":"","left":"","top":"","width":""});
				} else {
					content.css({"position":"fixed","left":iLeftOrigin,"width":iWidthOrigin,"top":iTopFixed});
				}
			}

			var initSidebarPostion = function(){
				if (isEnoughtHeight($content) === true){
					$referent.on("scroll", function() {
						isTopVisible($referent,$content,iInitialContentTop);
					});
				}
			}

			var hideDuplicateContent = function(master,slave){
				$referent.on("scroll", function() {
					var masterTop = master.offset().top,
						masterHeight = master.height(),
						referentTop = $referent.scrollTop(),
						referentHeight = $referent.height();

					if (masterTop <= (referentTop + (referentHeight / 2)) && referentTop < (masterTop + (masterHeight / 3))){
						// slave.parent().hide(1000)
					} else {
						// slave.parent().show(1000)
					}
				});
			}

			getOriginalStyle($content);
			initSidebarPostion();
			hideDuplicateContent($masterContent, $slaveContent);

			jQuery(window).resize(function() {
				getOriginalStyle($content);
				initSidebarPostion();
			});
		}
	};

	// ISOTOPE
	/*
	if (jQuery('#test-post-list').length){
		jQuery('#test-post-list').isotope({
			itemSelector: '.test-list',
			layoutMode: 'fitRows'
		});
		jQuery('.filter-button-group').on('click', 'button', function() {
			var filterValue = jQuery(this).attr('data-filter');
			jQuery('#test-post-list').isotope({
				filter: filterValue
			});
		});
	};
	*/

	// Inject Ancor to review conclusion

	if(jQuery('#review-bilan').length){
		jQuery('<p><a class="go-to-bilan" href="#review-bilan">La lecture c’est pas mon truc, je veux aller directement à la conclusion !</a></p>').insertBefore('.post-content');
	};

});