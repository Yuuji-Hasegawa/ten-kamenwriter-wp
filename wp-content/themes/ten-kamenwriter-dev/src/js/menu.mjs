export const menu = () => {
  let btnlist = document.querySelectorAll('.c-menu-btn');
  let btn = Array.prototype.slice.call(btnlist, 0);
  let cover = document.querySelector('.c-sidebar-bg');
  let sidebar = document.querySelector('.c-sidebar');

  function open() {
    for (var i = 0; i < btnlist.length; i++) {
      btnlist[i].setAttribute('aria-expanded', 'true');
      btnlist[i].setAttribute('aria-label', 'menu close');
    }
    cover.classList.add('c-sidebar-bg:is-open');
    sidebar.setAttribute('aria-hidden', 'false');
    sidebar.classList.add('c-sidebar:is-open');
    document.body.classList.add('fixed');
  }
  function close() {
    for (var i = 0; i < btnlist.length; i++) {
      btnlist[i].setAttribute('aria-expanded', 'false');
      btnlist[i].setAttribute('aria-label', 'menu open');
    }
    cover.classList.remove('c-sidebar-bg:is-open');
    sidebar.setAttribute('aria-hidden', 'true');
    sidebar.classList.remove('c-sidebar:is-open');
    document.body.classList.remove('fixed');
  }

  btn.forEach((target) => {
    target.addEventListener('click', () => {
      if (target.getAttribute('aria-expanded') == 'false') {
        open();
      } else {
        close();
      }
    });
  });
  cover.addEventListener('click', () => {
    close();
  });
};
