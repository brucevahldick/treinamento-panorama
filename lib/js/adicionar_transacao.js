$(document).ready(function () {

    $("#montante").mask('#.00', {reverse: true})

    function returnCarteiras() {
        var oReq = new XMLHttpRequest();
        oReq.open("GET", "http://localhost/treinamento-panorama/ajax/return_carteiras.php");
        oReq.send();
        oReq.onreadystatechange = (e) => {
            if (oReq.responseText) {
                adicionarOpcoesCarteiras(oReq.responseText)
            }
        }
    }

    returnCarteiras()

    function adicionarOpcoesCarteiras(response) {
        $("#carteira-transacao").empty()
        var data = JSON.parse(response)
        var opcaoSelecionada = window.location.toString().split("?id=")[1]
        data.message.forEach(function (e) {
            var element = document.createElement("option")
            element.value = e.id
            element.innerHTML = e.nome
            $("#carteira-transacao").append(element)
            e.id == opcaoSelecionada ? element.selected = true : element.selected = false
        });
    }

    var selectTipo = document.getElementById("tipo-transacao")
    $(selectTipo).on("change", function () {
        if (selectTipo.value == 2)
            $("#beneficiario").removeClass("desativado")
        else
            $("#beneficiario").addClass("desativado")
    })

    $("#transacao_form").submit(function (e) {
        e.preventDefault()
        $.ajax({
            type: "POST",
            url: 'ajax/inserir_movimentacao.php',
            data: $(this).serialize(),
            success: function (response) {
                var data = JSON.parse(response)
                alert(data.message)
                if (data.status == "success")
                    window.location.href = "home.php?" + window.location.toString().split("?")[1]
            }
        })
    });
});