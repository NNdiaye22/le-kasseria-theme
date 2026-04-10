<?php
/**
 * Section Galerie — Le Kasseria
 */
defined( 'ABSPATH' ) || exit;
?>
<section id="galerie" class="gallery" aria-label="<?php _e( 'Galerie photos', 'le-kasseria' ); ?>">
  <div class="container--wide">

    <div class="gallery-header">
      <div>
        <span class="label reveal"><?php _e( 'Nos Plats', 'le-kasseria' ); ?></span>
        <h2 class="gallery-title reveal reveal-delay-1"><?php _e( 'Des saveurs qui<br>parlent d\'elles-mêmes', 'le-kasseria' ); ?></h2>
      </div>
      <p class="gallery-sub reveal reveal-delay-2">
        <?php _e( 'İskender, Kıymalı Pide, Adana, Lahmacun — chaque assiette est une invitation au voyage ottoman.', 'le-kasseria' ); ?>
      </p>
    </div>

    <div class="gallery-grid">

      <div class="gallery-item reveal">
        <img
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/f6fa3365185dc162f15bbd684ce7a83bad74df7b.jpg"
          alt="<?php _e( 'İskender kebab — viande tranchée sur pain doré, sauce tomate et beurre clarifié', 'le-kasseria' ); ?>"
          width="1080" height="1620" loading="lazy"
        />
        <div class="gallery-caption"><?php _e( 'İskender — Signature', 'le-kasseria' ); ?></div>
      </div>

      <div class="gallery-item reveal reveal-delay-1">
        <img
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/0fb483f498d0e3de45e826bd6e46a9430407952c.jpg"
          alt="<?php _e( 'Kıymalı Pide — pide turque garnie de viande hachée', 'le-kasseria' ); ?>"
          width="2048" height="2048" loading="lazy"
        />
        <div class="gallery-caption"><?php _e( 'Kıymalı Pide', 'le-kasseria' ); ?></div>
      </div>

      <div class="gallery-item reveal reveal-delay-2">
        <img
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/25036d78e293421e866dac092ab7531c4c4e9a1d.jpg"
          alt="<?php _e( 'Lahmacun — pizza turque à la viande hachée et épices', 'le-kasseria' ); ?>"
          width="1299" height="1191" loading="lazy"
        />
        <div class="gallery-caption"><?php _e( 'Lahmacun', 'le-kasseria' ); ?></div>
      </div>

      <div class="gallery-item reveal reveal-delay-3">
        <img
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/5a90f06bb496f5334c479c39c0cd7698c9ef32b0.jpg"
          alt="<?php _e( 'Adana kebab grillé avec pain turc et accompagnements', 'le-kasseria' ); ?>"
          width="1000" height="1023" loading="lazy"
        />
        <div class="gallery-caption"><?php _e( 'Adana Kebab', 'le-kasseria' ); ?></div>
      </div>

    </div>
  </div>
</section>
