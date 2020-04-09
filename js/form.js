const showFormResponse = (form, state, message, redirect) => {
    $(form).find(".form-error")
        .html(`<div class="alert alert-dismissible fade" role="alert"><div>${message}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>`);

    $(form)
        .find(".alert.alert-dismissible")
        .removeClass("alert-danger alert-success")
        .addClass(`show shadow-sm alert-${state}`);

    setTimeout(
        () => (redirect === "" ? "" : (window.location.href = redirect)),
        2000
    );
};

const formSubmit = (form, baseURL) => {
    let fields = [...form.querySelectorAll(".form-control")],
        action = form.getAttribute("action"),
        method = form.getAttribute("method"),
        direction = form.getAttribute("direction"),
        formData = {},
        btn = form.querySelector(`[type="submit"]`),
        btnVal = btn.innerHTML;

    fields.forEach((input) => {
        formData[input.getAttribute("id")] = input.value;
    });

    let errorFieldsObject = validateFormData(form, formData);

    if (!isEmptyObject(errorFieldsObject)) {
        for (let [errorField, errorValue] of Object.entries(
            errorFieldsObject
        )) {
            handleFormFieldError(form, errorField, errorValue);
        }
    } else {
        $.ajax({
            beforeSend: () => (btn.innerHTML = spinner),
            type: method,
            data: formData,
            url: `./actions/${action}`,
            success: (result) => {
                console.log(result);

                result = ifJSONData(result)
                    ? JSON.parse(result)
                    : {
                          state: "danger",
                          //   message: result.split("Stack")[0]
                          message:
                              "There's an error with this form.<br />We will fix it shortly",
                          redirect: "",
                      };

                let { message, redirect, state } = result;
                window.event.preventDefault();
                showFormResponse(form, state, message, redirect);
            },
            error: (xhr, status, error) => {
                console.log((xhr, status, error));
                showFormResponse(form, "danger", error, "");
            },
            complete: () => (
                (btn.innerHTML = btnVal),
                getUser(),
                getOpportunities(),
                getInvestments(),
                getTransactions(),
                getBankDetails()
            ),
        });
        //set up ajax call here putting spinner beforeSend and btnVal onComplete
    }
};

const validateFormData = (form, formData) => {
    errorFields = {};
    for (let [key, value] of Object.entries(formData)) {
        if (key.includes("mail"))
            validateEmail(value) !== ""
                ? (errorFields[key] = validateEmail(value))
                : "";

        if (key.includes("Pass") && !key.includes("CPass"))
            validatePass(value) !== ""
                ? (errorFields[key] = validatePass(value))
                : "";

        if (key.includes("CPass"))
            validateCPass(
                value,
                form.querySelector(`input[type="password"]`).value
            ) !== ""
                ? (errorFields[key] = validateCPass(
                      value,
                      form.querySelector(`input[type="password"]`).value
                  ))
                : "";
    }
    return errorFields;
};

const validateEmail = (email) =>
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
        ? ""
        : "Please provide a valid email address";

const validatePass = (pass) =>
    pass.length < 6 ? "Password length must be more than 5" : "";

const validateCPass = (cPass, pass) =>
    pass === cPass ? "" : "Provide matching passwords";

const handleFormFieldError = (form, fieldId, title) => {
    //disable all errors
    [...form.querySelectorAll(".form-control")].forEach((field) =>
        field.classList.remove("border-danger")
    );

    let field = form.querySelector(`#${fieldId}`);
    field.setAttribute("title", title);
    field.classList.add("border");
    field.classList.add("border-danger");
    $(`#${fieldId}`).tooltip("show");
};

const isEmptyObject = (obj) => {
    for (let key in obj) {
        if (obj.hasOwnProperty(key)) return false;
    }
    return true;
};
