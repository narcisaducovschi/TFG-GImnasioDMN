<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness | Tienda</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/cards.css') ?>">

    <style>
        body {
            background-color: #3A3838;
            margin: 0;
            padding: 0;
        }

        section {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        section a {
            flex: 1 1 200px;
            min-width: 200px;
            height: 70px;
            background-color: #F5C400;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
            border: 1px solid #e8c21a;
            transition: all 0.3s ease;
            cursor: pointer;
            box-sizing: border-box;
        }

        section a:hover {
            background-color: #e8c21a;
            transform: scale(1.05);
            z-index: 10;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Estilos para las cards de productos */
        .productos-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            padding: 30px;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- Header Nav -->
    <?= $this->include('partials/header_buscar') ?>
    <?php $grupo = 0 ?>
    <!-- Sección de categorías -->
    <section>
        <a href="?grupo=0">TODOS</a>
        <a href="?grupo=1">SUPLEMENTACION</a>
        <a href="?grupo=2">ACCESORIOS</a>
        <a href="?grupo=3">SNACKS</a>
    </section>

    <!-- Sección productos generados por el controlador -->
    <section class="productos-grid">
        <?php foreach ($productos as $producto): ?>
            <div class="card" data-id="<?= $producto['id'] ?>" data-price="<?= PRODUCTOS_STRIPE[$producto['stripe']] ?>">

                <div class="image-container">
                    <img src="<?= base_url('assets/img/TIENDA/productos/' . $producto['imagen']) ?>">
                </div>

                <div class="info-container">
                    <h2><?= esc($producto['nombre']) ?></h2>
                    <p class="description"><?= esc($producto['descripcion']) ?></p>
                </div>

                <div class="price-section">
                    <span class="price"><?= esc($producto['precio']) ?>€</span>
                </div>

                <button class="add-to-cart">
                    <img src="<?= base_url('assets/img/icons/shopping-cart.svg') ?>">
                    Añadir al carrito
                </button>

            </div>
        <?php endforeach; ?>
    </section>

</body>

</html>