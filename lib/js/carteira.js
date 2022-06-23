$(document).ready(function () {
    function pegarInfoGeralCarteira() {
        var get = window.location.toString().split("?")
        var oReq = new XMLHttpRequest();
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/info_geral_carteira.php?" + get[1]);
        oReq.send();
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                imprimirInfo(oReq.responseText)
            }
        }
    }

    pegarInfoGeralCarteira()

    function imprimirInfo(response){
        var data = JSON.parse(response)

        $("#valor-total").empty()
        $("#resumo div div").empty()

        var valorTotal = document.createElement("span")
        $("#valor-total").append(valorTotal)
        valorTotal.innerHTML = "Total na Carteira: R$ " + data.message.total

        var despesas = document.createElement("span")
        $("#despesa div").append(despesas)
        despesas.innerHTML = "R$ " + data.message.despesa
        var receitas = document.createElement("span")
        $("#receita div").append(receitas)
        receitas.innerHTML = "R$ " + data.message.receita
    }
})