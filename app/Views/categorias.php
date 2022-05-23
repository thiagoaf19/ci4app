<html>
    <head>
        <title><?php echo $titulo ?></title>
        <style>
            .tabela, .tabela td, .tabela tr {
                border: 1px solid;
            }
        </style>
    </head>
    <body>
        <h2><?php echo $titulo ?></h2>
        <p><?php echo $msg ?></p>
        <p><a href="<?php echo 'http://localhost/ci4app/public/categorias/inserir' ?>">+Inserir Nova Categoria</a></p>
        <table class="tabela">
            <tr>
                <td>Código Categoria</td>
                <td>Nome da Categoria</td>
                <td>Nada</td>
                <td>Nada</td>
            </tr>
            <?php foreach ($categorias as $categoria) : ?> <!-- percorre todas categorias que estão dentro do array categorias -->
            <tr>
                <td><?php echo $categoria->id ?></td> 
                <td><?php echo $categoria->nomecategoria ?></td>
                <td><a href="<?php echo 'http://localhost/ci4app/public/categorias/editar/' . $categoria->id ?>">Editar</a></td>
                <td><a href="<?php echo 'http://localhost/ci4app/public/categorias/eexcluir/' . $categoria->id ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>