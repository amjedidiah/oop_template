let count = 0;
const registerInteract = (
    screenButton,
    leftScreen,
    leftScreenRow,
    rightScreen
) => {
    screenButton.classList.toggle("activated");

    leftScreen.classList.toggle("moved");
    leftScreen.classList.toggle("col-md-4");
    leftScreen.classList.toggle("col-md-6");

    rightScreen.classList.toggle("moved");

    let logo =
            window.innerWidth <= 768
                ? document.querySelector(
                      "#header.sub-header a.navbar-brand img.d-md-none"
                  )
                : document.querySelector(
                      "#header.sub-header a.navbar-brand img.d-none"
                  ),
        src =
            window.innerWidth <= 768
                ? "./img/logo.png"
                : count % 2 === 0
                ? "./img/logo.png"
                : "./img/logo_white.png";

    logo.setAttribute("src", src);

    setTimeout(() => {
        [...leftScreenRow.querySelectorAll(".col")].forEach(col => {
            col.classList.toggle("d-none");
        });
        [...rightScreen.querySelectorAll("div.row > div")].forEach(col => {
            col.classList.toggle("d-none");
        });
        screenButton.classList.toggle("activated");
        leftScreen.classList.toggle("col-md-4");
        leftScreen.classList.toggle("col-md-6");
        document.querySelector("#header .navbar-brand").style.color = "green";
        // leftScreenRow.innerHTML =
    }, 300);

    count++;
};

const chkForResetUser = (target, parentElement, email) => {
    let { innerHTML } = target;
    // Close alert
    $(parentElement)
        .find(".alert")
        .alert("close");

    // Ajax to search for user
    $.ajax({
        beforeSend: () => (target.innerHTML = " Sending request...please wait"),
        url: `./actions/reset_chk_user.action.php`,
        data: { email },
        method: "POST",
        success: isFound =>
            isFound
                ? ($(parentElement)
                      .find(".alert")
                      .alert("close"),
                  $("#resetPasswordModal").modal("show"),
                  getSecurityQuestions(email))
                : showFormResponse(
                      parentElement,
                      "danger",
                      "This account is not verified on WeekVest",
                      ""
                  ),
        error: (xhr, status, error) => console.log(error, status, xhr),
        complete: () => (target.innerHTML = innerHTML)
    });
};

const tryPasswordReset = () => {
    let { event } = window,
        { target } = event,
        { parentElement } = target.parentElement.parentElement,
        emailInput = parentElement.querySelector(`input[type="email"]`),
        { value } = emailInput;

    validateEmail(value) === ""
        ? chkForResetUser(target, parentElement, value)
        : showFormResponse(
              parentElement,
              "danger",
              "Enter a valid email address to reset your password",
              ""
          );
};
// const togglePass = eye => {
//     eye.classList.toggle("fa-eye");
//     eye.classList.toggle("fa-eye-slash");
//     let newAttr =
//         eye.parentElement.parentElement.parentElement
//             .querySelector("input")
//             .getAttribute("type") === "password"
//             ? "text"
//             : "password";
//     eye.parentElement.parentElement.parentElement
//         .querySelector("input")
//         .setAttribute("type", newAttr);
// };
