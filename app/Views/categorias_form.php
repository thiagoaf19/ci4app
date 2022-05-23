<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>

    <body>
        <h2><?php echo $titulo ?></h2>
        <p><a href="<?php echo 'http://localhost/ci4app/public/categorias' ?>">Voltar para Lista de Categorias</a></p>
        <strong><?php echo $msg ?></strong>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo(isset($categoria) ? $categoria->id : '') ?>" />
            <p>Nome da categoria: 
                <input type= "text" name="nomecategoria"
                    value="<?php echo (isset($categoria) ? $categoria->nomecategoria : '') ?>"     
                />
            </p>

            <p><input type="submit" value="<?php echo $acao ?>" />
        </form>
    </body>

</html>