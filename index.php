<?php
// incluir o conexao na pagina e todo o seu conteudo
include 'conexao.php';
include_once 'funcoes.php';

if (isset($GET['acao']) && $_GET['acao'] == 'excluir') {
    
    $id = $_get['id'];

    if ($id > 0) {
        //abrir a conexão com o banco
        $conexaoComBanco =abrirBanco();
        //Preparar um SQL de Exclusão
        $sql = "DELETE FROM pessoas WHERE id = $id";
        //executar comando no banco
        if($conexaoComBanco->query($sql) === TRUE) {
            echo "Contato excluido com sucesso! :)";
         } else{
             echo"contato nao excluido";
            } 
        }
        fecharBanco($conexaoComBanco);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="index.css">
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
                //Abrir a conexão com o banco de dados
                $conexaoComBanco = abrirBanco();
                //Preparar a consulta SQL para selecionar os dados no BD
                $query = "SELECT id, nome, sobrenome, nascimento, endereco, telefone FROM pessoas";
                //Executar a query (o sql no banco)
                $result = $conexaoComBanco->query($query);
                //$registros = $result->fetch_assoc();

                //Verificar se a query retornou registros
                if ($result->num_rows > 0) {
                    //tem registro no banco
                    while($registro = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $registro['id']?></td>
                            <td><?php echo $registro['nome']?></td>
                            <td><?php echo $registro['sobrenome']?></td>
                            <td><?= date("d/m/Y", strtotime($registro['nascimento']))?></td>
                            <td><?php echo $registro['endereco']?></td>
                            <td><?php echo $registro['telefone']?></td>
                            <td>
                                <a href="editar.php?acao=editar&id=<?=$registro['id'] ?>"><button>Editar</button></a>
                                <a href="$acao=excluir$id=<?=$registro['id'] ?>"
                                onclick="return confirm('tem certeza que deseja excluir');"><button>Excluir</button></a>
                            </td>
                        </tr>
                        <?php
                    }



                } else {
                    ?>
                    <tr>
                    //nao tem registro no banco
                    echo("<tr><td-colspan='7'>Nenhum Registro Salvo no banco de dados</td></tr>");
                    <tr>
                    <?php
                }
                //Criar um laço de repetição para preencher a tabela
            ?>
            </tbody>
        </table>
    </section>
    </body>
    </html>

