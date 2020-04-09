// JS Document
(function () {
    let usersDiv = $("#usersDiv");

    usersDiv === undefined || usersDiv === null
        ? ""
        : usersDiv.load("./views/loading.view.php", (response, status, xhr) =>
              status === "error"
                  ? console.log(xhr)
                  : usersDiv.load(
                        `./actions/admin/users_get.action.php`,
                        (response, status, xhr) =>
                            status === "error"
                                ? usersDiv.load("./views/not_found.view.php")
                                : ""
                    )
          );
})();

const readAvatarURL = (input) => {
    if (input.files && input.files[0]) {
        let reader = new FileReader(),
            formData = new FormData();
        formData.append("avatar", $("input[name=avatar]")[0].files[0]);

        $.ajax({
            beforeSend: () => {
                reader.onload = (e) =>
                    (document.querySelector(
                        "#imagePreview"
                    ).style.backgroundImage = "url(./img/loading.gif)");
            },
            url: "./actions/upload_avatar.action.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => console.log(data),
            error: (a, b, c) => console.log(a, b, c),
            complete: () => {
                reader.onload = (e) =>
                    (document.querySelector(
                        "#imagePreview"
                    ).style.backgroundImage = "url(" + e.target.result + ")");

                reader.readAsDataURL(input.files[0]);
                getUser();
            },
        });
    }
};

const getInvestments = () => {
    let investmentDiv =
            $("#userInvestmentsModal")[0] === undefined
                ? $("#investmentDiv")
                : $("#userInvestmentsModal").find(".card-columns"),
        e = window.event;

    let userID =
            $("#userInvestmentsModal")[0] === undefined
                ? ""
                : e && e.target === undefined
                ? ""
                : typeof (e && e.target) === "object" &&
                  "status" in (e && e.target)
                ? ""
                : e && e.target.getAttribute("userID"),
        string =
            $("#userInvestmentsModal")[0] === undefined
                ? ""
                : `?investmentUserID=${userID}`,
        investmentDivCompleted = $("#investmentDivCompleted");

    if ($("#userInvestmentsModal")[0] !== undefined) console.log(e && e.target);

    $("#userInvestmentsModal")[0] === undefined
        ? ""
        : userID === ""
        ? ""
        : $("#userInvestmentsModal")
              .find(".userName")
              .html(e && e.target.parentElement.querySelector("h4").innerHTML);

    investmentDiv.load("./views/loading.view.php", (response, status, xhr) => {
        if (status === "error") {
            console.log(xhr);
        } else {
            investmentDiv.load(
                `./actions/investment_get.action.php${string}`,
                (response, status, xhr) => {
                    if (status === "error") {
                        investmentDiv.load("./views/not_found.view.php");
                    } else {
                        // drawLineGraphs();
                    }
                }
            );
        }
    });

    investmentDivCompleted.load(
        "./views/loading.view.php",
        (response, status, xhr) => {
            if (status === "error") {
                console.log(xhr);
            } else {
                investmentDivCompleted.load(
                    `./actions/investment_get_completed.action.php`,
                    (response, status, xhr) => {
                        if (status === "error") {
                            investmentDivCompleted.load(
                                "./views/not_found.view.php"
                            );
                        } else {
                            // drawLineGraphs();
                        }
                    }
                );
            }
        }
    );
};

const getTransactions = () => {
    let transactionsDiv =
            $("#userTransactionsModal")[0] === undefined
                ? $("#completedTransactionsDiv")
                : $("#userTransactionsModal").find(
                      ".card-columns.user-transactions-completed"
                  ),
        pendingTransactionsDiv =
            $("#userTransactionsModal")[0] === undefined
                ? $("#pendingTransactionsDiv")
                : $("#userTransactionsModal").find(
                      ".card-columns.user-transactions-pending"
                  ),
        e = window.event,
        userID =
            $("#userTransactionsModal")[0] === undefined
                ? ""
                : e && e.target === undefined
                ? ""
                : typeof (e && e.target) === "object" &&
                  "status" in (e && e.target)
                ? ""
                : e && e.target.getAttribute("userID"),
        string =
            $("#userTransactionsModal")[0] === undefined
                ? ""
                : `?transactionUserID=${userID}`;
    $("#userTransactionsModal")[0] === undefined
        ? ""
        : userID === ""
        ? ""
        : $("#userTransactionsModal")
              .find(".userName")
              .html(e && e.target.parentElement.querySelector("h4").innerHTML);

    if (pendingTransactionsDiv !== null) {
        pendingTransactionsDiv.load(
            "./views/loading.view.php",
            (response, status, xhr) =>
                status === "error"
                    ? console.log(xhr)
                    : pendingTransactionsDiv.load(
                          `./actions/transactions_get.action.php?pending=${string.replace(
                              "?",
                              "&"
                          )}`,
                          (response, status, xhr) =>
                              status === "error"
                                  ? pendingTransactionsDiv.load(
                                        "./views/not_found.view.php"
                                    )
                                  : ""
                      )
        );
    }

    if (transactionsDiv !== null) {
        transactionsDiv.load(
            "./views/loading.view.php",
            (response, status, xhr) => {
                if (status === "error") {
                    console.log(xhr);
                } else {
                    transactionsDiv.load(
                        `./actions/transactions_get.action.php${string}`,
                        (response, status, xhr) => {
                            if (status === "error") {
                                transactionsDiv.load(
                                    "./views/not_found.view.php"
                                );
                            }
                        }
                    );
                }
            }
        );
    }
};

const populateSecurityQuestions = (questions, select) => {
    for (i = select.options.length - 1; i > 0; i--) {
        select.options[i] = null;
    }
    for (let i = 0; i < questions.length; i++) {
        let opt = document.createElement("option");
        opt.appendChild(document.createTextNode(questions[i]));
        opt.value = questions[i];
        select.appendChild(opt);
    }

    select.parentElement.parentElement.parentElement.classList.remove("d-none");
};

const editSecurityQuestions = (securitySelect, item, i) => {
    let e = window.event,
        { target } = e,
        unoSelect = securitySelect[0],
        unoSelectOptions = [...unoSelect.querySelectorAll("option")],
        questions = unoSelectOptions
            .map((a) =>
                a.innerHTML !== "Select one question" ? a.innerHTML : ""
            )
            .filter((item) => item !== "" && item !== undefined);

    for (let index = 0; index < i + 1; index++) {
        questions = questions.filter(
            (item) => item !== securitySelect[index].value
        );
    }

    populateSecurityQuestions(questions, securitySelect[i + 1]);
    i === 1 ? $(".questions-submit").removeClass("d-none") : "";
};

const tryWithdraw = () => {
    let { event } = window,
        { target } = event,
        id = target.getAttribute("data-id"),
        { innerHTML } = target;

    // Ajax to search for bank details
    $.ajax({
        beforeSend: () => (target.innerHTML = spinner),
        url: `./actions/bank_details_get.action.php`,
        data: { id },
        method: "POST",
        success: (isFound) =>
            isFound
                ? $("#withdrawModal").modal("show")
                : $("#updateBankDetailsModal").modal("show"),
        error: (xhr, status, error) => console.log(error, status, xhr),
        complete: () => (target.innerHTML = innerHTML),
    });
};

let securitySelect = [...document.querySelectorAll(".question-security")];
securitySelect.forEach((item, i) =>
    item.addEventListener("change", () =>
        i < 2 ? editSecurityQuestions(securitySelect, item, i) : ""
    )
);

document.querySelector("#dashboardMenuToggle") === null
    ? ""
    : document
          .querySelector("#dashboardMenuToggle")
          .addEventListener("click", () =>
              document.querySelector("#userSide").classList.toggle("d-none")
          );

window.addEventListener("resize", () =>
    window.innerWidth < 768
        ? ""
        : document.querySelector("#userSide") === null
        ? ""
        : document.querySelector("#userSide").classList.remove("d-none")
);

$(".avatar-upload").submit(function (e) {
    e.preventDefault();
});

getInvestments();
getTransactions();

document.querySelector("#imageUpload") === null
    ? ""
    : document
          .querySelector("#imageUpload")
          .addEventListener("change", function () {
              readAvatarURL(this);
          });

const restrictWithdrawAmount = () => {
    let e = window.event,
        input = e.target,
        walletBalance = Number(input.getAttribute("max")),
        amountToWithdraw = Number(input.value);

    input.value =
        amountToWithdraw > walletBalance ? walletBalance : amountToWithdraw;
};

// TransID picture display
const displayTransIDImage = () => {
    let e = window.event,
        transIDField = e.target,
        transID = transIDField.value,
        form =
            transIDField.parentElement.parentElement.parentElement
                .parentElement,
        fundID = form.querySelector("#fundID").value;

    $.ajax({
        url: `./actions/admin/admin_get_image.action.php`,
        data: { transID },
        method: "POST",
        success: (imgName) =>
            $("#fundReceipt img").attr(
                "src",
                `./img/uploads/receipts/${fundID}/${imgName}`
            ),
        error: (xhr, status, error) => console.log(error, status, xhr),
    });
};
