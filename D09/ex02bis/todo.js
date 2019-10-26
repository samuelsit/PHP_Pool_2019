function refresh() {
    var tab = document.cookie.split(';');
    if (Array.isArray(tab) && tab[0] != null) {
        for (var i = 0; i < tab.length; i++) {
            todo = tab[i].split('=');
            if (todo[1] != null)
                create(todo[1]);
        }
    }
}
    
function add() {
    var todo = prompt("Entrez un todo: ");
    if (todo != null && todo.length > 0)
        create(todo);
}

function create(todo) {
    $('#ft_list').prepend($('<div>' + todo + '</div>').click(function () {
        if (confirm("Supprimer le todo ?")) {
            this.remove();
            document.cookie = todo + "=;" + "expires=Thu, 01 Jan 1970 00:00:00 UTC ;";
        }
    }));
    document.cookie = todo + "=" + todo + ";" + "expires=Thu, 03 Dec 2020 23:59:59 GMT ;";
}