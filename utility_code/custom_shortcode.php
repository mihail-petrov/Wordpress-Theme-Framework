<?php

// Simple 
function foobar_func( $atts ){
    return "foo and bar";
}
add_shortcode( 'foobar', 'foobar_func' );


// With parameters
// [bartag foo="foo-value"]
function bartag_func( $atts ) {
    extract( shortcode_atts( array(
        'foo' => '',
        'bar' => '',
    ), $atts ) );

    return "<h1>{$foo}</h1>";
}
add_shortcode( 'bartag', 'bartag_func' );



// With content enclosed between tags
// [caption]My Caption[/caption]
function caption_shortcode( $atts, $content = null ) {
    return '<span class="caption">' . do_shortcode($content) . '</span>';
}
add_shortcode( 'caption', 'caption_shortcode' );