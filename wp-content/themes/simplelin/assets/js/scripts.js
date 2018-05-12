(function($) {

	$(document).ready(function() {

		// Header search box
		$('.header-search-form').hide();
		$('a#header-search-btn').click(function() {
			$('.header-search-form').slideToggle(500);
			return false;
		});

		// Move cursor to search field when Search button is clicked
		$('#header-search-btn').click(function() {
			$('.header-search-form .search-field').focus();
		});

		$('#close-search').click(function(e) {
			e.preventDefault();
			$('.header-search-form').slideToggle(500);
		});

		$('a.menu-toggle').click(function() {
			$('#primary-menu').slideToggle(500);
		});

	});



	/* Giving credit where it is due: thanks to Array for these sub-menu snippets */
	// Toggle sidebar sub menus
	$( ".menu" ).find( "li.menu-item-has-children, li.page_item_has_children" ).click( function(){
		$( ".menu li" ).not( this ).find( "ul" ).next().slideUp( 100 );
		$( this ).find( "> ul" ).stop( true, true ).slideToggle( 100 );
		$( this ).toggleClass( "active-sub-menu" );
		return false;
	});

	// Don't fire sub menu toggle if a user is trying to click the link
	$( ".menu-item-has-children a, .page_item_has_children a" ).click( function(e) {
		e.stopPropagation();
		return true;
	});


})(jQuery); //End of ( function( $ ) {
