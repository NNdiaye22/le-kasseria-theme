<?php
/**
 * Section Menu Restaurant — Le Kasseria
 * Onglets dynamiques liés à la taxonomie WP
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$categories = kasseria_get_categories();
if ( empty( $categories ) ) return;
$first = $categories[0];
?>
<section class="menu-section" id="menu" aria-labelledby="menu-title">
  <div class="container">
    <div class="menu-header reveal">
      <span class="section-eyebrow"><?php _e( 'Notre carte', 'le-kasseria' ); ?></span>
      <h2 id="menu-title" class="section-title"><?php _e( 'Le menu', 'le-kasseria' ); ?></h2>
      <p class="menu-note"><?php _e( 'Tous nos plats sont cuits au feu de bois avec des viandes halal certifiées.', 'le-kasseria' ); ?></p>
    </div>
    <div class="tabs-nav reveal" role="tablist" aria-label="<?php _e( 'Catégories du menu', 'le-kasseria' ); ?>">
      <?php foreach ( $categories as $i => $cat ) : ?>
        <button
          class="tab-btn<?php echo $i === 0 ? ' tab-btn--active' : ''; ?>"
          role="tab"
          id="tab-<?php echo esc_attr( $cat->slug ); ?>"
          aria-controls="panel-<?php echo esc_attr( $cat->slug ); ?>"
          aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
          data-tab="<?php echo esc_attr( $cat->slug ); ?>"
        ><?php echo esc_html( $cat->name ); ?></button>
      <?php endforeach; ?>
    </div>
    <?php foreach ( $categories as $i => $cat ) :
      $plats = kasseria_get_plats( $cat->term_id );
    ?>
      <div
        class="tab-panel<?php echo $i === 0 ? ' tab-panel--active' : ''; ?>"
        id="panel-<?php echo esc_attr( $cat->slug ); ?>"
        role="tabpanel"
        aria-labelledby="tab-<?php echo esc_attr( $cat->slug ); ?>"
        <?php echo $i !== 0 ? 'hidden' : ''; ?>
      >
        <?php if ( empty( $plats ) ) : ?>
          <p class="menu-empty"><?php _e( 'Aucun plat dans cette catégorie pour le moment.', 'le-kasseria' ); ?></p>
        <?php else : ?>
          <ul class="menu-grid" role="list">
            <?php foreach ( $plats as $plat ) :
              $prix_seul = get_post_meta( $plat->ID, '_kasseria_prix_seul', true );
              $prix_menu = get_post_meta( $plat->ID, '_kasseria_prix_menu', true );
              $badge     = get_post_meta( $plat->ID, '_kasseria_badge',     true );
              $thumb     = get_the_post_thumbnail( $plat->ID, 'plat-thumb' );
            ?>
              <li class="menu-item">
                <?php if ( $thumb ) : ?>
                  <div class="menu-item-img" aria-hidden="true"><?php echo $thumb; ?></div>
                <?php endif; ?>
                <div class="menu-item-body">
                  <div class="menu-item-top">
                    <h3 class="menu-item-name"><?php echo esc_html( $plat->post_title ); ?></h3>
                    <?php if ( $badge ) : ?><span class="menu-badge"><?php echo esc_html( $badge ); ?></span><?php endif; ?>
                  </div>
                  <?php if ( ! empty( $plat->post_content ) ) : ?>
                    <p class="menu-item-desc"><?php echo esc_html( wp_trim_words( $plat->post_content, 15 ) ); ?></p>
                  <?php endif; ?>
                  <div class="menu-item-pricing">
                    <?php if ( $prix_seul ) : ?><span class="price-main"><?php echo esc_html( $prix_seul ); ?></span><?php endif; ?>
                    <?php if ( $prix_menu ) : ?><span class="price-menu"><?php _e( 'Menu :', 'le-kasseria' ); ?> <?php echo esc_html( $prix_menu ); ?></span><?php endif; ?>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
