# Le Kasseria — Thème WordPress

> Thème WordPress sur mesure pour **Le Kasseria**, restaurant turc au feu de bois à Saint-Étienne.
> Conçu et développé par **2N — Ndiogou Ndiaye** | [github.com/NNdiaye22](https://github.com/NNdiaye22)

---

## 📦 Installation

1. Télécharger le thème (ZIP via GitHub → Code → Download ZIP)
2. Dans WordPress Admin : **Apparence → Thèmes → Ajouter → Téléverser**
3. Activer le thème
4. Les **55 plats** et les **6 catégories** sont créés automatiquement à l'activation
5. Aller dans **Apparence → Menus** → créer un menu et l'assigner à "Navigation principale"

---

## 🍽 Gérer le menu restaurant

### Ajouter un plat
**Plats → Ajouter** dans l'admin WP
- **Titre** = nom du plat
- **Contenu** = description
- **Image à la une** = photo du plat (miniature 72×72 dans le menu)
- **Catégorie de plat** = onglet dans lequel il apparaît
- **Informations du plat** (panneau dédié) :
  - Prix seul : `€8,50`
  - Prix menu : `€10,00` (laisser vide si pas de formule)
  - Badge : `Signature`, `Nouveau`, etc.
  - Ordre d'affichage : `1`, `2`, `3`…

### Supprimer un plat
**Plats → liste** → passer la souris sur le plat → **Corbeille**

### Ajouter un onglet (catégorie)
**Plats → Catégories → Ajouter** → donner un nom → Sauvegarder
L'onglet apparaît automatiquement dans le menu restaurant du site.

### Supprimer un onglet
**Plats → Catégories** → passer la souris → **Supprimer**

---

## 🔧 Modifier les informations du restaurant

**Apparence → Personnaliser → 🍽 Le Kasseria — Infos restaurant**
- Téléphone
- Adresse
- Email
- Instagram / Facebook URL
- Google Maps URL
- Sous-titre du Hero

**Apparence → Personnaliser → 🕐 Horaires d'ouverture**
- Un champ par jour (ex: `12:00–14:00, 18:00–22:00` ou `Fermé`)

---

## 🧭 Navigation WordPress

Le menu du site est **100% géré par WordPress** :
- **Apparence → Menus** → créer/modifier les liens
- Assigner à l'emplacement **"Navigation principale"**
- Pour le bouton "Commander" : ajouter un lien personnalisé avec la classe CSS `nav-cta`

---

## 🏗 Structure des fichiers

```
le-kasseria-theme/
├── style.css                    ← Déclaration du thème (signature 2N)
├── functions.php                ← Centre de contrôle (CPT, Taxonomie, Customizer, Seed)
├── header.php                   ← En-tête + navigation WP native
├── footer.php                   ← Pied de page + horaires dynamiques
├── front-page.php               ← Page d'accueil (assemble les sections)
├── index.php                    ← Template fallback
├── 404.php                      ← Page introuvable
├── inc/
│   └── menu-walker.php          ← Walker personnalisé pour le menu WP
├── template-parts/
│   ├── section-hero.php         ← Bannière principale
│   ├── section-about.php        ← À propos
│   ├── section-gallery.php      ← Galerie photos
│   ├── section-menu.php         ← Menu restaurant (dynamique)
│   └── section-contact.php      ← Contact + horaires + commander
└── assets/
    ├── css/style.css            ← Feuille de styles principale
    └── js/main.js               ← Scripts (tabs, scroll, hamburger)
```

---

## ✅ Fonctionnalités

- [x] Navigation WordPress native (Apparence → Menus)
- [x] Custom Post Type "Plats" avec photo, prix, badge, ordre
- [x] Taxonomie "Catégories de plat" → onglets dynamiques
- [x] 55 plats pré-remplis à l'activation
- [x] Customizer : tél, adresse, horaires, réseaux sociaux
- [x] Responsive mobile-first (375px → 1920px)
- [x] Mode sombre / clair automatique + bouton toggle
- [x] Animations au scroll
- [x] Bouton "Commander" → appel téléphonique direct
- [x] Multilingue ready (`load_theme_textdomain`)

---

## 📞 Infos par défaut

| Champ | Valeur |
|-------|--------|
| Téléphone | +33 09 56 95 90 92 |
| Adresse | 9 rue Pierre Termier, 42100 Saint-Étienne |
| Horaires | Mer–Dim 12:00–14:00 / 18:00–22:00 · Lun–Mar Fermé |

---

*Thème créé avec ❤️ par **2N — Ndiogou Ndiaye***
