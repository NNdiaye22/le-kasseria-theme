<?php
/**
 * Section À propos — Le Kasseria
 * Auteur : 2N — Ndiogou Ndiaye
 */
defined( 'ABSPATH' ) || exit;
?>
<section class="about" id="a-propos" aria-labelledby="about-title">
  <div class="about-inner container">
    <div class="about-photos reveal">
      <div class="about-photo-main">
        <img
          src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=700&q=85&auto=format&fit=crop"
          alt="<?php _e( 'Intérieur chaleureux du restaurant Le Kasseria', 'le-kasseria' ); ?>"
          width="700" height="875"
          loading="lazy" decoding="async"
        >
      </div>
      <div class="about-photo-accent">
        <img
          src="https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?w=400&q=85&auto=format&fit=crop"
          alt="<?php _e( 'Pide turc cuit au four à bois', 'le-kasseria' ); ?>"
          width="400" height="300"
          loading="lazy" decoding="async"
        >
      </div>
    </div>
    <div class="about-text reveal">
      <span class="section-eyebrow"><?php _e( 'Notre histoire', 'le-kasseria' ); ?></span>
      <h2 id="about-title" class="section-title"><?php _e( 'Le feu de bois,<br>notre tradition', 'le-kasseria' ); ?></h2>
      <p class="about-lead"><?php _e( 'Au Kasseria, chaque plat est cuit dans notre four à bois traditionnel. Ce mode de cuisson ancestral donne à nos viandes ce fumé profond et cette caramélisation unique que vous ne trouverez nulle part ailleurs à Saint-Étienne.', 'le-kasseria' ); ?></p>
      <p><?php _e( 'Nos recettes transmises de génération en génération — Adana kebab, iskender, pide sortis du four — sont préparées chaque jour avec des viandes halal sélectionnées et des épices importées directement de Turquie.', 'le-kasseria' ); ?></p>
      <ul class="about-list">
        <li><?php _e( 'Four à bois artisanal — cuisson lente à haute température', 'le-kasseria' ); ?></li>
        <li><?php _e( 'Viandes halal certifiées, livraison quotidienne', 'le-kasseria' ); ?></li>
        <li><?php _e( 'Épices d’Anatolie importées directement', 'le-kasseria' ); ?></li>
        <li><?php _e( 'Sauces et pains faits maison chaque matin', 'le-kasseria' ); ?></li>
      </ul>
    </div>
  </div>
</section>
