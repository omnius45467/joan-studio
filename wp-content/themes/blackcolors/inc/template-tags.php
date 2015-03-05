<?php

/**
* Collect user saved data
* and print the top color boxes
*/
function blackcolors_colorboxes(){

    $opcion = get_theme_mod("blackcolors_color_boxes");
    if($opcion != ''){
        echo '<div id="barra-superior">';
    
        $url = array();
        $url[0] = get_theme_mod("blackcolors_box1_url");
        $url[1] = get_theme_mod("blackcolors_box2_url");
        $url[2] = get_theme_mod("blackcolors_box3_url");
        $url[3] = get_theme_mod("blackcolors_box4_url");
        $url[4] = get_theme_mod("blackcolors_box5_url");
    
        $text = array();
        $text[0] = get_theme_mod("blackcolors_box1_text");
        $text[1] = get_theme_mod("blackcolors_box2_text");
        $text[2] = get_theme_mod("blackcolors_box3_text");
        $text[3] = get_theme_mod("blackcolors_box4_text");
        $text[4] = get_theme_mod("blackcolors_box5_text");
    
        $icon = array();
        $icon[0] = get_theme_mod("blackcolors_box1_icon");
        $icon[1] = get_theme_mod("blackcolors_box2_icon");
        $icon[2] = get_theme_mod("blackcolors_box3_icon");
        $icon[3] = get_theme_mod("blackcolors_box4_icon");
        $icon[4] = get_theme_mod("blackcolors_box5_icon");
    
        $icons_default = array("fa-home", "fa-envelope", "fa-user", "fa-camera", "fa-weixin");
        $color = array("#f1c40f", "#e67e22", "#e74c3c", "#3498db", "#9b59b6");
        for($i = 0; $i <=4; $i++): ?>
            <?php // Using that instead of the default option in get_theme_mod() to ensure compatibility with previous versions of the theme
            if(empty($icon[$i])){
                $icon[$i] = $icons_default[$i];
            } ?>
            <div class="caja-superior" style="background-color: <?php echo $color[$i]; ?>;">
                <div class="caja-centrado">
                <a class="enlacesuperior" href="<?php if(!empty($url[$i])){ echo esc_url($url[$i]);} ?>">
                <i class="fa <?php echo esc_attr($icon[$i]); ?>"></i>
                <div class="caja-centrado-texto"><?php if(!empty($text[$i])){ echo ent2ncr($text[$i]); } ?></div>
                </a>
                </div>
            </div>
        <?php endfor; 
        echo '</div>';
    }
}

/**
* Collect and Print the saved social icons
* saved by the user with the Customizer
*/
function blackcolors_social_icons(){
    $_social_services = array('fa-twitter' => 'Twitter',
                                    'fa-facebook' => 'Facebook',
                                    'fa-google-plus' => 'Google+',
                                    'fa-behance' => 'Behance',
                                    'fa-codepen' => 'Codepen',
                                    'fa-github' => 'GitHub',
                                    'fa-linkedin' => 'LinkeIn',
                                    'fa-skype' => 'Skype',
                                    'fa-youtube' => 'YouTube',
                                    'fa-slack' => 'Slack',
                                    'fa-tumblr' => 'Tumblr',
                                    'fa-yelp' => 'Yelp',
                                    'fa-instagram' => 'Instagram',
                                    'fa-pinterest' => 'Pinterest',
                                    'fa-flickr' => 'Flickr',
                                    'fa-stack-exchange' => 'Stack Exchange');

    foreach($_social_services as $id => $valor){
        $icon = esc_url(get_theme_mod("blackcolors_$id"));
        if(isset($icon) and !empty($icon)){
            echo "<a href='$icon' class='social-icon-round'><i class='fa $id'></i></a>";
        }
    }
}


function blackcolors_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
    <!-- Post Footer -->
        <div class="post-mas entry-footer">
             <div class="post-mas-izq">
                  <?php previous_post_link("<div class='button-pag'><i class='fa fa-arrow-circle-left'></i> %link</div>"); ?>
             </div>
             <div class="post-mas-der">
                  <?php next_post_link("<div class='button-pag'>%link <i class='fa fa-arrow-circle-right'></i></div>"); ?>
             </div>
        </div>
	<?php
}


/**
* Collect and Print CSS styles
* saved by the user with the Customizer
*/
function blackcolors_my_estilos(){
    if(is_admin_bar_showing()){
      $top_superior = "28px";
    }else{
      $top_superior = "0";
    }

    /* User saved styles
    /* CSS styles for fixed bar are loaded directy in header.php, since fixed bar is not being showed in every page */
    $colortexto = esc_attr(get_theme_mod( 'blackcolors_texto_color', '#ffffff'));
    $colorlinks = esc_attr(get_theme_mod( 'blackcolors_links_color', '#e67e22'));
    $colorhover = esc_attr(get_theme_mod( 'blackcolors_links_hover', '#f1c40f'));
    $colorsocial = esc_attr(get_theme_mod( 'blackcolors_social_links', '#e67e22'));
    $custom_fonts = get_theme_mod('blackcolors_custom_fonts');
    if($custom_fonts != ''){
        $body_font = '';
    }else{
        $body_font = esc_html(get_theme_mod('blackcolors_body_fonts', 'Open Sans'));
        $body_font = explode(":", $body_font);
        $body_font = "font-family: $body_font[0] ;";
    }
    
    $fixedbaralign = esc_attr(get_theme_mod( 'blackcolors_fixed_bar', 'right'));
  
    echo "<style>
    body{
        color: $colortexto ;
        $body_font
    }
    #barra-lateral{
        color: $colortexto ;
        padding-top: $top_superior ;
        text-align: $fixedbaralign ;
    }
    #barra-superior{
      top: $top_superior ; 
    }
    a, a:link, a:visited{
        color: $colorlinks ;
        text-decoration:none;
    }
    a:hover{
        color: $colorhover ;
    }
    #social-icons a, #social-icons a:visited{
        color: $colorsocial;
      }
    </style>";
}
add_action('wp_head', 'blackcolors_my_estilos');

function blackcolors_footer(){ 
?>
        <div id="creadopor">
            <?php printf( __( '%1$s for %2$s.', 'blackcolors' ), '<a href="http://antsanchez.com/blackcolors-wordpress-theme">Blackcolors</a>', '<a href="http://wordpress.org/">WordPress</a>' ); ?>
        </div>
<?php
}
?>