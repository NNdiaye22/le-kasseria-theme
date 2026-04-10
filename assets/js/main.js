/**
 * Le Kasseria — assets/js/main.js
 * Auteur : 2N — Ndiogou Ndiaye | github.com/NNdiaye22
 * Scripts : dark mode toggle, hamburger, onglets menu, scroll animations, header scroll
 */
(function () {
  'use strict';

  /* ══════════════════════════════════════════
   * 1. DARK MODE TOGGLE
   * ══════════════════════════════════════════ */
  const html      = document.documentElement;
  const toggleBtn = document.querySelector('[data-theme-toggle]');
  const MOON_SVG  = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';
  const SUN_SVG   = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>';

  let currentTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  html.setAttribute('data-theme', currentTheme);

  function applyTheme(theme) {
    html.setAttribute('data-theme', theme);
    if (toggleBtn) {
      toggleBtn.innerHTML  = theme === 'dark' ? SUN_SVG : MOON_SVG;
      toggleBtn.setAttribute('aria-label', theme === 'dark' ? 'Passer en mode clair' : 'Passer en mode sombre');
    }
    currentTheme = theme;
  }

  applyTheme(currentTheme);

  if (toggleBtn) {
    toggleBtn.addEventListener('click', function () {
      applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
    });
  }

  /* ══════════════════════════════════════════
   * 2. HAMBURGER + MENU MOBILE
   * ══════════════════════════════════════════ */
  const hamburger  = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      const isOpen = mobileMenu.classList.toggle('is-open');
      hamburger.classList.toggle('is-open', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen.toString());
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('is-open');
        hamburger.classList.remove('is-open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    document.addEventListener('click', function (e) {
      if (!mobileMenu.contains(e.target) && !hamburger.contains(e.target)) {
        mobileMenu.classList.remove('is-open');
        hamburger.classList.remove('is-open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  /* ══════════════════════════════════════════
   * 3. ONGLETS MENU RESTAURANT
   * ══════════════════════════════════════════ */
  const tabBtns   = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  if (tabBtns.length && tabPanels.length) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const target = btn.getAttribute('data-tab');

        tabBtns.forEach(function (b) {
          b.classList.remove('tab-btn--active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('tab-btn--active');
        btn.setAttribute('aria-selected', 'true');

        tabPanels.forEach(function (panel) {
          panel.classList.remove('tab-panel--active');
          panel.setAttribute('hidden', '');
        });
        const activePanel = document.getElementById('panel-' + target);
        if (activePanel) {
          activePanel.classList.add('tab-panel--active');
          activePanel.removeAttribute('hidden');
        }
      });
    });

    tabBtns.forEach(function (btn, index) {
      btn.addEventListener('keydown', function (e) {
        let newIndex = -1;
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
          newIndex = (index + 1) % tabBtns.length;
        } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
          newIndex = (index - 1 + tabBtns.length) % tabBtns.length;
        } else if (e.key === 'Home') {
          newIndex = 0;
        } else if (e.key === 'End') {
          newIndex = tabBtns.length - 1;
        }
        if (newIndex !== -1) {
          e.preventDefault();
          tabBtns[newIndex].focus();
          tabBtns[newIndex].click();
        }
      });
    });
  }

  /* ══════════════════════════════════════════
   * 4. HEADER — SCROLL STATE
   * ══════════════════════════════════════════ */
  var header   = document.getElementById('site-header');
  var scrolled = false;

  if (header) {
    window.addEventListener('scroll', function () {
      var shouldScrolled = window.scrollY > 40;
      if (shouldScrolled !== scrolled) {
        scrolled = shouldScrolled;
        header.classList.toggle('is-scrolled', scrolled);
      }
    }, { passive: true });
  }

  /* ══════════════════════════════════════════
   * 5. SCROLL REVEAL ANIMATION
   * ══════════════════════════════════════════ */
  var revealEls = document.querySelectorAll('.reveal');

  if (revealEls.length && 'IntersectionObserver' in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -48px 0px'
    });

    revealEls.forEach(function (el) { observer.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  }

  /* ══════════════════════════════════════════
   * 6. LUCIDE ICONS
   * ══════════════════════════════════════════ */
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }

  /* ══════════════════════════════════════════
   * 7. SMOOTH SCROLL — HASH LINKS
   * ══════════════════════════════════════════ */
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ══════════════════════════════════════════
   * 8. IMAGE FALLBACK
   * ══════════════════════════════════════════ */
  document.querySelectorAll('img').forEach(function (img) {
    img.addEventListener('error', function () {
      img.style.background = 'var(--color-surface-offset)';
      img.alt = img.alt || '';
    });
  });

})();
