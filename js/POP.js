//DOM
// const $ = document.querySelector.bind(document);

const resetReceiptUpload = () => (
    $(".done").addClass("d-none"), $("#drop").removeClass("hidden")
);
//APP
let App = {};
App.init = (function() {
    const uploadPaymentReceipt = btn => {
        let formData = new FormData();
        formData.append("receipt", $("input#receiptImage")[0].files[0]);

        // Upload Image
        $.ajax({
            beforeSend: () => (btn.innerHTML = spinner),
            url: "./actions/upload_receipt.action.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: data =>
                data.includes("transaction")
                    ? setTimeout(() => {
                          document
                              .querySelector(".done-receipt")
                              .classList.remove("d-none");
                          document.querySelector(
                              ".done-receipt .transID"
                          ).innerHTML = data;
                      }, 1000)
                    : setTimeout(() => {
                          document
                              .querySelector(".error-receipt")
                              .classList.remove("d-none");
                          document.querySelector(
                              ".error-receipt #uploadReceiptData"
                          ).innerHTML = data;
                      }, 1000),
            error: (a, b, c) =>
                setTimeout(() => {
                    document
                        .querySelector(".error-receipt")
                        .classList.remove("d-none");
                }, 1000),
            complete: () =>
                setTimeout(() => {
                    btn.innerHTML = "Upload";
                    document
                        .querySelector("footer")
                        .classList.remove("hasFiles");
                    document.querySelector("footer").classList.add("d-none");
                }, 500)
        });
    };

    //Init
    function handleFileSelect(evt) {
        const files = evt.target.files; // FileList object

        document.querySelector("footer").classList.remove("d-none");

        //files template
        let template = `${Object.keys(files)
            .map(
                file => `<div class="file file--${file}">
     <div class="name"><span>${files[file].name}</span></div>
     <div class="progress active"></div>
     <div class="done">
	<a href="" target="_blank">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000">
		<g><path id="path" d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M500,967.7C241.7,967.7,32.3,758.3,32.3,500C32.3,241.7,241.7,32.3,500,32.3c258.3,0,467.7,209.4,467.7,467.7C967.7,758.3,758.3,967.7,500,967.7z M748.4,325L448,623.1L301.6,477.9c-4.4-4.3-11.4-4.3-15.8,0c-4.4,4.3-4.4,11.3,0,15.6l151.2,150c0.5,1.3,1.4,2.6,2.5,3.7c4.4,4.3,11.4,4.3,15.8,0l308.9-306.5c4.4-4.3,4.4-11.3,0-15.6C759.8,320.7,752.7,320.7,748.4,325z"</g>
		</svg>
						</a>
     </div>
    </div>`
            )
            .join("")}`;

        document.querySelector("#drop").classList.add("hidden");
        document.querySelector("footer").classList.add("hasFiles");
        document.querySelector(".importar").classList.add("active");
        setTimeout(() => {
            document.querySelector(".list-files").innerHTML = template;

            document
                .querySelector("#receiptUploadBtn")
                .classList.remove("d-none");
        }, 1000);

        Object.keys(files).forEach(file => {
            let load = 2000 + file * 2000; // fake load
            setTimeout(() => {
                document
                    .querySelector(`.file--${file}`)
                    .querySelector(".progress")
                    .classList.remove("active");
                document
                    .querySelector(`.file--${file}`)
                    .querySelector(".done")
                    .classList.add("anim");
            }, load);
        });
    }

    // trigger input
    document.querySelector("#triggerFile") === null
        ? ""
        : document
              .querySelector("#triggerFile")
              .addEventListener("click", evt => {
                  evt.preventDefault();
                  document.querySelector("#receiptImage").click();
              });

    // drop events
    // document.querySelector("#drop") === null
    //     ? ""
    //     : (document.querySelector("#drop").ondragleave = evt => {
    //           document.querySelector("#drop").classList.remove("active");
    //           evt.preventDefault();
    //       });
    // document.querySelector("#drop").ondragover = document.querySelector(
    //     "#drop"
    // ).ondragenter = evt => {
    //     document.querySelector("#drop").classList.add("active");
    //     evt.preventDefault();
    // };
    // document.querySelector("#drop").ondrop = evt => {
    //     document.querySelector("input[type=file]").files =
    //         evt.dataTransfer.files;
    //     document.querySelector("footer").classList.add("hasFiles");
    //     document.querySelector("#drop").classList.remove("active");
    //     evt.preventDefault();
    // };

    //upload more
    document.querySelector(".importar") === null
        ? ""
        : document.querySelector(".importar").addEventListener("click", () => {
              document.querySelector(".list-files").innerHTML = "";
              document.querySelector("footer").classList.remove("hasFiles");
              document.querySelector(".importar").classList.remove("active");
              setTimeout(() => {
                  document.querySelector("#drop").classList.remove("hidden");
                  document
                      .querySelector("#receiptUploadBtn")
                      .classList.add("d-none");
              }, 500);
          });

    // input change
    document.querySelector("#receiptImage") === null
        ? ""
        : document
              .querySelector("#receiptImage")
              .addEventListener("change", handleFileSelect);

    document.querySelector("#receiptUploadBtn") === null
        ? ""
        : document
              .querySelector("#receiptUploadBtn")
              .addEventListener("click", e => uploadPaymentReceipt(e.target));

    document.querySelector("#drop") === null ? "" : document.querySelector("#drop").classList.remove("hidden");

    $("#modalPOP").on("hidden.bs.modal", () => resetReceiptUpload());
})();
