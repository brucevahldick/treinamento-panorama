$(document).ready(function () {
    $('#form-carteira').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'ajax/newCarteira.php',
            data: $(this).serialize(),
            success: function (response) {
                var data = JSON.parse(response);
                alert(data.message);
                if (data.status == "success")
                    window.location.href = "selecionar_carteira.php"
            }
        });
    });

    function requisitarTipos() {
        var oReq = new XMLHttpRequest();
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/tipos_carteira.php");
        oReq.send();
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                imprimirCarteiras(oReq.responseText)
            }
        }
    }

    requisitarTipos();

    function imprimirCarteiras(response) {
        var data = JSON.parse(response)
        $("#tipos-carteira").empty()
        data.message.forEach(function (e) {
            document = $("document")
            var option = document.createElement("option")
            option.value = e
            option.innerHTML = e
            $("#tipos-carteira").append(option)
        })
    }
});