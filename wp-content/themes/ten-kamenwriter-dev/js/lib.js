'use strict';
(() => {
  let e = window.matchMedia('(prefers-color-scheme: dark)');
  function t(e) {
    let t = document.head.children;
    for (let c = 0; c < t.length; c++) {
      if ('icon' === t[c].getAttribute('rel')) {
        t[c].setAttribute('href', e);
      }
    }
  }
  t(e.matches ? './favicon-d.ico' : './favicon.ico'),
    e.addEventListener('change', (c) => {
      t(e.matches ? './favicon-d.ico' : './favicon.ico');
    });
})(),
  console.log('reloaded?');
