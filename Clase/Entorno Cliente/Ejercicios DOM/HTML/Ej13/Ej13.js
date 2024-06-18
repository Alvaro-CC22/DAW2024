window.onload = function() {
for (var i = 0; i < 100; i++) {

    var checkbox = document.createElement("input");
    checkbox.type = "checkbox";

    var nRandom = Math.floor(Math.random() * 130);

    document.body.innerHTML += `${checkbox.outerHTML} ${nRandom}`;
}
}

function marcarTodo(){

    var checkboxes = document.getElementsByTagName("input");

    for (var i = 0; i < checkboxes.length; i++) {

        checkboxes[i].type = "checkbox";
        checkboxes[i].checked = true;
    }

}

function desmarcarTodo(){

    var checkboxes = document.getElementsByTagName("input");

    for (var i = 0; i < checkboxes.length; i++) {

        checkboxes[i].type = "checkbox";
        checkboxes[i].checked = false;
    }
}