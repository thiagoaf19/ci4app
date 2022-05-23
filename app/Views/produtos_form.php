<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <h2><?php echo $titulo ?></h2>
        <p><a href="<?php echo 'http://localhost/ci4app/public/produtos' ?>">Voltar para Lista de Produtos</a></p>
        <strong><?php echo $msg ?></strong>
        <?php if($erros != '') : ?> <!-- se variável erros for diferente de vazio -->
            <ul style="color: red;"> <!-- lista mensagens de erro na cor vermelha -->
                <?php foreach ($erros as $erro) : ?> <!-- percorrer variável erro -->
                <li><?php echo $erro ?></li> <!-- item na lista, erro que foi gerado -->
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post"> <!-- condição ternária, utilizamos mesmo form para editar e salvar, salvar coloca vazio e editar vem preenchico com nome do produto -->
            <p>Nome do produto: 
                <input type= "text" name="nomeproduto"
                    value="<?php echo(isset($produto) ? $produto->nomeproduto : '') ?>"  
                />
            </p>
            <p>Valor: 
                <input type= "text" name="valor"
                    value="<?php echo(isset($produto) ? $produto->valor : '') ?>"  
                />
            </p>
            <p>Categoria: 
                <?php echo $comboCategorias ?>
            </p>
            <p><input type="submit" value="<?php echo $acao ?>" />

        </form>
    </body>
</html>