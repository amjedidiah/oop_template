window.onload = () => {
    const locationHREF = window.location.href,
        screenBtn = document.querySelector(".screen-button"),
        leftScreen = document.querySelector("#leftScreen"),
        leftScreenRow = document.querySelector("#leftScreenRow"),
        rightScreen = document.querySelector("#rightScreen");

    // Slide to show login
    locationHREF.split("action=")[1] === "login"
        ? registerInteract(screenBtn, leftScreen, leftScreenRow, rightScreen)
        : "";

    // Slide on click
    screenBtn === null
        ? ""
        : [...document.querySelectorAll(".screen-button")].forEach((item) =>
              item.addEventListener("click", (e) => {
                  e.preventDefault();
                  registerInteract(
                      e.target,
                      leftScreen,
                      leftScreenRow,
                      rightScreen
                  );
              })
          );

    document.querySelector("[class*='fa-eye']") === null
        ? ""
        : [...document.querySelectorAll("[class*='fa-eye']")].forEach((item) =>
              item.addEventListener("click", (e) => togglePass(e.target))
          );

    headerConfig();

    formSelection();

    $(".toast").toast("show"); //Enable all toasts

    getUser();
    getBankDetails();
    getOpportunities();
    showFundWalletModal();
};

window.onscroll = () => {
    headerConfig(); //Header.js
};

const host = window.location.host.includes("localhost")
        ? `localhost/${window.location.pathname.split("/")[1]}`
        : window.location.host,
    baseURL = `http://${host}/actions/`,
    formSelection = () =>
        $("form").on(
            "submit",
            (e) => (e.preventDefault(), formSubmit(e.target, baseURL))
        );

const getSecurityQuestions = (email) =>
    $.ajax({
        url: `./actions/user_get_questions.action.php`,
        method: "POST",
        data: { email },
        success: (questions) =>
            !ifJSONData(questions)
                ? console.log(questions)
                : JSON.parse(questions).length < 1
                ? console.log(questions)
                : updateQuestionsForm(JSON.parse(questions), email),
        error: (xhr, status, error) => console.log(error, status, xhr),
    });

const getUser = () =>
    $.ajax({
        url: `./actions/user_get.action.php`,
        success: (user) =>
            ifJSONData(user)
                ? refreshFunc(JSON.parse(user))
                : console.log(user),
        error: (xhr, status, error) => console.log(error, status, xhr),
        complete: () => getSecurityQuestions(""),
    });

const getBankDetails = () => {
    let bankDetailsDiv = $("#bankDetailsDiv");

    if (bankDetailsDiv !== undefined) {
        let userID = bankDetailsDiv.attr("data-id"),
            string = `?userID=${userID}`;

        bankDetailsDiv.load(
            "./views/loading.view.php",
            (response, status, xhr) => {
                status === "error"
                    ? console.log(xhr)
                    : bankDetailsDiv.load(
                          `./actions/bank_details_get.action.php${string}`,
                          (response, status, xhr) =>
                              status === "error"
                                  ? bankDetailsDiv.load(
                                        "./views/not_found.view.php"
                                    )
                                  : ""
                      );
            }
        );
    }
};

const refreshFunc = (user) => {
    if (user !== null) {
        updateGetStartedName(`${user.fname} ${user.lname}`);
        updateProfileForm(user);

        $("wallet-balance") === undefined
            ? ""
            : $(".wallet-balance").html(addComma(user.wallet));
    }
};

const updateGetStartedName = (name) => $(".get-started-name").html(name);

const formatDate = (date) => {
    // let d = new Date(date),
    //     month = "" + (d.getMonth() + 1),
    //     day = "" + d.getDate(),
    //     year = d.getFullYear();

    // if (month.length < 2) month = "0" + month;
    // if (day.length < 2) day = "0" + day;

    // return [year, month, day].join("-");

    let now = new Date(date),
        day = ("0" + now.getDate()).slice(-2),
        month = ("0" + (now.getMonth() + 1)).slice(-2),
        today = now.getFullYear() + "-" + month + "-" + day;

    return today;
};

const updateProfileForm = (user) => {
    let form = document.querySelector(
            `form[action="profile_update.action.php"]`
        ),
        randId = randDigits(5),
        avatarSRC =
            user.avatar === ""
                ? `./img/user.png?rand=${randId}`
                : `${user.avatar.substring(1)}?rand=${randId}`,
        urlAvatarSRC = `url(${avatarSRC})`;

    if (form !== null) {
        form.querySelector("#profileFirstName").value = user.fname;
        form.querySelector("#profileLastName").value = user.lname;
        form.querySelector("#profileGender").value = user.gender;
        form.querySelector("#profileDOB").value = formatDate(user.dob);

        form.querySelector("#registerState").value = user.state;
        form.querySelector("#registerState").onchange();
        form.querySelector("#registerLGA").value = user.lga;

        form.querySelector("#profilePhone").value = user.phone;
        form.querySelector("#profileEmail").value = user.email;
        $("#imagePreview").css("backgroundImage", urlAvatarSRC);
        $(".img-user").attr("src", avatarSRC);
    }
};

const setSelectValue = (select, value) => {
    let val = select.getAttribute("value");
    if (select.nodeName && select.nodeName.toLowerCase() === "select") {
        let opt = document.createElement("option");
        opt.appendChild(document.createTextNode(value));
        opt.value = value;
        select.options.length > 1 ? "" : select.appendChild(opt);
    }
    select.value = value !== "" ? value : val;
};

const updateQuestionsForm = (questions, email) => {
    let form = document.querySelector(`form#userQuestions`);

    if (form !== null) {
        setSelectValue(form.querySelector("#question1"), questions[0].question);
        setSelectValue(form.querySelector("#question2"), questions[1].question);
        setSelectValue(form.querySelector("#question3"), questions[2].question);

        if (
            form.querySelector("#question1").nodeName.toLowerCase() === "select"
        ) {
            form.querySelector("#answer1").value = questions[0].answer;
            form.querySelector("#answer2").value = questions[1].answer;
            form.querySelector("#answer3").value = questions[2].answer;
        } else {
            form.querySelector("#resetEmail").value = email;
        }
    }
};

const getUrlVars = () => {
    let vars = {},
        parts = window.location.href.replace(
            /[?&]+([^=&]+)=([^&]*)/gi,
            (m, key, value) => (vars[key] = value)
        );
    return vars;
};

const showFundWalletModal = () =>
    getUrlVars()["action"] === "wallet_fund"
        ? $("#fundModal").modal("show")
        : "";

const spinner = `<i class="fas fa-spinner fa-pulse"></i>`;

const modalSubmit = () => {
    let { event } = window,
        { target } = event,
        form =
            target.parentElement.nodeName.toLowerCase() === "form"
                ? target.parentElement
                : target.parentElement.parentElement;
    event.preventDefault();

    formSubmit(form, baseURL);
};

const ifJSONData = (data) => {
    let dataArray = data.split(""),
        dataArrayLength = dataArray.length,
        dataArrayIndexLength = dataArrayLength - 1;

    return typeof data === "string" &&
        ((dataArray[0] === "{" && dataArray[dataArrayIndexLength] === "}") ||
            (dataArray[0] === "[" && dataArray[dataArrayIndexLength] === "]"))
        ? true
        : false;
};

const reverse = (str) => {
    let reversed = "";
    for (let char of str) {
        reversed = char + reversed;
    }
    return reversed;
};

const split = (input, len) =>
    input.match(
        new RegExp(
            ".{1," + len + "}(?=(.{" + len + "})+(?!.))|.{1," + len + "}$",
            "g"
        )
    );

const addComma = (number) => split(number.toString(), 3).join(",");

const setAttributes = (el, attrs) => {
    for (var key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
};

const randDigits = (length) => {
    let result = "",
        characters =
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
        charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(
            Math.floor(Math.random() * charactersLength)
        );
    }
    return result;
};

(function () {
    let urlGetObject = getUrlVars();
    if ("active" in urlGetObject) {
        const keyword = `#pills-${urlGetObject["active"]}`,
            linkToActivate = $(`${keyword}-tab`),
            tabToActivate = $(keyword);

        if (linkToActivate !== undefined) {
            $(".nav-link").removeClass("active");
            linkToActivate.addClass("active");

            $(".tab-pane").removeClass("active show");
            tabToActivate.addClass("active show");
        }
    }
})();

(function () {
    let yt = null;
    $.ajax({
        url: `./actions/stats.action.php`,
        success: (data) => {
            data = ifJSONData(data) ? JSON.parse(data) : data;

            $(".totalInvestments").html(data[0]);
            $(".totalInvestors").html(data[1]);
            // $(".totalAccounts").html(data[2]);

            var date = new Date(data[3] * 1000).toLocaleDateString("en-GB", {
                day: "numeric",
                month: "short",
                year: "numeric",
            });

            $(".lastDeposit").html(date);
            $(".totalDeposit").html(`₦ ${addComma(data[4])}`);
        },
        error: (xhr, status, error) => console.log(error, status, xhr),
        complete: () => {
            // Counter on ABout us page
        },
    });
})();

(function () {
    let { r3s3tc0d3 } = getUrlVars();
    r3s3tc0d3 === undefined
        ? ""
        : $.ajax({
              url: `./actions/reset_get_user.action.php`,
              data: { r3s3tc0d3 },
              method: "POST",
              success: (email) => $("#resetEmail").val(email),
              error: (xhr, status, error) => console.log(error, status, xhr),
          });
})();
