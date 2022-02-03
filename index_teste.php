<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulário de usuário</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" type="text/javascript"></script>

    <script>
    </SCRIPT>

    <style>
        label {
            display: block;
        }

        .window {
            display: none;
            width: 200px;
            height: 300px;
            position: absolute;
            left: 0;
            top: 0;
            background: #FFF;
            z-index: 9900;
            padding: 10px;
            border-radius: 10px;
        }

        #mascara {
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #000;
        }

        .fechar {
            display: block;
            text-align: right;
        }
    </style>
</head>

<body>
    <a href="#janela1" rel="modal">Novo Usuario</a>
    <!--        Tabela de exibição dos dados-->
    <div id="table">

        <table border="1px" cellpadding="5px" cellspacing="0">
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Senha</td>
                <td>config</td>
            </tr>

            <?php

            //Chama do bd
            include_once dirname(__FILE__) . '\conexao.php';
            // Select que traz todos os usuario cadastrados no banco de dados
            $select = "SELECT * FROM USUARIO";

            $result = mysqli_query($con, $select);
            $selecao = mysqli_fetch_all($result);


            //Enquanto existir usuários no banco ele insere uma nova linha e exibe os dados
            foreach ($selecao as $linha) {
            ?>
                <tr>
                    <td name='ID_USUARIO'><?php echo $linha[0] ?></td>
                    <td contenteditable="true" name='NOME'><?php echo $linha[1] ?></td>
                    <td contenteditable="true" name='EMAIL'> <?php echo $linha[2] ?></td>
                    <td contenteditable="true" name='SENHA'><?php echo $linha[3] ?></td>
                    <td>
                        <button id="<?php echo $linha[0] ?>" class="btn_del" type="button">Deletar </button>
                        <button id="<?php echo 'update_' . $linha[0] ?>" class="btn_update" type="button">Atualizar </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <!--            Modal que é aberto ao clicar novo usuario-->
        <div class="window" id="janela1">
            <a href="#" class="fechar">X Fechar</a>
            <h4>Cadastro de usuario</h4>
            <form id="cadUsuario" action="" method="post">
                <label>Nome:</label><input type="text" name="nome" id="nome" />
                <label>Email:</label><input type="text" name="email" id="email" />
                <label>Senha:</label> <input type="text" name="senha" id="senha" />
                <br /><br />
                <input type="button" value="Salvar" id="salvar" />
            </form>
        </div>
        <div id="mascara"></div>
    </div>



</body>

</html>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {


        // Botão Salvar FUNCIONANDO
        $('#salvar').click(function() {
            var dados = $('#cadUsuario').serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'salvar.php',
                async: true,
                data: dados,
                success: function(response) {
                    location.reload();
                }
            });
            return false;
        });

        // Botão deletar FUNCIONANDO
        $('.btn_del').click(function() {
            var dados_teste = {
                id: `${this.id}`
            }

            $.ajax({

                type: 'POST',
                dataType: 'json',
                url: 'deletar.php',
                async: true,
                data: dados_teste,
                success: function(response) {
                    location.reload();
                }
            });
        })



        // Esse botão que eu não estou coneguindo fazer funcionar
        $('.btn_update').click(function() {
            var dados = {
                id: `${this.parentElement.parentElement.children["ID_USUARIO"].innerText}`,
                nome: `${this.parentElement.parentElement.children["NOME"].innerText}`,
                email: `${this.parentElement.parentElement.children["EMAIL"].innerText}`,
                senha: `${this.parentElement.parentElement.children["SENHA"].innerText}`,
            }
            // console.log(this.parentElement.parentElement.children["ID_USUARIO"].innerText)
            // console.log(this.parentElement.parentElement.children["NOME"].innerText)
            // console.log(this.parentElement.parentElement.children["EMAIL"].innerText)
            // console.log(this.parentElement.parentElement.children["SENHA"].innerText)

            // console.log(dados)

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'script.php',
                async: true, // isso aqui serve pra que ?
                data: {
                    data: dados
                },
                success: function(response) {
                    console.log(response)
                }

            })



        })



        //// aqui é o script para abrir o nosso pequeno modal
        $("a[rel=modal]").click(function(ev) {
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

        $("#mascara").click(function() {
            $(this).hide();
            $(".window").hide();
        });

        $('.fechar').click(function(ev) {
            ev.preventDefault();
            $("#mascara").hide();
            $(".window").hide();
        });

    });
</script>