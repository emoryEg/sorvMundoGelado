//Ativar Menu Dropdown
const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
const instacesDropdown = M.Dropdown.init(elemsDropdown,
    {
        coverTrigger:false
    } );
//Ativar o menu mobile
elemsSidenav = document.querySelectorAll(".sidenav");
const instancesSidenav = M.Sidenav.init(elemsSidenav);
