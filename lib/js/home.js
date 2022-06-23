$(document).ready(function () {
    function pegarInfoCarteira() {
        var get = window.location.toString().split("?")
        var oReq = new XMLHttpRequest();
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/getCarteiraById.php?" + get[1]);
        oReq.send();
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                imprimirCarteira(oReq.responseText)
            }
        }
    }

    pegarInfoCarteira()

    function imprimirCarteira(response) {
        $("#carteira").empty()
        var data = JSON.parse(response)
        var titulo = document.createElement("span")
        var valor = document.createElement("span")
        var tipo = document.createElement("span")
        var div = document.createElement("div")
        $("#carteira").append(div)
        div.append(titulo)
        div.append(tipo)
        $("#carteira").append(valor)
        titulo.innerHTML = data.message.nome
        valor.innerHTML = "R$ " + data.message.valorTotal
        tipo.innerHTML = data.message.tipo
    }

    function pegarTransacoes() {
        var get = window.location.toString().split("?")
        var oReq = new XMLHttpRequest()
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/getMovimentacoes.php?" + get[1] + "&limit=4")
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
});