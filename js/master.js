const host = window.location.host.includes("localhost")
        ? `localhost/${window.location.pathname.split("/")[1]}`
        : window.location.host,
    baseURL = `http://${host}/actions/`;

$(".toast").toast("show"); //Enable all toasts

// Form Submisssion
[...document.querySelectorAll("form")].forEach(form =>
    form.addEventListener("submit", e => {
        e.preventDefault();
        [...form.classList].includes("form-disabled")
            ? ""
            : formSubmit(form, baseURL);
    })
);
