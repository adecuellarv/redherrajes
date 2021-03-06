<?php
add_theme_support('post-thumbnails');
function sh_the_content_by_id($post_id = 0, $more_link_text = null, $stripteaser = false)
{
    global $post;
    $post = &get_post($post_id);
    setup_postdata($post, $more_link_text, $stripteaser);
    the_content();
    wp_reset_postdata($post);
}
function productos()
{
    $labels = array(
        'name'               => _x('productos', 'post type general name'),
        'singular_name'      => _x('productos', 'post type singular name'),
        'add_new'            => _x('Agregar producto', 'productos'),
        'add_new_item'       => __('Agregar nuevo producto'),
        'edit_item'          => __('Editar producto'),
        'new_item'           => __('Nuevo producto'),
        'all_items'          => __('Todos los productos'),
        'view_item'          => __('Ver producto'),
        'search_items'       => __('Buscar producto'),
        'not_found'          =>  __('No se han encontrado productos'),
        'not_found_in_trash' => __('No hay productos en la papelera'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Productos'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail', 'editor')
    );

    register_post_type('productos', $args);
}
add_action('init', 'productos');

// taxonomy tipo propiedad
function categorias()
{
    $labels = array(
        "name" => _x("Categorias", "Taxonomy General Name", "text_domain"),
        "singular_name" => _x("Categorias", "Taxonomy Singular Name", "text_domain"),
        "menu_name" => __("Categorias", "text_domain"),
        "all_items" => __("Todas las categorias", "text_domain"),
        "parent_item" => __("Categoria de producto", "text_domain"),
        "parent_item_colon" => __("Categoria de producto:", "text_domain"),
        "new_item_name" => __("Nombre Categoria", "text_domain"),
        "add_new_item" => __("A??adir Categoria", "text_domain"),
        "edit_item" => __("Editar Categoria", "text_domain"),
        "update_item" => __("Actualizar Categoria", "text_domain"),
        "separate_items_with_commas" => __("Separa las Categorias con comas", "text_domain"),
        "search_items" => __("Buscar Categoria", "text_domain"),
        "add_or_remove_items" => __("A??adir o borrar Categoria", "text_domain"),
        "choose_from_most_used" => __("Elegir entre las categorias m??s utilizadas", "text_domain"),
        "not_found" => __("No se encuentra", "text_domain"),
    );
    $rewrite = array(
        "slug" => "cat",
        "with_front" => true,
        "hierarchical" => true,
    );
    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "public" => true,
        "show_ui" => true,
        "show_admin_column" => true,
        "show_in_nav_menus" => true,
        "show_tagcloud" => true,
        "rewrite" => $rewrite,
    );
    register_taxonomy("categoria", array("productos"), $args);
}
add_action("init", "categorias", 0);

// taxonomy tipo propiedad
function components()
{
    $labels = array(
        "name" => _x("Componentes", "Taxonomy General Name", "text_domain"),
        "singular_name" => _x("Componentes", "Taxonomy Singular Name", "text_domain"),
        "menu_name" => __("Componentes", "text_domain"),
        "all_items" => __("Todas las Componentes", "text_domain"),
        "parent_item" => __("Componente de producto", "text_domain"),
        "parent_item_colon" => __("Componente de producto:", "text_domain"),
        "new_item_name" => __("Nombre Componente", "text_domain"),
        "add_new_item" => __("A??adir Componente", "text_domain"),
        "edit_item" => __("Editar Componente", "text_domain"),
        "update_item" => __("Actualizar Componente", "text_domain"),
        "separate_items_with_commas" => __("Separa los Componentes con comas", "text_domain"),
        "search_items" => __("Buscar Componente", "text_domain"),
        "add_or_remove_items" => __("A??adir o borrar Componente", "text_domain"),
        "choose_from_most_used" => __("Elegir entre las componentes m??s utilizadas", "text_domain"),
        "not_found" => __("No se encuentra", "text_domain"),
    );
    $rewrite = array(
        "slug" => "cat",
        "with_front" => true,
        "hierarchical" => true,
    );
    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "public" => true,
        "show_ui" => true,
        "show_admin_column" => true,
        "show_in_nav_menus" => true,
        "show_tagcloud" => true,
        "rewrite" => $rewrite,
    );
    register_taxonomy("components", array("productos"), $args);
}
add_action("init", "components", 0);


function shapeSpace_add_var($url, $key, $value)
{

    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);

    if (strpos($url, '?') === false) {
        return ($url . '?' . $key . '=' . $value);
    } else {
        return ($url . '&' . $key . '=' . $value);
    }
}

function addGetParamToUrl($url, $key, $value)
{
    $info = parse_url($url);
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($info['query'], $query);
    return $info['path'] . '?' . http_build_query($query ? array_merge($query, array($key => $value)) : array($key => $value));
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
