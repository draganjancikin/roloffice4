<?php
$user_id = $_SESSION['user_id'];

// brisanje osobine
if($_SERVER["REQUEST_METHOD"] == "GET" AND isset($_GET["delProperty"]) ) {
    $date = date('Y-m-d h:i:s');

    $article_id = htmlspecialchars($_GET["article_id"]);
    $property_id = htmlspecialchars($_GET["property_id"]);

    $article->delArticleProperty($article_id, $property_id);

    die('<script>location.href = "?view&article_id='.$article_id.'" </script>');
}
