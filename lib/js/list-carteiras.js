$(document).ready(function () {
    function requisitarCarteiras() {
        var oReq = new XMLHttpRequest();
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/return_carteiras.php");
        oReq.send();
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                imprimirCarteiras(oReq.responseText)
            }
        }
    }

    requisitarCarteiras();

    function imprimirCarteiras(response) {
        var data = JSON.parse(response)
        $("#carteiras").empty()
        data.message.forEach(function (e) {
            document = $("document")
            var element = document.createElement("div")
            var nome = document.createElement("span")
            var tipo = document.createElement("span")
            nome.innerHTML = e.nome
            tipo.innerHTML = e.tipo
            element.append(nome)
            element.append(tipo)
            element.addEventListener("click", function () {
                window.location.href = "home.php?id=" + e.id
            })
            $("#carteiras").append(element)
        })
    }
});