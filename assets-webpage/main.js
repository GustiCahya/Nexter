const toggler = document.querySelector('.sidebar__toggler');
const sidebarMenu = document.querySelector('.sidebar__menu');
const closeToggler = document.querySelector('.sidebar__menu--close');

toggler.addEventListener('click', function(){
    sidebarMenu.style.opacity = '1';
    sidebarMenu.style.transform = 'translateX(0)';
})
closeToggler.addEventListener('click', function(){
    sidebarMenu.style.opacity = '0';
    sidebarMenu.style.transform = 'translateX(-100%)';
})