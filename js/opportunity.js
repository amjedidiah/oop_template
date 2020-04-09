const getOpportunities = () => {
    let opportunityDiv = $("#opportunitiesDiv");

    if (opportunityDiv === undefined || opportunityDiv === null) {
    } else {
        let data = getUrlVars(),
            str = Object.entries(data)
                .map(
                    (entry, i) =>
                        `${i === 0 ? "?" : "&"}${entry[0]}=${entry[1]}`
                )
                .toString();

        [...document.querySelectorAll(".opportunity-filter")].forEach(
            (item) => {
                let filterValue = item.getAttribute("data-filter");
                Object.values(getUrlVars()).includes(filterValue)
                    ? makeFilterActive(item, filterValue)
                    : item.classList.remove("active");
            }
        );

        opportunityDiv.load(
            "./views/loading.view.php",
            (response, status, xhr) => {
                if (status === "error") {
                    console.log(xhr);
                } else {
                    opportunityDiv.load(
                        `./actions/opportunities_get.action.php${str}`,
                        (response, status, xhr) => {
                            if (status === "error") {
                                opportunityDiv.load(
                                    "./views/not_found.view.php"
                                );
                            } else {
                                [
                                    ...document.querySelectorAll(
                                        "form.opportunityFormUpdate"
                                    ),
                                ].forEach((form) => {
                                    if (form !== undefined) {
                                        // Set select values for opportunity edit
                                        [
                                            ...form.querySelectorAll("select"),
                                        ].forEach((select) =>
                                            setSelectValue(select, "")
                                        );

                                        // Update dates
                                        [
                                            ...form.querySelectorAll("input"),
                                        ].forEach((input) => {
                                            input
                                                .getAttribute("id")
                                                .includes("date") ||
                                            input
                                                .getAttribute("id")
                                                .includes("Date")
                                                ? (input.value = formatDate(
                                                      input.getAttribute(
                                                          "value"
                                                      )
                                                  ))
                                                : "";
                                        });

                                        // Make name(unique DB value readonly)
                                        form.querySelector(
                                            "#opportunityName"
                                        ).setAttribute("required", "required");

                                        form.querySelector(
                                            "#opportunityName"
                                        ).setAttribute("readonly", "readonly");
                                    }
                                });

                                let active = getUrlVars()["active"];
                                active === undefined
                                    ? ""
                                    : $(`#opportunityModal${active}`).modal(
                                          "show"
                                      );

                                document.querySelector("#opportunityMarker") ===
                                null
                                    ? ""
                                    : document
                                          .querySelector("#opportunityMarker")
                                          .focus();
                            }
                        }
                    );
                }
            }
        );
    }
};

const makeFilterActive = (item, filterValue) => {
    let parent = item.parentElement,
        wasActive = [...item.classList].includes("active");

    [...parent.querySelectorAll(".opportunity-filter")].forEach((element) =>
        element.classList.remove("active")
    );

    item.classList.add("active");
};

const filterOpportunity = (item) => {
    let parent = item.parentElement,
        param = [...parent.classList].join("").includes("category")
            ? "category"
            : "duration",
        val = item.getAttribute("data-filter");

    let url = new URL(window.location.href),
        query_string = url.search,
        search_params = new URLSearchParams(query_string),
        urlParams = Object.entries(getUrlVars()),
        urlParamsArray = urlParams.map((item) => item[0]);

    switch (urlParams.length) {
        case 0:
            search_params.append(param, val);
            break;
        default:
            urlParams.forEach((element) =>
                !urlParamsArray.includes(element[0])
                    ? search_params.append(param, val)
                    : val === getUrlVars()[element[0]]
                    ? search_params.delete(element[0])
                    : search_params.set(param, val)
            );
            break;
    }

    url.search = search_params.toString();
    new_url = url.toString();

    history.pushState(null, null, new_url);
    getOpportunities();
};

const ifWalletIsDeficient = (
    resulting,
    resultingInfo,
    btnPay,
    btnFund,
    walletMax
) => {
    resulting.classList.add("border-danger");
    resultingInfo.innerHTML = `You have only ₦ ${walletMax} in your wallet which is not sufficient for this transaction`;
    btnPay.classList.add("d-none");
    btnFund.classList.remove("d-none");
};

const ifWalletIsSufficient = (
    resulting,
    resultingInfo,
    btnPay,
    btnFund,
    total
) => {
    resulting.classList.remove("border-danger");
    resultingInfo.innerHTML = "";
    btnFund.classList.add("d-none");

    total > 0
        ? btnPay.classList.remove("d-none")
        : [...btnPay.classList].join().includes("d-none")
        ? ""
        : btnPay.classList.add("d-none");
};

const opportunityCost = (price) => {
    let target = window.event.target,
        max = Number(target.getAttribute("max")),
        form = target.parentElement.parentElement.parentElement.parentElement,
        btnPay = form.querySelector(".btn-pay"),
        btnFund = form.querySelector(".btn-fund"),
        resulting = form.querySelector(".opportunity-units-total-cost"),
        resultingInfo = resulting.parentElement.querySelector("small"),
        value = Number(target.value),
        walletMax = Number(resulting.getAttribute("max"));

    value = value > max ? max : value;
    let total = value * price;

    resulting.value = total;

    if (value === max) target.value = value;

    walletMax < total
        ? ifWalletIsDeficient(
              resulting,
              resultingInfo,
              btnPay,
              btnFund,
              walletMax
          )
        : ifWalletIsSufficient(
              resulting,
              resultingInfo,
              btnPay,
              btnFund,
              total
          );
};

$(".opportunity-filter").click((e) => filterOpportunity(e.target));
