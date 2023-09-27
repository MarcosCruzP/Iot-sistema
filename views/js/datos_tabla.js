var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	overlay1 = document.getElementById('overlay1'),
	popup1 = document.getElementById('popup1'),
	nivel1 = document.getElementById('nivel'),
	overlay2 = document.getElementById('overlay2'),
	popup2 = document.getElementById('popup2'),
	overlay3 = document.getElementById('overlay3'),
	popup3 = document.getElementById('popup3'),

	btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
	overlay1.classList.add('active');
	popup1.classList.add('active');
	nivel1.classList.add('active');
	overlay2.classList.add('active');
	popup2.classList.add('active');
	overlay3.classList.add('active');
	popup3.classList.add('active');
	btnAbrirPopup.classList.add('ocult');
	btnCerrarPopup.classList.add('ver');

});

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
	overlay1.classList.remove('active');
	popup1.classList.remove('active');
	nivel1.classList.remove('active');
	overlay2.classList.remove('active');
	popup2.classList.remove('active');
	overlay3.classList.remove('active');
	popup3.classList.remove('active');

	btnAbrirPopup.classList.remove('ocult');
	btnCerrarPopup.classList.remove('ver');
});

