var my_func = function Verif(e) {
    e.preventdefault();
    var number = document.getElementsByName("prix").value;
    var error = document.getElementById("number-check");
    if (isNaN(number)) {
        error.innerText = "Please enter a valid number";
    }

}
var button = document.getElementById("btn-Validate");
button.addEventListener('click', my_func);