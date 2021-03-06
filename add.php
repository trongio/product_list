<?php
namespace app;
?>
<!doctype html>
<html lang="en">
<head>
    <title>Add Product</title>

    <!--Css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!--scripts and js-->
    <script src="https://kit.fontawesome.com/8893af1676.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</head>

<body>
<nav class="navbar-expand-lg navbar-light bg-light">
    <div class="navbar container_wrapper" >
        <a class="navbar-brand" href="/add.php">Product Add</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <button name="save" class="btn btn-outline-success" id="save">Save</button>
            <a class="btn btn-outline-success ml-2" href="/products.php">Cancel</a>
        </div>
    </div>
</nav>

<section class="container">
    <div id="form" class="mt-5 form">

        <div class="form-group row">
            <label class="col-sm-1 col-form-label col-form-label-sm" >SKU</label>
            <div class="col-sm-5">
                <input id="sku" name="sku" type="text" class="form-control mb-2 mr-sm-2" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label col-form-label-sm" >Name</label>
            <div class="col-sm-5">
                <input id="name" name="name" type="text" class="form-control mb-2 mr-sm-2" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label col-form-label-sm" >Price ($)</label>
            <div class="col-sm-5">
                <input id="price" name="price" type="number" step="0.01" min="0" class="form-control mb-2 mr-sm-2" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label col-form-label-sm" >Type</label>
            <div class="col-sm-5">
                <select name="type" class="custom-select my-1 mr-sm-2" id="type">
                    <option id="dvd" selected value="DVD">DVD</option>
                    <option id="book" value="book">Book</option>
                    <option id="furniture" value="furniture">Furniture</option>
                </select>
            </div>
        </div>

        <div id="info">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label col-form-label-sm" >Size (MB)</label>
                <div class="col-sm-5">
                    <input id="data" name="data" type="number" step="0.01" min="0" class="form-control mb-2 mr-sm-2 size" required>
                </div>
            </div>
        </div>


    </div>
    <div id="serverResponse" class="none alert alert-danger" role="alert"></div>
</section>

<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Scandiweb Test assignment</span>
    </div>
</footer>
<div id="serverResponse"></div>
</body>
</html>