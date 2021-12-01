<?php
use Akihiko64\Blog\models\Post;
require_once "../blog/config.php";
$artigo = new Post($mysql);
$artigos = $artigo->getAllPosts();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo): ?>
            <h2>
                <a href="artigo.php?id=<?= $artigo["id"] ?>">
                    <?php echo $artigo["titulo"]; ?>
                </a>
            </h2>
            <p>
                <?php echo nl2br($artigo["conteudo"]); ?>
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>