function openFormNew() {
    document.getElementById("myFormNew").style.display = "block";
}

function openFormDelete() {
    document.getElementById("myFormDelete").style.display = "block";
}

function closeFormNew() {
    document.getElementById("myFormNew").style.display = "none";
    document.getElementById('id').value = "";
    document.getElementById('title').value = "";
    document.getElementById('des').value = "";
}

function closeFormDelete() {
    document.getElementById("myFormDelete").style.display = "none";
    document.getElementById('deleteid').value = "";
}

function close_window() {
    window.close();
}