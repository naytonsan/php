
$(document).ready(function () {

    // Botão Salvar da TABELA 
    $('#addbtn').click(function () {
        var dados = {
            nome: `${$('#addnome')[0].innerHTML}`,
            email: `${$('#addemail')[0].innerHTML}`,
            senha: `${$('#addsenha')[0].innerHTML}`,
        }
        console.log(dados)
        $.ajax({
            url: 'salvar2.php',
            type: 'POST',
            data: dados,
            success: function (response) {
                location.reload();
            }
        }).done(function (msg) {
            console.log(msg[0]);
        });
    })


    // Botão Salvar do modal
    $('#salvar').click(function () {
        var dados = $('#cadUsuario').serialize();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'salvar.php',
            data: dados,
            success: function (response) {
                location.reload();
            }
        });
        return false;
    });

    // Botão deletar
    $('.btn_del').click(function () {
        var dados_teste = {
            id: `${this.id}`
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'deletar.php',
            async: true,
            data: dados_teste,
            success: function (response) {
                location.reload();
            }
        });
    })



    // Botão Atualizar
    $('.btn_update').click(function () {
        var dados = {
            id: `${this.parentElement.parentElement.children["ID_USUARIO"].innerText}`,
            nome: `${this.parentElement.parentElement.children["NOME"].innerText}`,
            email: `${this.parentElement.parentElement.children["EMAIL"].innerText}`,
            senha: `${this.parentElement.parentElement.children["SENHA"].innerText}`,
        }
        $.ajax({
            url: 'atualizar.php',
            type: 'POST',
            data: dados,
            success: function (response) { }
        })
    })



    //// aqui é o script para abrir o nosso pequeno modal
    $("a[rel=modal]").click(function (ev) {
        ev.preventDefault();

        var id = $(this).attr("href");

        var alturaTela = $(document).height();
        var larguraTela = $(window).width();

        //colocando o fundo preto
        $('#mascara').css({
            'width': larguraTela,
            'height': alturaTela
        });
        $('#mascara').fadeIn(1000);
        $('#mascara').fadeTo("slow", 0.8);

        var left = ($(window).width() / 2) - ($(id).width() / 2);
        var top = ($(window).height() / 2) - ($(id).height() / 2);

        $(id).css({
            'top': top,
            'left': left
        });
        $(id).show();
    });

    $("#mascara").click(function () {
        $(this).hide();
        $(".window").hide();
    });

    $('.fechar').click(function (ev) {
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });

});
