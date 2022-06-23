$(document).ready(function () {
    function pegarTransacoes() {
        var get = window.location.toString().split("?")
        var oReq = new XMLHttpRequest()
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/getMovimentacoes.php?" + get[1])
        oReq.send()
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                imprimirMovimentacoes(oReq.responseText)
            }
        }
    }

    pegarTransacoes()

    function imprimirMovimentacoes(response) {
        $("#transacoes").empty()
        var data = JSON.parse(response)
        data.message.forEach(function (e) {
            var div = document.createElement("div")
            var beneficiario = document.createElement("span")
            var valor = document.createElement("span")
            var date = document.createElement("span")
            $("#transacoes").append(div)
            div.append(beneficiario)
            div.append(date)
            div.append(valor)
            if (e.beneficiario != null)
                beneficiario.innerHTML = e.beneficiario
            e.tipo == 1 ? valor.innerHTML = "+" : valor.innerHTML = "-"
            valor.innerHTML += "R$ " + e.montante
            date.innerHTML = e.data
        })
    }
})