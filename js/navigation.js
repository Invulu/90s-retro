/**
* navigation.js
* Licensed under the GPLv2 license.
* Handles toggling the navigation menu for small screens.
*/
( function() {
	var container = document.getElementById( 'navigation' ),
		button = container.getElementsByClassName( 'menu-toggle' )[0],
		menu = container.getElementsByTagName( 'ul' )[0];
		holder = container.getElementsByTagName( 'div' )[0];

	if ( undefined == button || undefined == menu )
		return false;

	button.onclick = function() {
		if ( -1 == menu.className.indexOf( 'mobile-menu' ) )
		menu.className = 'menu';

		if ( -1 != button.className.indexOf( 'toggled-on' ) ) {
			holder.className += ' sf-js-enabled';
			button.className = button.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( ' toggled-on', '' );
			menu.className = menu.className.replace( 'mobile-menu', 'menu' );
			holder.className = holder.className.replace( 'mobile-menu', 'menu' );
			container.className = container.className.replace( 'main-small-navigation', 'navigation-main' );
		} else {
			button.className += ' toggled-on';
			menu.className += ' toggled-on';
			menu.className = menu.className.replace( 'menu', 'mobile-menu' );
			holder.className = holder.className.replace( 'menu', 'mobile-menu' );
			holder.className = holder.className.replace( 'sf-js-enabled', '' );
			container.className = container.className.replace( 'navigation-main', 'main-small-navigation' );
		}
	};

	// Hide menu toggle button if menu is empty.
	if ( ! menu.childNodes.length )
		button.style.display = 'none';
} )();