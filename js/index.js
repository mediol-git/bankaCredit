let sumText = document.getElementById("sum_text");
let sumSpan = document.getElementById("sum_span");
let sum = document.getElementById("sum");
let summText = document.getElementById("summ_text");
let summSpan = document.getElementById("summ_span");
let summ = document.getElementById("summ");
let x = 1;
let y = 169;
sum.addEventListener("input", function () {
    sumText.innerText = this.value;
    sumSpan.innerText = this.value;
});
summ.addEventListener("input", function () {
    summText.innerText = this.value;
    summSpan.innerText = this.value + x;
});

document.getElementById("button").addEventListener("click", function (e) {
    e.preventDefault();
    localStorage.setItem("sum", sum.value);
    location.href = "form.php";
});
document.getElementById("button2").addEventListener("click", function (e) {
    e.preventDefault();
    localStorage.setItem("summ", summ.value);
    location.href = "form.php";
});