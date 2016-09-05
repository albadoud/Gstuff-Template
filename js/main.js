jQuery(document).ready(function() {
    // Init fitVids js on article
    $('.article').fitVids(); 

    // Add Go To Bilan Content
    if($('#review-bilan').length){
        $('<div><a class="go-to-bilan" href="#review-bilan">La lecture c’est pas mon truc, je veux aller directement à la conclusion !</a></div>').insertBefore('.post-content');
    };

    // Fix review box on scroll
    if (jQuery('#sidebar').length){
        var $referent           = jQuery(window),
            $masterContent      = jQuery('.review_wrap'),
            $slaveContent       = jQuery('#sidebar .review_wrap'),
            $content            = jQuery('#sidebar'),
            iInitialContentTop  = $content.offset().top,
            iTopFixed           = "30px",
            iLeftOrigin         = '';
    
        if($masterContent.length){
            var getOriginalStyle = function(content){
                iLeftOrigin = content.offset().left - 20;
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
                    content.css({"position":"","left":"","top":"","width":"","z-index":""});
                } else {
                    content.css({"position":"fixed","left":iLeftOrigin,"width":iWidthOrigin,"top":iTopFixed,"z-index":"500"});
                }
            }

            var initSidebarPostion = function(){
                if (isEnoughtHeight($content) === true){
                    getOriginalStyle($content);
                    isTopVisible($referent,$content,iInitialContentTop);
                }
            }

            $referent.on("scroll", function() {
                getOriginalStyle($content);
                isTopVisible($referent,$content,iInitialContentTop);
            });

            initSidebarPostion();
        }
    };

    var $grid = $('.post-list').isotope({
        itemSelector: '.review'
    });

    // store filter for each group
    var filters = {};

    $('.filters').on( 'click', '.button', function() {
        var $this = $(this);
        // get group key
        var $buttonGroup = $this.parents('.button-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[ filterGroup ] = $this.attr('data-filter');
        // combine filters
        var filterValue = concatValues( filters );
        // set filter for Isotope
        $grid.isotope({ filter: filterValue });
    });

    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
        });
    });
      
    // flatten object by concatting values
    function concatValues( obj ) {
        var value = '';
        for ( var prop in obj ) {
            value += obj[ prop ];
        }
        return value;
    }
});
