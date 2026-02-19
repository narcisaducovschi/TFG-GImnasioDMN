<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda/buscar</title>


     <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <?= $this->include('partials/css_links') ?>
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
        

        
    </style>  

</head>
<body>

<!-- Header Nav -->
    <?= $this->include('partials/header_buscar') ?>

    <section>
        <a href="#">TENDENCIAS</a>
        <a href="#">PROTEINA</a>
        <a href="#">CREATINA</a>
        <a href="#">VITAMINAS</a>
        <a href="#">ACCESORIOS</a>
        <a href="#">SNACKS</a>
    </section>


    <section>
        <a href="#" ><img src="<?= base_url('assets/img/suplementacion.png') ?>" alt="Suplementación"> </a>
        <a href="#" ><img src="<?= base_url('assets/img/ropaDeportiva.png') ?>" alt="Ropa Deportiva"> </a>
        <a href="#" ><img src="<?= base_url('assets/img/ofertas.png') ?>" alt="Ofertas"> </a>

    </section>





























    
</body>
</html>