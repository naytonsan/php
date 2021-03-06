<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Formulário de usuário</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    Janela Modal:
    <button>
        <a id='btn_novo_usuario' href="#janela1" rel="modal">Novo Usuario</a>
    </button>
    <br><br>
    <div id='aviso'></div>
    <!--        Tabela de exibição dos dados-->
    <div id="table">

        <table border="1px" cellpadding="5px" cellspacing="0">
            <tr>
                <td id='addnome' contenteditable="true">Nome</td>
                <td id='addemail' contenteditable="true">Email</td>
                <td id='addsenha' contenteditable="true">Senha</td>
                <td><button id='addbtn' border="0px">Novo Usuario</button></td>
            </tr>
        </table>
        <br>

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

        <!--  Modal que é aberto ao clicar novo usuario  -->
        <div class="window" id="janela1">
            <a href="#" class="fechar">X Fechar</a>
            <h4>Cadastro de usuario</h4>
            <form id="cadUsuario" action="" method="post">
                <label>Nome:</label><input type="text" name="nome" id="nome" />
                <label>Email:</label><input type="text" name="email" id="email" />
                <label>Senha:</label> <input type="text" name="senha" id="senha" />
                <br /> <br />
                <input type="button" value="Salvar" id="salvar" />
            </form>
        </div>
        <div id="mascara"></div>

    </div>

    <script src="script.js"></script>
</body>

</html>