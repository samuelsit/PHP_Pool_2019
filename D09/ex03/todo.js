$(document).ready(function() {
    $.ajax ({
        url: 'select.php',
        success: function (res) {
            if (Array.isArray(res) && res[0] != null) {
                for (var i = 0; i < res.length; i++) {
                    if (res[i] != null) {
                        buf = res[i].split(';');
                        create(buf[1]);
                    }
                }
            }
        }
    });
});

function add() {
    var todo = prompt("Entrez un todo: ");
    if (todo != null && todo.length > 0) {
        create(todo);
        $.ajax ({
            type: "GET",
            url: "insert.php?" + todo + "=" + todo
        });
    }
}

function create(todo) {
    if (todo != null)
        $('#ft_list').prepend($('<div>' + todo + '</div>').click(remove));
}

function remove() {
    if (confirm("Supprimer le todo ?")) {
        this.remove();
        removeFromCSV(this.innerHTML);
    }
}

function removeFromCSV(todo) {
    $.ajax({
        type: "GET",
        url: "delete.php?" + todo + "=" + todo,
    });
}