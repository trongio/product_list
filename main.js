window.onload = function () {
    const selectElement = document.querySelector("#type");

    selectElement.addEventListener('change', (event) => {
        const result = document.querySelector("#info");

        if (selectElement.value==="DVD") {
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Size (MB)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"size\" type=\"number\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>"
        } else if(selectElement.value==="book"){
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Weight (KG)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"weight\" type=\"number\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>"
        }else if(selectElement.value==="furniture"){
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Height (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"height\" type=\"number\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Width (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"width\" type=\"number\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Length (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"length\" type=\"number\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>"
        }
    });
}