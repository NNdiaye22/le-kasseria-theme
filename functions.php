<?php
/**
 * Le Kasseria — functions.php
 * Auteur : 2N — Ndiogou Ndiaye | github.com/NNdiaye22
 */

defined( 'ABSPATH' ) || exit;

/* ═══════════════════════════════════════════════════
 *  1. SUPPORT DU THÈME
 * ═══════════════════════════════════════════════════ */
function kasseria_setup() {
    load_theme_textdomain( 'le-kasseria', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'plat-thumb',  120, 120, true );
    add_image_size( 'plat-card',   600, 450, true );
    add_image_size( 'hero-full',  1920, 900, true );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','script','style' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    register_nav_menus( [
        'primary'  => __( 'Navigation principale', 'le-kasseria' ),
        'footer'   => __( 'Menu pied de page',     'le-kasseria' ),
    ] );
}
add_action( 'after_setup_theme', 'kasseria_setup' );

/* ═══════════════════════════════════════════════════
 *  2. ENQUEUE — CSS & JS
 * ═══════════════════════════════════════════════════ */
function kasseria_enqueue() {
    $v = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'kasseria-fonts-fontshare', 'https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,700&display=swap', [], null );
    wp_enqueue_style( 'kasseria-fonts-google', 'https://fonts.googleapis.com/css2?family=Cormorant+Garant:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&display=swap', [], null );
    wp_enqueue_style( 'kasseria-main', get_template_directory_uri() . '/assets/css/style.css', [], $v );
    wp_enqueue_script( 'kasseria-main', get_template_directory_uri() . '/assets/js/main.js', [], $v, true );
    wp_localize_script( 'kasseria-main', 'KasseriaData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'kasseria_nonce' ),
        'tel'     => get_theme_mod( 'kasseria_telephone', '+33 09 56 95 90 92' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'kasseria_enqueue' );

/* ═══════════════════════════════════════════════════
 *  3. CUSTOM POST TYPE — PLATS
 * ═══════════════════════════════════════════════════ */
function kasseria_register_cpt_plats() {
    $labels = [
        'name'               => __( 'Plats',            'le-kasseria' ),
        'singular_name'      => __( 'Plat',             'le-kasseria' ),
        'menu_name'          => __( 'Plats du menu',    'le-kasseria' ),
        'add_new'            => __( 'Ajouter un plat',  'le-kasseria' ),
        'add_new_item'       => __( 'Nouveau plat',     'le-kasseria' ),
        'edit_item'          => __( 'Modifier le plat', 'le-kasseria' ),
        'view_item'          => __( 'Voir le plat',     'le-kasseria' ),
        'search_items'       => __( 'Rechercher',       'le-kasseria' ),
        'not_found'          => __( 'Aucun plat trouvé','le-kasseria' ),
        'featured_image'     => __( 'Photo du plat',    'le-kasseria' ),
        'set_featured_image' => __( 'Définir la photo', 'le-kasseria' ),
    ];
    register_post_type( 'plat', [
        'labels'              => $labels,
        'public'              => true,
        'show_in_menu'        => true,
        'menu_icon'           => 'dashicons-food',
        'menu_position'       => 5,
        'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'has_archive'         => false,
        'show_in_rest'        => true,
        'rewrite'             => [ 'slug' => 'plat' ],
    ] );
}
add_action( 'init', 'kasseria_register_cpt_plats' );

/* ═══════════════════════════════════════════════════
 *  4. TAXONOMIE — CATÉGORIES DE PLATS
 * ═══════════════════════════════════════════════════ */
function kasseria_register_tax_categories() {
    $labels = [
        'name'          => __( 'Catégories de plats',   'le-kasseria' ),
        'singular_name' => __( 'Catégorie',             'le-kasseria' ),
        'menu_name'     => __( 'Catégories',            'le-kasseria' ),
        'add_new_item'  => __( 'Nouvelle catégorie',    'le-kasseria' ),
        'edit_item'     => __( 'Modifier la catégorie', 'le-kasseria' ),
        'all_items'     => __( 'Toutes les catégories', 'le-kasseria' ),
    ];
    register_taxonomy( 'categorie_plat', 'plat', [
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => [ 'slug' => 'categorie' ],
    ] );
}
add_action( 'init', 'kasseria_register_tax_categories' );

/* ═══════════════════════════════════════════════════
 *  5. META BOXES — CHAMPS DES PLATS
 * ═══════════════════════════════════════════════════ */
function kasseria_add_plat_metaboxes() {
    add_meta_box( 'kasseria_plat_infos', __( 'Informations du plat', 'le-kasseria' ), 'kasseria_plat_metabox_cb', 'plat', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'kasseria_add_plat_metaboxes' );

function kasseria_plat_metabox_cb( $post ) {
    wp_nonce_field( 'kasseria_save_plat', 'kasseria_plat_nonce' );
    $prix_seul = get_post_meta( $post->ID, '_kasseria_prix_seul', true );
    $prix_menu = get_post_meta( $post->ID, '_kasseria_prix_menu', true );
    $badge     = get_post_meta( $post->ID, '_kasseria_badge',     true );
    $ordre     = get_post_meta( $post->ID, '_kasseria_ordre',     true );
    ?>
    <table class="form-table" style="width:100%">
      <tr>
        <th style="width:200px"><label for="kasseria_prix_seul"><?php _e('Prix (seul)', 'le-kasseria'); ?></label></th>
        <td><input type="text" id="kasseria_prix_seul" name="kasseria_prix_seul" value="<?php echo esc_attr($prix_seul); ?>" placeholder="ex: €8,50" class="regular-text">
        <p class="description"><?php _e('Prix du plat seul. Ex : €8,50', 'le-kasseria'); ?></p></td>
      </tr>
      <tr>
        <th><label for="kasseria_prix_menu"><?php _e('Prix menu (+frites +boisson)', 'le-kasseria'); ?></label></th>
        <td><input type="text" id="kasseria_prix_menu" name="kasseria_prix_menu" value="<?php echo esc_attr($prix_menu); ?>" placeholder="ex: €10,00" class="regular-text"></td>
      </tr>
      <tr>
        <th><label for="kasseria_badge"><?php _e('Badge / étiquette', 'le-kasseria'); ?></label></th>
        <td><input type="text" id="kasseria_badge" name="kasseria_badge" value="<?php echo esc_attr($badge); ?>" placeholder="ex: Signature, Nouveau…" class="regular-text"></td>
      </tr>
      <tr>
        <th><label for="kasseria_ordre"><?php _e('Ordre d\'affichage', 'le-kasseria'); ?></label></th>
        <td><input type="number" id="kasseria_ordre" name="kasseria_ordre" value="<?php echo esc_attr($ordre ?: 10); ?>" min="1" max="999" class="small-text"></td>
      </tr>
    </table>
    <?php
}

function kasseria_save_plat_meta( $post_id ) {
    if ( ! isset( $_POST['kasseria_plat_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['kasseria_plat_nonce'], 'kasseria_save_plat' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    $fields = [ '_kasseria_prix_seul', '_kasseria_prix_menu', '_kasseria_badge', '_kasseria_ordre' ];
    $keys   = [ 'kasseria_prix_seul', 'kasseria_prix_menu', 'kasseria_badge', 'kasseria_ordre' ];
    foreach ( $keys as $i => $key ) {
        if ( isset( $_POST[$key] ) ) {
            update_post_meta( $post_id, $fields[$i], sanitize_text_field( $_POST[$key] ) );
        }
    }
}
add_action( 'save_post_plat', 'kasseria_save_plat_meta' );

/* ═══════════════════════════════════════════════════
 *  6. CUSTOMIZER — INFORMATIONS DU RESTAURANT
 * ═══════════════════════════════════════════════════ */
function kasseria_customizer( $wp_customize ) {
    $wp_customize->add_section( 'kasseria_restaurant', [
        'title'    => __( '🍽 Le Kasseria — Infos restaurant', 'le-kasseria' ),
        'priority' => 30,
    ] );
    $infos = [
        'kasseria_telephone'     => [ 'label' => __( 'Téléphone',         'le-kasseria' ), 'default' => '+33 09 56 95 90 92' ],
        'kasseria_adresse'       => [ 'label' => __( 'Adresse',            'le-kasseria' ), 'default' => '9 rue Pierre Termier, 42100 Saint-Étienne' ],
        'kasseria_email'         => [ 'label' => __( 'Email (optionnel)', 'le-kasseria' ), 'default' => '' ],
        'kasseria_instagram'     => [ 'label' => __( 'Instagram URL',     'le-kasseria' ), 'default' => '#' ],
        'kasseria_facebook'      => [ 'label' => __( 'Facebook URL',      'le-kasseria' ), 'default' => '#' ],
        'kasseria_google_maps'   => [ 'label' => __( 'Google Maps URL',   'le-kasseria' ), 'default' => 'https://maps.google.com/?q=9+rue+Pierre+Termier+42100+Saint-Etienne' ],
        'kasseria_hero_subtitle' => [ 'label' => __( 'Sous-titre Hero',   'le-kasseria' ), 'default' => 'Cuisine turque au feu de bois · Viandes halal · Saint-Étienne' ],
    ];
    foreach ( $infos as $key => $args ) {
        $wp_customize->add_setting( $key, [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'refresh' ] );
        $wp_customize->add_control( $key, [ 'label' => $args['label'], 'section' => 'kasseria_restaurant', 'type' => 'text' ] );
    }
    $wp_customize->add_section( 'kasseria_horaires', [
        'title'    => __( '🕐 Horaires d\'ouverture', 'le-kasseria' ),
        'priority' => 31,
    ] );
    $jours = [
        'lundi'    => [ 'label' => __( 'Lundi',    'le-kasseria' ), 'default' => 'Fermé' ],
        'mardi'    => [ 'label' => __( 'Mardi',    'le-kasseria' ), 'default' => 'Fermé' ],
        'mercredi' => [ 'label' => __( 'Mercredi', 'le-kasseria' ), 'default' => '12:00–14:00, 18:00–22:00' ],
        'jeudi'    => [ 'label' => __( 'Jeudi',    'le-kasseria' ), 'default' => '12:00–14:00, 18:00–22:00' ],
        'vendredi' => [ 'label' => __( 'Vendredi', 'le-kasseria' ), 'default' => '12:00–14:00, 18:00–22:00' ],
        'samedi'   => [ 'label' => __( 'Samedi',   'le-kasseria' ), 'default' => '12:00–14:00, 18:00–22:00' ],
        'dimanche' => [ 'label' => __( 'Dimanche', 'le-kasseria' ), 'default' => '12:00–14:00, 18:00–22:00' ],
    ];
    foreach ( $jours as $jour => $args ) {
        $wp_customize->add_setting( "kasseria_horaire_$jour", [ 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ] );
        $wp_customize->add_control( "kasseria_horaire_$jour", [ 'label' => $args['label'], 'section' => 'kasseria_horaires', 'type' => 'text' ] );
    }
}
add_action( 'customize_register', 'kasseria_customizer' );

/* ═══════════════════════════════════════════════════
 *  7. DONNÉES INITIALES — SEED DES PLATS
 * ═══════════════════════════════════════════════════ */
function kasseria_seed_menu_data() {
    if ( get_option( 'kasseria_seeded' ) ) return;
    $cats = [
        'entrees'     => [ 'name' => 'Entrées',       'order' => 1 ],
        'pide'        => [ 'name' => 'Pide & Pizza',  'order' => 2 ],
        'kebab'       => [ 'name' => 'Kebab',         'order' => 3 ],
        'specialites' => [ 'name' => 'Spécialités',   'order' => 4 ],
        'barquettes'  => [ 'name' => 'Barquettes',    'order' => 5 ],
        'supplements' => [ 'name' => 'Suppléments',   'order' => 6 ],
    ];
    $term_ids = [];
    foreach ( $cats as $slug => $data ) {
        $term = wp_insert_term( $data['name'], 'categorie_plat', [ 'slug' => $slug ] );
        if ( ! is_wp_error( $term ) ) {
            $term_ids[$slug] = $term['term_id'];
            update_term_meta( $term['term_id'], 'kasseria_order', $data['order'] );
        } else {
            $existing = get_term_by( 'slug', $slug, 'categorie_plat' );
            if ( $existing ) $term_ids[$slug] = $existing->term_id;
        }
    }
    $plats = [
        [ 'cat' => 'entrees', 'title' => 'İşkembe',           'desc' => 'Soupe de tripes — recette traditionnelle turque',                                                       'prix' => '€5,00',  'ordre' => 1 ],
        [ 'cat' => 'entrees', 'title' => 'Mercimek',           'desc' => 'Soupe de lentilles rouges — douce et parfumée',                                                         'prix' => '€4,00',  'ordre' => 2 ],
        [ 'cat' => 'entrees', 'title' => 'Peynir Kızartma',    'desc' => 'Gratin de fromage turc — croustillant et fondant',                                                       'prix' => '€5,00',  'ordre' => 3 ],
        [ 'cat' => 'entrees', 'title' => 'Salade Le Kasseria', 'desc' => 'Laitue, thon, maïs, sauce blanche maison',                                                              'prix' => '€5,00',  'ordre' => 4 ],
        [ 'cat' => 'entrees', 'title' => 'Salade Paysanne',    'desc' => 'Tomate, concombre, oignon — simple et frais',                                                           'prix' => '€3,00',  'ordre' => 5 ],
        [ 'cat' => 'pide',    'title' => 'Peynirli Pide',      'desc' => 'Pide au fromage turc fondu',                                                                            'prix' => '€6,00',  'ordre' => 1 ],
        [ 'cat' => 'pide',    'title' => 'Pide Végétarien',    'desc' => 'Légumes de saison, épices douces',                                                                      'prix' => '€6,50',  'ordre' => 2 ],
        [ 'cat' => 'pide',    'title' => 'Sucuklu Pide',       'desc' => 'Saucisse turque sucuk épicée',                                                                          'prix' => '€6,00',  'ordre' => 3 ],
        [ 'cat' => 'pide',    'title' => 'İspanaklı Pide',     'desc' => 'Épinards frais, fromage et épices',                                                                     'prix' => '€6,00',  'ordre' => 4 ],
        [ 'cat' => 'pide',    'title' => 'Lahmacun',           'desc' => 'Pide à la viande hachée, tomates et épices',                                                            'prix' => '€5,00',  'ordre' => 5 ],
        [ 'cat' => 'pide',    'title' => 'Kıymalı Pide',       'desc' => 'Viande hachée, oignons, persil',                                                                        'prix' => '€6,00',  'ordre' => 6 ],
        [ 'cat' => 'pide',    'title' => 'Kıymalı Kaşarlı',    'desc' => 'Viande hachée + fromage kaşar fondu',                                                                   'prix' => '€7,50',  'ordre' => 7 ],
        [ 'cat' => 'pide',    'title' => 'Kıymalı Kaşarlı Beurre', 'desc' => 'Viande hachée, kaşar, beurre fondu doré',                                                          'prix' => '€8,50',  'ordre' => 8 ],
        [ 'cat' => 'pide',    'title' => 'Kuşbaşılı Pide',     'desc' => 'Morceaux de viande sautés aux poivrons',                                                                'prix' => '€7,50',  'ordre' => 9 ],
        [ 'cat' => 'pide',    'title' => 'Kuşbaşılı Kaşarlı',  'desc' => 'Morceaux de viande + fromage kaşar',                                                                    'prix' => '€8,50',  'ordre' => 10 ],
        [ 'cat' => 'pide',    'title' => 'Lahmacun + Kebab',   'desc' => 'Combo lahmacun et kebab',                         'prix' => '€8,50',  'prix_menu' => '€10,00', 'ordre' => 11 ],
        [ 'cat' => 'pide',    'title' => 'Memomix',            'desc' => 'Le généreux mélange signature de la maison',                                                            'prix' => '€10,00', 'ordre' => 12 ],
        [ 'cat' => 'pide',    'title' => 'Pide œuf avec beurre','desc' => 'Œuf coulant, beurre fondu, herbes fraîches',                                                           'prix' => '€7,50',  'ordre' => 13 ],
        [ 'cat' => 'pide',    'title' => 'Pizza 33 cm',        'desc' => 'Garnitures au choix',                                                                                   'prix' => '€6,00',  'ordre' => 14 ],
        [ 'cat' => 'pide',    'title' => 'Pizza 40 cm',        'desc' => 'Format famille — garnitures au choix',                                                                  'prix' => '€8,00',  'ordre' => 15 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Géant',     'desc' => '',                                                'prix' => '€10,00', 'prix_menu' => '€12,50', 'ordre' => 1 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Maxi',      'desc' => '',                                                'prix' => '€9,00',  'prix_menu' => '€11,50', 'ordre' => 2 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Adana',     'desc' => 'Viande hachée épicée au charbon',                 'prix' => '€8,50',  'prix_menu' => '€10,00', 'ordre' => 3 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Miche',     'desc' => '',                                                'prix' => '€9,00',  'prix_menu' => '€11,50', 'ordre' => 4 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Dinde',     'desc' => 'Dinde grillée, sauce yaourt maison',              'prix' => '€7,00',  'prix_menu' => '€8,50',  'ordre' => 5 ],
        [ 'cat' => 'kebab',   'title' => 'Sandwich Köfte',     'desc' => 'Boulettes de bœuf aux épices',                                                                          'prix' => '€7,00',  'ordre' => 6 ],
        [ 'cat' => 'kebab',   'title' => 'Galettes',           'desc' => '',                                                'prix' => '€9,00',  'prix_menu' => '€11,50', 'ordre' => 7 ],
        [ 'cat' => 'kebab',   'title' => 'DB Galettes',        'desc' => 'Double garniture',                                'prix' => '€11,00', 'prix_menu' => '€12,50', 'ordre' => 8 ],
        [ 'cat' => 'kebab',   'title' => 'DB Tacos',           'desc' => 'Double viande, fromage fondu',                    'prix' => '€7,00',  'prix_menu' => '€9,00',  'ordre' => 9 ],
        [ 'cat' => 'kebab',   'title' => 'Tacos Kebab',        'desc' => '',                                                                                                       'prix' => '€11,00', 'ordre' => 10 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Adana',     'desc' => 'Adana kebab, riz, salade, pain',                                                                        'prix' => '€10,00', 'ordre' => 11 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Köfte',     'desc' => 'Köfte grillés, garnitures maison',                                                                      'prix' => '€10,00', 'ordre' => 12 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Wings',     'desc' => 'Ailes de poulet marinées et grillées',                                                                  'prix' => '€10,00', 'ordre' => 13 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Kebab',     'desc' => 'Kebab généreux, accompagnements complets',                                                               'prix' => '€12,50', 'ordre' => 14 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Dinde',     'desc' => 'Dinde grillée, salade fraîche',                                                                         'prix' => '€10,00', 'ordre' => 15 ],
        [ 'cat' => 'kebab',   'title' => 'Assiette Enfant',    'desc' => 'Portion adaptée aux enfants',                                                                           'prix' => '€7,50',  'ordre' => 16 ],
        [ 'cat' => 'specialites', 'title' => 'İskender',       'desc' => 'Kebab sur pain doré, sauce tomate et beurre clarifié — la spécialité ottomane par excellence',         'prix' => '€15,00', 'badge' => 'Signature', 'ordre' => 1 ],
        [ 'cat' => 'specialites', 'title' => 'Capsalon',       'desc' => 'Frites, kebab, fromage fondu, sauce salade — incontournable',                                          'prix' => '€10,00', 'ordre' => 2 ],
        [ 'cat' => 'specialites', 'title' => 'Kasseria Royale','desc' => 'Le plat signature — 5 viandes grillées, accompagnements complets',                                     'prix' => '€17,00', 'badge' => 'Maison', 'ordre' => 3 ],
        [ 'cat' => 'specialites', 'title' => 'Kasseria Izgara','desc' => '3 viandes grillées au charbon, garnitures généreuses',                                                  'prix' => '€13,50', 'ordre' => 4 ],
        [ 'cat' => 'specialites', 'title' => 'Kiremit Köfte',  'desc' => 'Köfte cuits à la tuile en terre cuite, sauce épicée',                                                   'prix' => '€10,00', 'ordre' => 5 ],
        [ 'cat' => 'specialites', 'title' => 'Kiremit Dinde',  'desc' => 'Dinde mijotée à la tuile, arômes d\'herbes et tomate',                                                  'prix' => '€10,00', 'ordre' => 6 ],
        [ 'cat' => 'barquettes', 'title' => 'Petite Frites',   'desc' => '', 'prix' => '€1,50',  'ordre' => 1 ],
        [ 'cat' => 'barquettes', 'title' => 'Moyenne Frites',  'desc' => '', 'prix' => '€3,00',  'ordre' => 2 ],
        [ 'cat' => 'barquettes', 'title' => 'Grande Frites',   'desc' => '', 'prix' => '€4,50',  'ordre' => 3 ],
        [ 'cat' => 'barquettes', 'title' => 'Petite Viandes',  'desc' => '', 'prix' => '€8,00',  'ordre' => 4 ],
        [ 'cat' => 'barquettes', 'title' => 'Moyenne Viandes', 'desc' => '', 'prix' => '€10,00', 'ordre' => 5 ],
        [ 'cat' => 'barquettes', 'title' => 'Grande Viandes',  'desc' => '', 'prix' => '€12,00', 'ordre' => 6 ],
        [ 'cat' => 'barquettes', 'title' => 'Nuggets × 4',     'desc' => '', 'prix' => '€3,00',  'ordre' => 7 ],
        [ 'cat' => 'barquettes', 'title' => 'Nuggets × 6',     'desc' => '', 'prix' => '€4,00',  'ordre' => 8 ],
        [ 'cat' => 'barquettes', 'title' => 'Tenders × 3',     'desc' => '', 'prix' => '€3,50',  'ordre' => 9 ],
        [ 'cat' => 'barquettes', 'title' => 'Tenders × 6',     'desc' => '', 'prix' => '€5,00',  'ordre' => 10 ],
        [ 'cat' => 'supplements', 'title' => 'Emmental',           'desc' => '', 'prix' => '€1,00', 'ordre' => 1 ],
        [ 'cat' => 'supplements', 'title' => 'Fromage turc',       'desc' => '', 'prix' => '€1,00', 'ordre' => 2 ],
        [ 'cat' => 'supplements', 'title' => 'Mozzarella',         'desc' => '', 'prix' => '€1,00', 'ordre' => 3 ],
        [ 'cat' => 'supplements', 'title' => 'Œuf',                'desc' => '', 'prix' => '€1,00', 'ordre' => 4 ],
        [ 'cat' => 'supplements', 'title' => 'Supplément viande',  'desc' => 'Ajout de viande supplémentaire sur tout plat', 'prix' => '€2,50', 'ordre' => 5 ],
    ];
    foreach ( $plats as $plat ) {
        $post_id = wp_insert_post( [ 'post_title' => $plat['title'], 'post_content' => $plat['desc'], 'post_status' => 'publish', 'post_type' => 'plat' ] );
        if ( ! is_wp_error( $post_id ) && isset( $term_ids[ $plat['cat'] ] ) ) {
            wp_set_object_terms( $post_id, $term_ids[ $plat['cat'] ], 'categorie_plat' );
            update_post_meta( $post_id, '_kasseria_prix_seul', $plat['prix'] );
            update_post_meta( $post_id, '_kasseria_ordre',     $plat['ordre'] );
            if ( ! empty( $plat['prix_menu'] ) ) update_post_meta( $post_id, '_kasseria_prix_menu', $plat['prix_menu'] );
            if ( ! empty( $plat['badge'] ) )     update_post_meta( $post_id, '_kasseria_badge',     $plat['badge'] );
        }
    }
    update_option( 'kasseria_seeded', true );
}
add_action( 'after_switch_theme', 'kasseria_seed_menu_data' );

/* ═══════════════════════════════════════════════════
 *  8. HELPERS
 * ═══════════════════════════════════════════════════ */
function kasseria_get_categories() {
    $terms = get_terms( [ 'taxonomy' => 'categorie_plat', 'hide_empty' => true, 'orderby' => 'meta_value_num', 'meta_key' => 'kasseria_order', 'order' => 'ASC' ] );
    return is_wp_error( $terms ) ? [] : $terms;
}

function kasseria_get_plats( $term_id ) {
    return get_posts( [ 'post_type' => 'plat', 'numberposts' => -1, 'tax_query' => [ [ 'taxonomy' => 'categorie_plat', 'field' => 'term_id', 'terms' => $term_id ] ], 'meta_key' => '_kasseria_ordre', 'orderby' => 'meta_value_num', 'order' => 'ASC' ] );
}

function kasseria_opt( $key, $default = '' ) {
    return esc_html( get_theme_mod( $key, $default ) );
}

function kasseria_get_horaires() {
    $jours    = [ 'lundi' => 'Lundi', 'mardi' => 'Mardi', 'mercredi' => 'Mercredi', 'jeudi' => 'Jeudi', 'vendredi' => 'Vendredi', 'samedi' => 'Samedi', 'dimanche' => 'Dimanche' ];
    $defaults = [
        'lundi'    => 'Fermé',
        'mardi'    => 'Fermé',
        'mercredi' => '12:00–14:00, 18:00–22:00',
        'jeudi'    => '12:00–14:00, 18:00–22:00',
        'vendredi' => '12:00–14:00, 18:00–22:00',
        'samedi'   => '12:00–14:00, 18:00–22:00',
        'dimanche' => '12:00–14:00, 18:00–22:00',
    ];
    $result = [];
    foreach ( $jours as $slug => $label ) {
        $val = kasseria_opt( "kasseria_horaire_$slug", $defaults[$slug] );
        $result[] = [ 'jour' => $label, 'heures' => $val, 'ferme' => ( $val === 'Fermé' ) ];
    }
    return $result;
}
