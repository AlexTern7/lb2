function show() {
    if("save" in localStorage) {
        document.getElementById("load").innerHTML = decodeURI(localStorage.getItem("save"));
        localStorage.setItem("save", document.getElementById("save").innerHTML);
    }
}

function set() {
    localStorage.setItem("save", document.getElementById("save").innerHTML);
}