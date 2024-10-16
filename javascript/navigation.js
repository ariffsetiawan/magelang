/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[0];
	const menu = siteNavigation.getElementsByTagName( 'ul' )[0];

	// Return early if the button or menu is not found
	if ( typeof button === 'undefined' || typeof menu === 'undefined' ) {
		return;
	}

	// Hide menu by default and add necessary classes
	menu.classList.add( 'hidden' );
	button.setAttribute( 'aria-expanded', 'false' );

	const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuClose = document.getElementById('menu-close');

    // Open menu
    menuToggle.addEventListener('click', function () {
		// Toggle the hidden class on the menu
		mobileMenu.classList.toggle('hidden');

		const isExpanded = button.getAttribute( 'aria-expanded' ) === 'true' || false;
		button.setAttribute( 'aria-expanded', ! isExpanded );

        mobileMenu.classList.remove('-translate-x-full');
        mobileMenu.classList.add('translate-x-0');
    });

    // Close menu
    menuClose.addEventListener('click', function () {
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('-translate-x-full');
    });

    // Close menu when clicking outside (optional)
    document.addEventListener('click', function (e) {
        if (!mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');
        }
    });

	// Handle submenu dropdowns for both desktop hover and mobile/touch toggle
	const subMenus = menu.querySelectorAll( '.menu-item-has-children > ul' );
	subMenus.forEach( function( subMenu ) {
		// Initially hide all sub-menus
		subMenu.classList.add( 'hidden' );

		const parentMenuItem = subMenu.parentNode;
		// const toggleButton = document.createElement( 'button' );
		// toggleButton.setAttribute( 'aria-expanded', 'false' );
		// toggleButton.classList.add( 'submenu-toggle', 'ml-2', 'text-white', 'focus:outline-none' );

		// Icon or label for submenu toggle
		// toggleButton.innerHTML = '<span class="icon">+</span>';

		// parentMenuItem.insertBefore( toggleButton, subMenu );

		// Toggle the sub-menu on click or touch
		toggleButton.addEventListener( 'click', function( event ) {
			const isExpanded = toggleButton.getAttribute( 'aria-expanded' ) === 'true' || false;
			toggleButton.setAttribute( 'aria-expanded', ! isExpanded );

			// Toggle the hidden class on the submenu
			subMenu.classList.toggle( 'hidden' );

			// Change the toggle icon (+ or -)
			// toggleButton.querySelector( '.icon' ).textContent = isExpanded ? '+' : '-';
		} );

		// Handle touch event for parent menu items (open dropdown on first touch)
		parentMenuItem.addEventListener( 'touchstart', function( event ) {
			if ( ! parentMenuItem.classList.contains( 'hovered' ) ) {
				event.preventDefault(); // Prevent default touch behavior
				parentMenuItem.classList.add( 'hovered' ); // Add a class to detect the first tap
			} else {
				// On second tap, let the link be followed
				parentMenuItem.classList.remove( 'hovered' );
			}
		} );
	} );

	// Handle hover for desktop dropdowns (lg and above)
	if ( window.innerWidth >= 1024 ) { // Tailwind's lg breakpoint and up
		const parentItems = menu.querySelectorAll( '.menu-item-has-children' );

		parentItems.forEach( function( parentItem ) {
			parentItem.addEventListener( 'mouseenter', function() {
				const subMenu = parentItem.querySelector( 'ul' );
				if ( subMenu ) {
					subMenu.classList.remove( 'hidden' );
				}
			} );

			parentItem.addEventListener( 'mouseleave', function() {
				const subMenu = parentItem.querySelector( 'ul' );
				if ( subMenu ) {
					subMenu.classList.add( 'hidden' );
				}
			} );
		} );
	}
} )();
