<?php
/**
 * Kasseria Nav Walker
 * Adapte le menu WordPress natif au markup du thème.
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;

class Kasseria_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "\n" . str_repeat("\t",$depth) . '<ul class="nav-dropdown depth-' . $depth . '">'."\n";
    }
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= str_repeat("\t",$depth) . "</ul>\n";
    }
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $id = 0 ) {
        $item = $data_object;
        $classes = empty($item->classes) ? [] : (array)$item->classes;
        $classes[] = 'nav-item';
        if ( $args->walker->has_children ) $classes[] = 'nav-item--has-children';
        $class_names = implode(' ', array_filter(array_map('trim',$classes)));
        $output .= str_repeat("\t",$depth) . '<li class="' . esc_attr($class_names) . '">';
        $atts = [];
        $atts['href']         = !empty($item->url)        ? $item->url        : '#';
        $atts['target']       = !empty($item->target)     ? $item->target     : '';
        $atts['rel']          = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['title']        = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['aria-current'] = $item->current            ? 'page'            : '';
        $atts['class']        = in_array('nav-cta',$classes) ? 'nav-cta' : ('nav-link' . ($depth > 0 ? ' nav-sublink' : ''));
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if ('' !== $value) {
                $value = 'href' === $attr ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $output .= '<a' . $attributes . '>' . apply_filters('the_title',$item->title,$item->ID) . '</a>';
    }
    public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
