<?php
/**
 * Section À Propos — Le Kasseria
 */
defined( 'ABSPATH' ) || exit;
?>
<section id="apropos" class="about" aria-label="<?php _e( 'À propos du restaurant', 'le-kasseria' ); ?>">
  <div class="container">
    <div class="about-grid">

      <div class="about-image-stack reveal">
        <img
          class="about-img-main"
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/a216bf292202963e27a358a87e4ba4d571b55d24.jpg"
          alt="<?php _e( 'Salle du restaurant Le Kasseria — ambiance chaleureuse briques et bois', 'le-kasseria' ); ?>"
          width="1500" height="1000"
          loading="lazy"
        />
        <img
          class="about-img-accent"
          src="https://pplx-res.cloudinary.com/image/upload/pplx_search_images/5a90f06bb496f5334c479c39c0cd7698c9ef32b0.jpg"
          alt="<?php _e( 'Assiette d\'Adana kebab avec pain et accompagnements', 'le-kasseria' ); ?>"
          width="500" height="500"
          loading="lazy"
        />
      </div>

      <div class="about-content">
        <span class="label reveal"><?php _e( 'Notre Histoire', 'le-kasseria' ); ?></span>
        <h2 class="about-title reveal reveal-delay-1">
          <?php _e( 'Une cuisine <em>ottomane</em><br>qui vient du cœur', 'le-kasseria' ); ?>
        </h2>
        <p class="about-text reveal reveal-delay-2">
          <?php _e( 'Le Kasseria est né d\'une passion profonde pour la gastronomie turque — ses épices généreuses, ses grillades au charbon et ses recettes familiales transmises de génération en génération.', 'le-kasseria' ); ?>
        </p>
        <p class="about-text reveal reveal-delay-3">
          <?php _e( 'Chaque jour, notre équipe sélectionne des produits frais pour vous préparer des plats authentiques, dans le respect des traditions ottomanes les plus exigeantes. Que vous veniez déjeuner, dîner en famille ou emporter un repas, Le Kasseria vous reçoit avec chaleur.', 'le-kasseria' ); ?>
        </p>
        <div class="about-stats reveal reveal-delay-4">
          <div class="stat"><span class="stat-number">15+</span><span class="stat-label"><?php _e( 'Ans d\'expérience', 'le-kasseria' ); ?></span></div>
          <div class="stat"><span class="stat-number">50+</span><span class="stat-label"><?php _e( 'Plats au menu', 'le-kasseria' ); ?></span></div>
          <div class="stat"><span class="stat-number">200+</span><span class="stat-label"><?php _e( 'Avis 5 étoiles', 'le-kasseria' ); ?></span></div>
          <div class="stat"><span class="stat-number">100%</span><span class="stat-label"><?php _e( 'Halal certifié', 'le-kasseria' ); ?></span></div>
        </div>
      </div>

    </div>
  </div>
</section>
