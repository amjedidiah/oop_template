const headerConfig = () => {
    let header = document.querySelector("#header"),
        headerIMG = header.querySelector("img"),
        elementOffset = $("#header").offset().top,
        detOffset = $("#headerDet").offset().top,
        width = 200;

    window.location.href.includes("auth")
        ? ""
        : elementOffset >= detOffset - 50
        ? (header.classList.add("bg-white", "shadow-sm"), (width = 150))
        : (header.classList.remove("bg-white", "shadow-sm"), (width = 200));

    headerIMG.setAttribute("width", width);
};
