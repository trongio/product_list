window.onload = function () {
    const selectElement = document.querySelector("#type");

    selectElement.addEventListener('change', (event) => {
        const result = document.querySelector("#info");

        if (selectElement.value==="DVD") {
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Size (MB)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input id='data' name=\"data\" type=\"number\" step=\"0.01\" min=\"0\" class=\"form-control mb-2 mr-sm-2 size\" required>\n" +
                "      </div>\n" +
                " </div>"
        } else if(selectElement.value==="book"){
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Weight (KG)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input id='data' name=\"data\" type=\"number\" step=\"0.01\" min=\"0\" class=\"form-control mb-2 mr-sm-2 weight\" required>\n" +
                "      </div>\n" +
                " </div>"
        }else if(selectElement.value==="furniture"){
            result.innerHTML = "" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Height (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"height\" id=\"height\" type=\"number\" step=\"0.01\" min=\"0\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Width (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"width\" id=\"width\" type=\"number\" step=\"0.01\" min=\"0\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>" +
                "<div class=\"form-group row\">\n" +
                " <label class=\"col-sm-1 col-form-label col-form-label-sm\" >Length (CM)</label>\n" +
                "     <div class=\"col-sm-5\">\n" +
                "          <input name=\"length\" id=\"length\" type=\"number\" step=\"0.01\" min=\"0\" class=\"form-control mb-2 mr-sm-2\" required>\n" +
                "      </div>\n" +
                " </div>" +
                "<input type=\"hidden\" id=\"data\" name=\"data\">"
        }
    });
}

function concatenateDimension(){
    if (document.getElementById('width')){
        let data = document.getElementById('data');
        let width = document.getElementById('width').value;
        let heigth = document.getElementById('height').value;
        let length = document.getElementById('length').value;
        data.value = heigth + 'x' + width + 'x' + length;
    }
}


$(document).ready(function (){
    $("#save").click(function (){
        concatenateDimension()
        if (document.getElementsByClassName("size")[0]){
            var size=document.getElementsByClassName("size")[0].value.trim();

        } else {
            size = "size";
        }
        if(document.getElementsByClassName("weight")[0]){
            var weight=document.getElementsByClassName("weight")[0].value.trim();

        } else {
            weight = "weight";
        }
        var datastring= {
            "size": size,
            "weight": weight,
            "height": $("#height")[0] ? $("#height").val().trim() : "height",
            "width": $("#width")[0] ? $("#width").val().trim() : "width",
            "length": $("#length")[0] ? $("#length").val().trim() : "length",
            "sku": $("#sku").val().trim(),
            "name": $("#name").val().trim(),
            "price": $("#price").val().trim(),
            "type": $("#type").val().trim(),
            "data": $("#data").val().trim()
        }
        $.ajax({
            type:"POST",
            url: "controllers/AddController.php",
            data:datastring,
            success: function (result){
                if(result==="success"){
                    window.location.replace("/products.php");
                }
                else {
                    var alertDanger=document.getElementById('serverResponse');
                    alertDanger.innerHTML=result;
                    alertDanger.classList.remove('none');
                    setTimeout(function (){
                        alertDanger.classList.add('none');
                    },5000);
                }
            }
        })
    })
})