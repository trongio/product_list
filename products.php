<?php
namespace app;
?>
<!doctype html>
<html lang="en">
<head>
    <title>sign up</title>

    <!--Css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!--scripts and js-->
    <script src="https://kit.fontawesome.com/8893af1676.js" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Product list</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>

        <a class="btn btn-outline-success" href="/add.php">add</a>
        <button type="submit" form="form" name="delete" class="btn btn-outline-success ml-2" id="Massdelete">Mass delete</button>

    </div>
</nav>
    <section class="products">
        <div id="productGrid">
            <form action="controllers/ProductController.php" class="grid container" id="form" method="post">
                <?php
                namespace app;

                use app\db\Database;

                require_once __DIR__ . '/db/Database.php';

                $db=new Database();

                $products=$db->getProducts();

                foreach ($products as $product) {
                    if($product["type"]=="DVD"){
                        $before="size:";
                        $after="MB";
                    } elseif ($product["type"]=="book"){
                        $before="weight:";
                        $after="kg";
                    } elseif ($product["type"]=="furniture"){
                        $before="Dimensions:";
                        $after="CM";
                    }
                    echo '
                    <div id="' . $product["id"] . '" class="card" >
                        <div class="card-body">
                            <input type="checkbox" name="checkbox[]" value="' . $product["id"] . '">
                            <div class="card-info">
                                <h3>' . $product["sku"] . '</h3>
                                <h3>' . $product["name"] . '</h3>
                                <h3>' . $product["price"] . ' $</h3>
                                <h3>'. $before. " " .$product["info"]. " " . $after . '</h3>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>
            </form>
        </div>
    </section>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Scandiweb Test assignment</span>
        </div>
    </footer>
    <div id="serverResponse"></div>
</body>
</html>