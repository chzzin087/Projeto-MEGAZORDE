function classToggle() {
    const navs = document.querySelectorAll('.side_items')
    
    navs.forEach(nav => nav.classList.toggle('sidebar_exibir'));
  }
  
  document.querySelector('.menu_sand')
    .addEventListener('click', classToggle);