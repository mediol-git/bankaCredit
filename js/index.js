let sumText = document.getElementById("sum_text");
let sumSpan = document.getElementById("sum_span");
let sumComission = document.getElementById("sum_comission");
let sum = document.getElementById("sum");
let summText = document.getElementById("summ_text");
let summSpan = document.getElementById("summ_span");
let summComission = document.getElementById("summ_comission");
let summ = document.getElementById("summ");
sum.addEventListener("input", function () {
    sumText.innerText = this.value;
    sumSpan.innerText = parseInt(this.value) + 1;
    sumComission.innerText = parseInt(this.value) + 170;
});
summ.addEventListener("input", function () {
    summText.innerText = this.value;
    summSpan.innerText = parseInt(this.value) + 1;
    summComission.innerText = parseInt(this.value) + 170;
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