<?php 
/*agregamos fontawesome */
function add_fontawesome_kit() {
    wp_register_script( 'fa-kit', 'https://kit.fontawesome.com/4861f2b45b.js', array( 'jquery' ) , '5.9.0', true ); // -- From an External URL

// Javascript - Enqueue Scripts
    wp_enqueue_script( 'fa-kit' );
}

add_action( 'wp_enqueue_scripts', 'add_fontawesome_kit', 100 );
/*Extensiones scripts o styles*/
add_action("wp_enqueue_scripts", "dcms_insertar_google_fonts");

function dcms_insertar_google_fonts(){
    $url = "https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap";
    wp_enqueue_style('google_fonts', $url);
    $cadena=str_replace("storefront", "GamarraOnlinePlantilla", get_template_directory_uri() );
    if( is_front_page() ):
    wp_enqueue_style('owlslider', $cadena . '/css/owl.carousel.min.css', array(), '1.0.0');
    wp_enqueue_style('owlslidertheme', $cadena . '/css/owl.theme.default.min.css', array(), '1.0.0');
    wp_enqueue_script('owlsliderjs', $cadena . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    endif;
 }
/*funciones init de storefront */
//storefront_header_container_close
add_action('init','funciones_init');
function funciones_init(){
    remove_action('storefront_header','storefront_header_cart',60);
    remove_action('storefront_header','storefront_product_search',40);
    add_action('storefront_header','boton_carrito',40);
    add_action('storefront_before_content','menu_despegable',5);
    add_action('storefront_before_header','header_secundario_gamarraonline',10);
    remove_action('homepage','storefront_homepage_content',10);
    remove_action('homepage','storefront_product_categories',20);
    remove_action('homepage','storefront_popular_products',50);
    remove_action('homepage','storefront_on_sale_products',60);
    remove_action('homepage','storefront_featured_products',40);
    remove_action('homepage','storefront_recent_products',30);
    remove_action('homepage','storefront_best_selling_products',70);
    remove_action('storefront_footer','storefront_credit',20);
    add_action('storefront_footer','gamarraonline_nuevo_footer',20);
}

function gamarraonline_nuevo_footer(){
    echo '<div class="reservados">';
        echo '<p>';
            echo 'Derechos Reservados &copy; ' . get_bloginfo('name') . " " . get_the_date('Y') . '. Desarrollado por Sebastián Pajés';
        echo '</p>';
    echo '</div>';
}
function header_secundario_gamarraonline(){?>
<div class="site_navegacion_secundario">
    <div class="col-full">
        <ul class="navegacion_secundaria">
            <li>
                <a href="<?php the_field('link',85) ?>">Registrarse como vendedor</a>
            </li>
            <li>
                <a href="<?php the_field('link',54) ?>">Favoritos</a>
            </li>
            <li>
                <a href="">Noticias</a>
            </li>
            <li>
                <a href="">Tutoriales</a>
            </li>
            <li>
                <a href="<?php the_field('link',14) ?>">Vendedores</a>
            </li>
        </ul>
    </div>
</div>
    <?php
}
function menu_despegable(){
?>
<!-- inicio de categoria MUJERES -->
<div class="fondo_desplegable" id="desplegable_mujeres">
    <div class="padre_menu_desplegable_mujeres">
        <div class="sub_padre_mujeres_calzado">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/mujeres/calzados">
                <h4>Calzados</h4>    
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_calzados_mujeres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==23): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                        
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_mujeres_ropa">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/mujeres/ropa">
                <h4>Ropa</h4>
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_ropa_mujeres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==24): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_mujeres_otros">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/mujeres/mucho-mas">
                <h4>Mucho más</h4>
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_otros_hombres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==25): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="menu_imagen">
            <img src="<?php the_field('mujeres',2) ?>" alt="">
        </div>
    </div>
</div>
<!-- inicio de categoria HOMBRES -->
<div class="fondo_desplegable" id="desplegable_hombres">
    <div class="padre_menu_desplegable_hombres">
        <div class="sub_padre_hombres_calzado">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/hombres/calzados-hombres">
                <h4>Calzados</h4>    
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_calzados_hombres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==26): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_hombres_ropa">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/hombres/ropa-hombres">
                <h4>Ropa</h4>
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_ropa_hombres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==27): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_hombres_otros">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/hombres/mucho-mas-hombres">
                <h4>Mucho más</h4>
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_otros_hombres">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==59): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="menu_imagen">
        <img src="<?php the_field('hombres',2) ?>" alt="">

        </div>
    </div>
</div>
<!-- inicio de categoria Niños -->
<div class="fondo_desplegable" id="desplegable_niños">
    <div class="padre_menu_desplegable_niños">
        <div class="sub_padre_niños_calzado">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids/calzado-ninas">
                <h4>Calzados niñas</h4>
            </a>
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_calzados_niños">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==77): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_niños_ropa">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids/ropa-ninas">
                <h4>Ropa niñas</h4>
            </a>          
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_ropa_niños">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==78): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_niños_calzado">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids/calzado-ninos">
                <h4>Calzados niños</h4> 
            </a>               
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_calzados_niños">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==79): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_niños_ropa">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids/ropa-ninos">
                <h4>Ropa niños</h4>
            </a>           
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_ropa_niños">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==80): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_niños_otros">
            <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids/mucho-mas-kids">
                <h4>Mucho más</h4>
            </a>           
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_otros_niños">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==81): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="menu_imagen">
        <img src="<?php the_field('kids',2) ?>" alt="">

        </div>
    </div>
</div>
<!-- inicio de categoria categorias -->
<div class="fondo_desplegable" id="desplegable_categorias">
    <div class="padre_menu_desplegable_categorias">
        <div class="sub_padre_categorias_calzado">
            <a href="http://gamarraonline.local/categoria-producto/categorias">
                <h4>Categorías</h4>
            </a>     
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_calzados_categorias">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==15): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        <div class="sub_padre_categorias_ropa">
            <a href="http://gamarraonline.local/categoria-producto/mas">
                <h4>Más</h4>
            </a>           
            <?php $taxonomy = 'product_cat';
             // Get all terms of a taxonomy
            $args = array(
                'hide_empty' => false
            );
            $terms = get_terms($taxonomy, $args );
            if ( $terms && !is_wp_error( $terms ) ) :?>
                <ul class="contenido_desplegable_ropa_categorias">
                    <?php foreach ( $terms as $term ) { ?>  
                        <?php if($term->parent==124): ?>
                    <li>
                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                            <?php echo $term->name; ?>  
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php } ?>
                </ul>
            <?php endif;?> 
        </div>
        
        <div class="menu_imagen">
        <img src="<?php the_field('categorias',2) ?>" alt="">
        </div>
    </div>
</div>
<?php
}

function boton_carrito(){
    echo '<div class="boton_carrito">';
    echo '<a class="seccion_carrito" href="' . get_field('link',7) . '">';
    echo '<i class="fas fa-shopping-cart"></i>';
    echo 'Mi carrito';
    echo '</a>';
    echo '</div>';

}
add_filter('wp_nav_menu_items','dms_items_search',10,2);
function dms_items_search($items, $args){
    if($args->theme_location == 'secondary'){
        $items .= '<div class="site-search">
        <div class="widget woocommerce widget_product_search"><form role="search" method="get" class="woocommerce-product-search" action="http://gamarraonline.local/">
        <label class="screen-reader-text" for="woocommerce-product-search-field-0">Buscar por:</label>
        <input type="search" id="woocommerce-product-search-field-1" class="search-field" placeholder="Busca por ej. zapatillas nike negras para hombre" value="" name="s">
        <button type="submit" value="Buscar">Buscar</button>
        <input type="hidden" name="post_type" value="product">
        </form>
        </div>			</div>';
    }

    return $items;
}
add_filter( 'storefront_handheld_footer_bar_links', 'jk_add_home_link' );
function jk_add_home_link( $links ) {
	$new_links = array(
		'home' => array(
			'priority' => 10,
			'callback' => 'jk_home_link',
        ),
        'favoritos' => array(
			'priority' => 15,
			'callback' => 'jk_favoritos_link',
        ),
        
    );
    
    // echo '<pre>';
    // echo var_dump($links['search']['callback']);
    // echo '</pre>';
	$links = array_merge( $new_links, $links );
    
	return $links;
}

function jk_home_link() {
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home' ) . '</a>';
}
function jk_favoritos_link() {
	echo '<a href="' . get_field('link',54) . '">' . __( 'Favoritos' ) . '</a>';
}
/*codigo de jquery */
function GamarraOnline_jsgeneral(){
?>
    <script>
        $ = jQuery.noConflict();
        $(document).ready(function(){
            var pathname = window.location.pathname;
            if(pathname == '/'){
                $('.storefront-handheld-footer-bar a').removeClass('activo-footer-bar');
                $('.storefront-handheld-footer-bar .home a').addClass('activo-footer-bar');
            }
            if(pathname == '/mi-cuenta/'){
                $('.storefront-handheld-footer-bar a').removeClass('activo-footer-bar');
                $('.storefront-handheld-footer-bar .my-account a').addClass('activo-footer-bar');
            }
            if(pathname == '/wishlist/'){
                $('.storefront-handheld-footer-bar a').removeClass('activo-footer-bar');
                $('.storefront-handheld-footer-bar .favoritos a').addClass('activo-footer-bar');
            }
            if(pathname == '/carrito/'){
                $('.storefront-handheld-footer-bar .cart').addClass('activo-footer-bar');
            }
           
            $(document).on("click",function(e) {
                    
                var container = $("#desplegable_mujeres");
                var container2 = $("#menu-item-70");
                var container3 = $("#desplegable_hombres");
                var container4 = $("#menu-item-71");
                var container5 = $("#desplegable_niños");
                var container6 = $("#menu-item-72");
                var container7 = $("#desplegable_categorias");
                var container8 = $("#menu-item-75");
                if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0 && !container3.is(e.target) && container3.has(e.target).length === 0 && !container4.is(e.target) && container4.has(e.target).length === 0 && !container5.is(e.target) && container5.has(e.target).length === 0 && !container6.is(e.target) && container6.has(e.target).length === 0 && !container7.is(e.target) && container7.has(e.target).length === 0 && !container8.is(e.target) && container8.has(e.target).length === 0) { 
                $('#desplegable_mujeres').slideUp(50);
                $('#desplegable_hombres').slideUp(50);    
                $('#desplegable_niños').slideUp(50); 
                $('#desplegable_categorias').slideUp(50); 
                //animacion de la flecha
                $('#menu-item-70 a').removeClass('activar');
                $('#menu-item-71 a').removeClass('activar');
                $('#menu-item-72 a').removeClass('activar');
                $('#menu-item-75 a').removeClass('activar');
                //fondo
                $('#content').removeClass('fondo_activo');
                }
                
                       
            });
            var contador=0;
            $('#menu-item-70').on('click',function(){
                $('#desplegable_hombres').slideUp(50);
                $('#desplegable_niños').slideUp(50);
                $('#desplegable_categorias').slideUp(50);
                $('#desplegable_mujeres').slideToggle(300);
                //animacion de la flecha
                $('#menu-item-71 a').removeClass('activar');
                $('#menu-item-72 a').removeClass('activar');
                $('#menu-item-75 a').removeClass('activar');
                $('#menu-item-70 a').toggleClass('activar');
                //fondo
                $('#content').toggleClass('fondo_activo');
                
                return false
                
            });
            $('#menu-item-71').on('click',function(){
                 $('#desplegable_mujeres').slideUp(50);
                 $('#desplegable_niños').slideUp(50);
                 $('#desplegable_categorias').slideUp(50);
                 $('#desplegable_hombres').slideToggle(300);
                 //animacion de la flecha
                 $('#menu-item-70 a').removeClass('activar');
                $('#menu-item-72 a').removeClass('activar');
                $('#menu-item-75 a').removeClass('activar');
                 $('#menu-item-71 a').toggleClass('activar');
                 //fondo
                $('#content').toggleClass('fondo_activo');
                 return false
            });
            $('#menu-item-72').on('click',function(){
                $('#desplegable_hombres').slideUp(50);
                 $('#desplegable_mujeres').slideUp(50);
                 $('#desplegable_categorias').slideUp(50);
                 $('#desplegable_niños').slideToggle(300);
                 //animacion de la flecha
                 $('#menu-item-71 a').removeClass('activar');
                $('#menu-item-70 a').removeClass('activar');
                $('#menu-item-75 a').removeClass('activar');
                 $('#menu-item-72 a').toggleClass('activar');
                 //fondo
                $('#content').toggleClass('fondo_activo');
                 return false
            });
            $('#menu-item-75').on('click',function(){
                $('#desplegable_hombres').slideUp(50);
                 $('#desplegable_mujeres').slideUp(50);
                 $('#desplegable_niños').slideUp(50);
                 $('#desplegable_categorias').slideToggle(300);
                 //animacion de la flecha
                 $('#menu-item-71 a').removeClass('activar');
                $('#menu-item-70 a').removeClass('activar');
                $('#menu-item-72 a').removeClass('activar');
                 $('#menu-item-75 a').toggleClass('activar');
                 //fondo
                $('#content').toggleClass('fondo_activo');
                 return false
            });
        });
    </script>

    <?php }
add_action('wp_footer','GamarraOnline_jsgeneral');
/*agregando owlslider script*/
function wcslider_ejecutar(){
    if( is_front_page() ): ?>
    <script>
        $ = jQuery.noConflict();
        $(document).ready(function(){
        $('.owl-carousel.owl_principal').owlCarousel({
            loop:true,
            autoplay:true,
            //margin:10,
            nav:true,
            navText : ["<i class='fas fa-chevron-circle-left'></i>","<i class='fas fa-chevron-circle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
        $('.owl-carousel.owl_destacados').owlCarousel({
            loop:true,
            autoplay:true,
            margin:10,
            nav:true,
            navText : ["<i class='far fa-arrow-alt-circle-left'></i>","<i class='far fa-arrow-alt-circle-right'></i>"],
            responsive:{
                0:{
                    items:2
                },
                700:{
                    items:4
                },
                1000:{
                    items:5
                }
            }
        })

        });
    </script>

    <?php endif; }
add_action('wp_footer','wcslider_ejecutar');
/* SLIDER DESTACADOS */
function owlslider_destacados(){
    $args=array(
        'posts_per_page' => 7,
        'post_type' => 'product',
        'order' => 'DESC',
    );
    $owlslider= new WP_Query($args);
    echo '<h2 class="titulo-h2">Recientes</h2>';

    echo '<div class="owl-carousel owl-theme owl_destacados">';

    while($owlslider->have_posts()):$owlslider->the_post();
        
            echo '<div class="item">';
    
            echo do_shortcode('[products  ids="' . get_the_ID() . '"]');
        
    
            echo '</div>';
        
    
    endwhile; wp_reset_postdata();
    echo '</div>';
}
add_action('homepage','owlslider_destacados',15);
/* SLIDER OFERTAS */
function owlslider_ofertas(){
    $args=array(
        'posts_per_page' => 1000,
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN'
            ),
        ),
    );
    $owlslider= new WP_Query($args);
    echo '<h2 class="titulo-h2">Destacados</h2>';

    echo '<div class="owl-carousel owl-theme owl_destacados">';

    while($owlslider->have_posts()):$owlslider->the_post();
        $id=get_the_ID();
        if ($id!=73) {
            echo '<div class="item">';
    
            echo do_shortcode('[products  ids="' . get_the_ID() . '"]');
        
    
            echo '</div>';
        }
    
    endwhile; wp_reset_postdata();
    echo '</div>';
}
add_action('homepage','owlslider_ofertas',20);
/*agregando slider principal */
add_action('homepage','slider_principal_gamarraonline',5);
function slider_principal_gamarraonline(){
?>
    </main>
    </div>
    </div>
    <!-- slider-inicio-aqui -->
    <div class="owl-carousel owl-theme owl_principal">
        <a href="<?php the_field('link',85) ?>">
            <div class="item destacada1">
            </div>
        </a>
        <a href="http://gamarraonline.local/vendor/soccerclub/">
            <div class="item destacada2">
            </div>
        </a>
        <div class="item destacada3">
        </div>
    </div>
    <!-- slide-fin-aqui -->
    <div class="col-full">
    <div class="content-area">
    <div class="site-main">
<?php
}
//mensaje de aviso movil
add_action('homepage','mensaje_aviso_movil',10);
function mensaje_aviso_movil(){
?>
<a href="<?php the_field('link',85) ?>">
<div class="fondo-mensaje-modal">
    <div class="contenido-modal">
        <div class="icono-aviso">
        <i class="fas fa-bullhorn"></i>
        </div>
        <div class="texto-aviso">
            <p><?php the_field('titulo',2) ?></p>
            <p><?php the_field('contenido',2) ?></p>
        </div>
    </div>
</div>
</a>
<?php
}
add_action('init','gamarraonline_heros');
function gamarraonline_heros(){
    $id_imagen1=get_field('destacada1',2);
    $imagen1=wp_get_attachment_image_src($id_imagen1,'full')[0];
    $id_imagen1_res=get_field('destacada1_responsive',2);
    $imagen1_res=wp_get_attachment_image_src($id_imagen1_res,'full')[0];

    $id_imagen2=get_field('destacada2',2);
    $imagen2=wp_get_attachment_image_src($id_imagen2,'full')[0];
    $id_imagen2_res=get_field('destacada2_responsive',2);
    $imagen2_res=wp_get_attachment_image_src($id_imagen2_res,'full')[0];

    $id_imagen3=get_field('destacada3',2);
    $imagen3=wp_get_attachment_image_src($id_imagen3,'full')[0];
    $id_imagen3_res=get_field('destacada3_responsive',2);
    $imagen3_res=wp_get_attachment_image_src($id_imagen3_res,'full')[0];



    wp_register_style('custom',false);
    wp_enqueue_style('custom');
    $imagen_destacada_css1=".owl_principal .item.destacada1 {
        background-image: url(". $imagen1 .");
        
    }
    @media (max-width: 600px) {
        .owl_principal .item.destacada1 {
            background-image: url(". $imagen1_res .");
            
        }
    }

    .owl_principal .item.destacada2 {
        background-image: url(". $imagen2 .");
        
    }
    @media (max-width: 600px) {
        .owl_principal .item.destacada2 {
            background-image: url(". $imagen2_res .");
            
        }
    }

    .owl_principal .item.destacada3 {
        background-image: url(". $imagen3 .");
        
    }
    ";
    wp_add_inline_style('custom', $imagen_destacada_css1);
}


//boton para vaciar carrito
add_action('woocommerce_cart_actions','carolinaspa_limpiar_carrito');
function carolinaspa_limpiar_carrito(){?>
    <a class="vaciar-carrito" href="?vaciar-carrito"><?php echo __('Vaciar Carrito','woocommerce') ?></a>
<?php } ?>
<?php add_action('init','carolinaspa_vaciar_carrito');
function carolinaspa_vaciar_carrito(){?>
    <?php if(isset($_GET['vaciar-carrito'])): ?>
    <?php global $woocommerce; ?>
    <?php $woocommerce->cart->empty_cart(); ?>
    <?php endif; ?>
    
<?php } 
      
/* mostrar descuento en cantidad */
// add_filter('woocommerce_get_price_html','carolinaspa_cantidad_ahorrada',10,2);
// function carolinaspa_cantidad_ahorrada($precio,$product){
//     $precio_regular = $product->get_regular_price();
//     if($product->sale_price){
//         if($precio_regular < 100){
//             $porcentaje=round((($product->regular_price - $product->sale_price)/$product->regular_price)*100);
//             return $precio . sprintf(__('<span class="ahorro"> Ahorro %s &#37;</span>','woocommerce'),$porcentaje);
//         }else{
//             $ahorro = wc_price($product->regular_price - $product->sale_price);
//             return $precio . sprintf(__('<span class="ahorro"> Ahorro %s </span>','woocommerce'),$ahorro);
//         }
        
//     }
//     return $precio;
// }
/*categorias principales */
add_action('homepage','categorias_principales',13);
function categorias_principales(){
    ?>
    <div class="site-categorias-principales">
        <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/mujeres">
            <div class="contenido-categoria1">
                <div class="fondo-categoria-principal">
                <i class="fas fa-female"></i>
                </div>
                <p>Mujeres</p>
            </div>         
        </a>
        <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/hombres">
            <div class="contenido-categoria2">
                <div class="fondo-categoria-principal">
                <i class="fas fa-male"></i>
                </div>
                <p>Hombres</p>
            </div>
        </a>
        <a href="http://gamarraonline.local/categoria-producto/ropa-y-calzado/kids">
            <div class="contenido-categoria3">
                <div class="fondo-categoria-principal">
                <i class="fas fa-child"></i>
                </div>
                <p>Niños</p>
            </div>
        </a>
        <a href="http://gamarraonline.local/categoria-producto/categorias/bebe/">
            <div class="contenido-categoria4">
                <div class="fondo-categoria-principal">
                <i class="fas fa-baby"></i>
                </div>
                <p>Bebés</p>
            </div>
        </a>
        <a class="ofertas" href="<?php the_field('link',163); ?>">
            <div class="contenido-categoria5">
                <div class="fondo-categoria-principal">
                <i class="fas fa-tags"></i>
                </div>
                <p>Ofertas</p>
            </div>
        </a>
        <a class="deportes" href="<?php the_field('link',210); ?>">
            <div class="contenido-categoria6">
                <div class="fondo-categoria-principal">
                <i class="fas fa-futbol"></i>
                </div>
                <p>Deporte</p>
            </div>
        </a>
        <a href="http://gamarraonline.local/categoria-producto/categorias/por-mayor/">
            <div class="contenido-categoria7">
                <div class="fondo-categoria-principal">
                <i class="fas fa-boxes"></i>
                </div>
                <p>Por Mayor</p>
            </div>
        </a>
        <a href="<?php the_field('link',176); ?>">
            <div class="contenido-categoria8">
                <div class="fondo-categoria-principal">
                <i class="fas fa-head-side-mask"></i>
                </div>
                <p>Protección</p>
            </div>
        </a>
        <a href="<?php the_field('link',183); ?>">
            <div class="contenido-categoria9">
                <div class="fondo-categoria-principal">
                <i class="fas fa-tshirt"></i>
                </div>
                <p>Ropa</p>
            </div>
        </a>
        <a href="<?php the_field('link',187); ?>">
            <div class="contenido-categoria10">
                <div class="fondo-categoria-principal">
                        <img  src="<?php echo get_stylesheet_directory_uri() . '/img/zapatos.svg' ?>" alt="">
                </div>
                <p>Calzado</p>
            </div>
        </a>
        <a class="novedades" href="<?php the_field('link',191); ?>">
            <div class="contenido-categoria11">
                <div class="fondo-categoria-principal">
                <i class="far fa-star"></i>
                </div>
                <p>Novedades</p>
            </div>
        </a>
        <a href="<?php the_field('link',6); ?>">
            <div class="contenido-categoria12">
                <div class="fondo-categoria-principal">
                <i class="fas fa-search-plus"></i>
                </div>
                <p>Ver todo</p>
            </div>
        </a>
    </div>

    <?php
}
/*agregar video a tab de pagina de productos */
//Remover Tabs
add_filter('woocommerce_product_tabs','carolinaspa_remover_tabs', 11, 1);
function carolinaspa_remover_tabs($tabs){
    global $post;
    //$tabs['description']['title']=$post->post_title;
    $tabs['video']=array(
        'title'=>'video',
        'priority'=>9,
        'callback'=>'carolinaspa_tab_video'
    );
    return $tabs;
}
function carolinaspa_tab_video(){
    global $post;
    $video=get_field('video',$post->ID);
    if($video){?>
        <video muted controls autoplay loop>
            <source src="<?php echo $video ?>">
        </video>
    <?php }else{echo 'No hay video disponible';} ?>
<?php } ?>
<?php 
//eliminar un campo del checkout
add_filter('woocommerce_checkout_fields','gamarraonline_remover_postal',20,1);
function gamarraonline_remover_postal($campos){
    //  echo '<pre>';
    //      echo var_dump($campos['billing']['billing_phone']['required']);
    //  echo '</pre>';
     $campos['billing']['billing_phone']['required']=false;
    
    unset($campos['billing']['billing_postcode']);
    return $campos;
}
//modificar las columnas de los productus en la pagina 'shop'
add_filter('loop_shop_columns','columnas_carolinaspa',10);
function columnas_carolinaspa($columns){
    $columns=4;
    return $columns;
}
//modificar la cantidad de productos mostrados por pagina en 'shop'
add_filter('loop_shop_per_page','productos_por_pagina_carolinaspa',20);
function productos_por_pagina_carolinaspa($pagina){
    $pagina=80;
    return $pagina;
}
///////////////////////////////////
/**
 * Register term fields
 */
add_action( 'init', 'register_vendor_custom_fields' );
function register_vendor_custom_fields() {
	add_action( WC_PRODUCT_VENDORS_TAXONOMY . '_add_form_fields', 'add_vendor_custom_fields' );
	add_action( WC_PRODUCT_VENDORS_TAXONOMY . '_edit_form_fields', 'edit_vendor_custom_fields', 10 );
	add_action( 'edited_' . WC_PRODUCT_VENDORS_TAXONOMY, 'save_vendor_custom_fields' );
	add_action( 'created_' . WC_PRODUCT_VENDORS_TAXONOMY, 'save_vendor_custom_fields' );
}

/**
 * Add term fields form
 */
function add_vendor_custom_fields() {

	wp_nonce_field( basename( __FILE__ ), 'vendor_custom_fields_nonce' );
	?>

	<div class="form-field">
		<label for="facebook"><?php _e( 'Facebook', 'domain' ); ?></label>
		<input type="url" name="facebook" id="facebook" value="" />
	</div>

	<div class="form-field">
		<label for="twitter"><?php _e( 'Twitter', 'domain' ); ?></label>
		<input type="url" name="twitter" id="twitter" value="" />
	</div>
	<?php
}
/**
 * Edit term fields form
 */
function edit_vendor_custom_fields( $term ) {
	wp_nonce_field( basename( __FILE__ ), 'vendor_custom_fields_nonce' );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="facebook"><?php _e( 'Facebook', 'domain' ); ?></label></th>
		<td>
			<input type="url" name="facebook" id="facebook" value="<?php echo esc_url( get_term_meta( $term->term_id, 'facebook', true ) ); ?>" />
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="twitter"><?php _e( 'Twitter', 'domain' ); ?></label></th>
		<td>
			<input type="url" name="twitter" id="twitter" value="<?php echo esc_url( get_term_meta( $term->term_id, 'twitter', true ) ); ?>" />
		</td>
	</tr>
	<?php
}
/**
 * Save term fields
 */
function save_vendor_custom_fields( $term_id ) {
	if ( ! wp_verify_nonce( $_POST['vendor_custom_fields_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	$old_fb      = get_term_meta( $term_id, 'facebook', true );
	$old_twitter = get_term_meta( $term_id, 'twitter', true );

	$new_fb      = esc_url( $_POST['facebook'] );
	$new_twitter = esc_url( $_POST['twitter'] );

	if ( ! empty( $old_fb ) && $new_fb === '' ) {
		delete_term_meta( $term_id, 'facebook' );
	} else if ( $old_fb !== $new_fb ) {
		update_term_meta( $term_id, 'facebook', $new_fb, $old_fb );
	}

	if ( ! empty( $old_twitter ) && $new_twitter === '' ) {
		delete_term_meta( $term_id, 'twitter' );
	} else if ( $old_twitter !== $new_twitter ) {
		update_term_meta( $term_id, 'twitter', $new_twitter, $old_twitter );
	}
}

add_action( 'wcpv_registration_form', 'vendors_reg_custom_fields' );
function vendors_reg_custom_fields() {
	?>
	<p class="form-row form-row-first">
		<label for="wcpv-facebook"><?php esc_html_e( 'Facebook', 'domain' ); ?></label>
		<input type="text" class="input-text" name="facebook" id="wcpv-facebook" value="<?php if ( ! empty( $_POST['facebook'] ) ) echo esc_attr( trim( $_POST['facebook'] ) ); ?>" />
	</p>

	<p class="form-row form-row-last">
		<label for="wcpv-twitter"><?php esc_html_e( 'Twitter', 'woocommerce-product-vendors' ); ?></label>
		<input type="text" class="input-text" name="twitter" id="wcpv-twitter" value="<?php if ( ! empty( $_POST['twitter'] ) ) echo esc_attr( trim( $_POST['twitter'] ) ); ?>" />
	</p>
	<?php
}

add_action( 'wcpv_shortcode_registration_form_process', 'vendors_reg_custom_fields_save', 10, 2 );
function vendors_reg_custom_fields_save( $args, $items ) {
	$term = get_term_by( 'name', $items['vendor_name'], WC_PRODUCT_VENDORS_TAXONOMY );

	if ( isset( $items['facebook'] ) && ! empty( $items['facebook'] ) ) {
		$fb = esc_url( $items['facebook'] );
		update_term_meta( $term->term_id, 'facebook', $fb );
	}

	if ( isset( $items['twitter'] ) && ! empty( $items['twitter'] ) ) {
		$twitter = esc_url( $items['twitter'] );
		update_term_meta( $term->term_id, 'twitter', $twitter );
	}
}

////////////////////////////////////
function automaticallyApproveRegisteredVendors ( $vendorData ) {
    $vendorData['role'] = 'wc_product_vendors_admin_vendor';
    return $vendorData;
    }
add_filter( 'wcpv_registration_default_user_data','automaticallyApproveRegisteredVendors', 10, 1);
function wc_bypass_logout_confirmation() {
    global $wp;
     if ( isset( $wp->query_vars['customer-logout'] ) ) {
       wp_redirect( str_replace( '&', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
       exit;
     }
}
add_action( 'template_redirect', 'wc_bypass_logout_confirmation' );
    
?>