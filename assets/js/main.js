// ── Navigation scroll
const nav = document.getElementById('nav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 50);
  }, { passive: true });
}

// ── Hamburger mobile
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
let menuOpen = false;

if (hamburger && mobileMenu) {
  hamburger.addEventListener('click', () => {
    menuOpen = !menuOpen;
    mobileMenu.classList.toggle('open', menuOpen);
    hamburger.setAttribute('aria-expanded', menuOpen);
    const spans = hamburger.querySelectorAll('span');
    if (menuOpen) {
      spans[0].style.transform = 'translateY(6.5px) rotate(45deg)';
      spans[1].style.opacity = '0';
      spans[2].style.transform = 'translateY(-6.5px) rotate(-45deg)';
    } else {
      spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    }
  });

  document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', () => {
      menuOpen = false;
      mobileMenu.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.querySelectorAll('span').forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    });
  });
}

// ── Menu tabs
function switchTab(category, btn) {
  document.querySelectorAll('.menu-cat').forEach(c => c.classList.remove('active'));
  document.querySelectorAll('.tab-btn').forEach(b => {
    b.classList.remove('active');
    b.setAttribute('aria-selected', 'false');
  });
  const target = document.getElementById(category);
  if (target) target.classList.add('active');
  btn.classList.add('active');
  btn.setAttribute('aria-selected', 'true');
}
window.switchTab = switchTab;

// ── Scroll reveal (IntersectionObserver)
const reveals = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));
}

// ── Trigger hero reveals immediately
document.querySelectorAll('#accueil .reveal').forEach(el => {
  setTimeout(() => el.classList.add('visible'), 100);
});

// ── Hero image subtle zoom on load
const heroImg = document.querySelector('.hero-image-wrap img');
if (heroImg) {
  if (heroImg.complete) {
    heroImg.style.transform = 'scale(1.03)';
  } else {
    heroImg.addEventListener('load', () => {
      heroImg.style.transform = 'scale(1.03)';
    });
  }
}
