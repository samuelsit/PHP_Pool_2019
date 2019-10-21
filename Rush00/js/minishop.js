window.addEventListener('load', function () {


	var granted = getCookie('access_granted');
	var login_input = document.getElementById('log');
	if (granted && login_input)
		login_input.disabled = true;

	var links = document.getElementsByClassName('del');
	[].forEach.call(links, function(e){e.addEventListener('click', function (ev) {
		if (!confirm('Attention, cette action est irreversible.'
			+'Voulez-vous vraiment supprimer ce compte et toutes '
			+'les donneées associeées ?')) {
			ev.preventDefault();
		}})});

	/*document.getElementsByClassName('del').addEventListener('click', function (e) {
		if (!confirm('Attention, cette action est irreversible.'
			+'Voulez-vous vraiment supprimer votre compte et toutes '
			+'les donneées associeées ?')) {
			e.preventDefault();
		}
	});*/

})


function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
};
