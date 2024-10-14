<?php
class Tailwind_Nav_Walker extends Walker_Nav_Menu {
    // Start Level - Adds dropdown classes
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="absolute hidden group-hover:block bg-gray-800 text-white py-4 px-4 shadow-lg z-10">';
    }

    // Start Element - Adds Tailwind styling to menu items
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add Tailwind classes to the <li> and <a> elements
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . ' text-white hover:text-gray-400 ' . ($depth === 0 ? 'group relative' : '') . '"';

        $output .= '<li' . $class_names .'>';

        // Add link attributes and Tailwind classes
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' class="flex items-center py-2 px-4 hover:bg-gray-600">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Level - Closes the dropdown container
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }

    // End Element - Closes each menu item
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}
?>
