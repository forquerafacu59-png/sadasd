(() => {
  const root = document.querySelector('main.wrap');
  if (!root) return;

  const redirectTo = root.getAttribute('data-redirect') || '';
  const delayAttr = root.getAttribute('data-delay') || '3000';
  const delay = Math.max(0, parseInt(delayAttr, 10) || 0);

  // sincroniza la animación con el delay
  const fill = document.querySelector('.progress__fill');
  if (fill) fill.style.animationDuration = `${delay}ms`;

  if (redirectTo) setTimeout(() => (window.location.href = redirectTo), delay);
})();
