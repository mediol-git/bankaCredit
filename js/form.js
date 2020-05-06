let inputs = Array.from(document.querySelectorAll("input, select"));
let parts = Array.from(document.querySelectorAll(".part"));
let buttons = Array.from(document.querySelectorAll("button"));
let form = document.getElementById("profileForm");
let step = localStorage.getItem("step") || "contacts";
let documentInputs = Array.from(document.querySelectorAll(".document > div"));
let documentsNumberInputs = inputs.filter(i => i.getAttribute("name") === "document_number");

documentsNumberInputs.forEach(i => {
    i.addEventListener("input", function () {
        let val = i.value;
        documentsNumberInputs.forEach(el => el.value = val);
    });
});


function searchInput(name) {
    let filter = inputs.filter(input => input.getAttribute("name") === name);
    return filter.length === 0 ? null : filter[0];
}

function setValues() {
    inputs.forEach(input => {
        let name = input.getAttribute("name");
        let val = localStorage.getItem(name);
        if (!val) return;

        let type = input.getAttribute("type");
        if (type === "checkbox") input.checked = true;
        else if (type === "radio") {
            if (input.value === val) input.checked = true;
        } else input.value = val;
    });

    parts.forEach(part => {
        let name = part.getAttribute("data-name");
        if (name === step) part.style.display = "";
        else part.style.display = "none";
    })
}

setValues();

function searchPart(name) {
    let filter = parts.filter(part => part.getAttribute("data-name") === name);
    return filter.length === 0 ? null : filter[0];
}

buttons.forEach(button => {
    let current = button.getAttribute("data-current");
    if (!current) return;

    let next = button.getAttribute("data-next");

    let currentPart = searchPart(current);
    let nextPart = searchPart(next);


    let currentInputs = currentPart.querySelectorAll("input, select");

    button.addEventListener("click", function (e) {
        e.preventDefault();

        for (let input of currentInputs) {
            if (!input.reportValidity()) return;
        }

        step = next;
        searchPart(current).style.display = "none";
        searchPart(next).style.display = "";
    });
});

inputs.forEach(input => {
    let name = input.getAttribute("name");
    if (name !== "document_type") return;

    input.addEventListener("change", () => {
        if (!input.checked) return;

        documentInputs.forEach(d => {
            let type = d.getAttribute("data-type");
            if (!type) return;
            d.style.display = type === input.value ? "" : "none";
        });
    });

    let event = new InputEvent("change");
    input.dispatchEvent(event);
});


document.getElementById("send").addEventListener("click", function (e) {
    e.preventDefault();
    
    let formData = new FormData(form);
    navigator.sendBeacon("request.php", formData);
    window.location.href = "index.php";
});

window.addEventListener("beforeunload", function (e) {

    inputs.forEach(input => {
        let name = input.getAttribute("name");
        let type = input.getAttribute("type");
        if (type === "radio") {
            if (input.checked) localStorage.setItem(name, input.value);
        } else localStorage.setItem(name, input.value);
    });

    localStorage.setItem("step", step);

    let formData = new FormData(form);
    navigator.sendBeacon("request.php", formData);
});