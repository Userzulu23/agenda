<?php
// incluir o conexao na pagina e todo o seu conteudo
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <header> 
        <h1>Agenda de Contatos</h1>

    <nav>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="cadastrar.php">cadastrar</a></li>
        </ul>
    </nav>
    </header>
    <section>
        <h2>lista de contatos</h2>
        <table border="1">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Nascimento</td>
                <td>Endereco</td>
                <td>Telefone</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php
            
            ?>
            </tbody>
        </table>
    </section>
    </body>
    </html>

