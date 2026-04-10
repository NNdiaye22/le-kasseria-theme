<?php
/**
 * Section Galerie — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
$photos = [
  [ 'src' => 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=900&q=85&auto=format&fit=crop', 'alt' => 'Adana kebab grillé au charbon de bois', 'w' => 900, 'h' => 1100 ],
  [ 'src' => 'https://images.unsplash.com/photo-1541614101331-1a5a3a194e92?w=600&q=85&auto=format&fit=crop', 'alt' => 'Mezze maison servis en entrée', 'w' => 600, 'h' => 400 ],
  [ 'src' => 'https://images.unsplash.com/photo-1635321593217-40050ad13c74?w=600&q=85&auto=format&fit=crop', 'alt' => 'Baklava pistache maison', 'w' => 600, 'h' => 400 ],
  [ 'src' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=600&q=85&auto=format&fit=crop', 'alt' => 'Viande qui sort du four à bois', 'w' => 600, 'h' => 800 ],
];
?>
<section class="gallery" id="galerie" aria-labelledby="gallery-title">
  <div class="gallery-header container reveal">
    <span class="section-eyebrow"><?php _e( 'La table', 'le-kasseria' ); ?></span>
    <h2 id="gallery-title" class="section-title"><?php _e( 'Des saveurs<br>qui parlent', 'le-kasseria' ); ?></h2>
  </div>
  <div class="gallery-grid reveal">
    <?php foreach ( $photos as $i => $p ) : ?>
      <figure class="gallery-item gallery-item--<?php echo $i + 1; ?>">
        <img
          src="<?php echo esc_url( $p['src'] ); ?>"
          alt="<?php echo esc_attr( $p['alt'] ); ?>"
          width="<?php echo $p['w']; ?>"
          height="<?php echo $p['h']; ?>"
          loading="lazy"
          decoding="async"
        >
      </figure>
    <?php endforeach; ?>
  </div>
</section>
