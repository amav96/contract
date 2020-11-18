var btnMenu = document.getElementById('btn-menu');
var nav = document.getElementById('nav');

btnMenu.addEventListener('click', function (){ /*movimiento del menu*/
	nav.classList.toggle('mostrar');
})