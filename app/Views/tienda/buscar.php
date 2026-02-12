<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda/buscar</title>


     <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
     <style>
        /* Reset básico */
        html,
        body {
            overscroll-behavior: none;
            margin: 0;
            padding: 0;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 16px;
            color: rgba(33, 37, 41, 1);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Hero */
        .hero {
            height: calc(100vh - 80px);
            background-image: url('<?= base_url('assets/img/hero.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero h2 {
            font-size: 2.5rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            line-height: 1.3;
        }

        .hero h2 span {
            display: inline;
        }

        .hero h2 span+span {
            display: block;
            margin-top: 10px;
        }


        .hero a {
            display: inline-block;
            text-decoration: none;
            background-color: #fbd32d;
            color: #000;
            padding: 20px 40px;
            font-size: 35px;
            font-weight: 800;
            border-radius: 10px;
            border: none;
            margin-top: 40px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .hero a:hover {
            background-color: #000;
            color: #fbd32d;
        }


        /* Info Section */
        .info-section {
            height: 100vh;
            display: flex;
            background-color: #000;
            overflow: hidden;
        }

        .info-left {
            width: 75%;
            background-color: #fff;
            clip-path: polygon(0% 0%, 100% 0%, 80% 100%, 0% 100%);
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .info-left .stats {
            display: flex;
            flex: 1;
            gap: 50px;
        }

        .info-left .stats h1:first-child {
            font-size: 145px;
            font-weight: 800;
            color: #fed107;
        }

        .info-left .stats h1:last-child {
            font-size: 60px;
            font-weight: 800;
            margin: 0;
            color: #000;
            line-height: 0.9;
            font-style: italic;
            font-family: Montserrat, sans-serif;
            padding-top: 21%;
            text-align: left;
        }

        .info-left p {
            font-size: 35px;
            color: #000;
            transform: translateY(-350px);
            font-weight: 900;
            font-style: italic;
            text-align: left;
            width: 600px;
        }

        .info-right {
            width: 45%;
            margin-left: -20%;
            z-index: 1;
        }

        .info-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Publicidad de la tienda */
        .store-section {
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }

        .store-flex {
            display: flex;
            gap: 50px;
            height: calc(100vh - 100px);
        }

        .store-left {
            background-color: #000;
            flex: 7;
        }

        .store-right {
            display: flex;
            flex-direction: column;
            flex: 3;
            gap: 10px;
        }

        .store-right div {
            background-color: #000;
            flex: 1;
        }

        .store-button {
            text-align: center;
            margin-top: 30px;
        }

        .store-button a {
            display: inline-block;
            text-decoration: none;
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
        }

        .store-button a:hover {
            background-color: #000;
            color: #fff;
            transition: 0.3s;
        }

        .why-us-section {
            background-color: #2f2f2f;
            height: calc(100vh + 250px);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        .why-us-section h2 {
            color: #fff;
            font-weight: 800;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 60px;
            margin: 0;
        }

        .why-us-section p {
            color: #fff;
            font-family: Inter, Arial, Helvetica, sans-serif;
            font-size: 30px;
        }

        .why-us-container {
            background-color: #151414;
            width: 1100px;
            height: 1025px;
            border-radius: 75px;
            box-shadow: 0px 0px 21px 10px rgba(213, 217, 255, 0.5);
        }

        .why-us-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 30px;
            width: 100%;
        }

        .box {
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box h3 {
            font-size: 21px;
            font-weight: bold;
            font-family: Inter, Arial, Helvetica, sans-serif;
        }

        .box p {
            margin-top: -10px;
            width: 200px;
            text-wrap: wrap;
            font-size: 17px;
            font-weight: 300;
            font-family: Inter, Arial, Helvetica, sans-serif;
        }

        .icon {
            width: 100px;
            height: 100px;
            filter: drop-shadow(0px 0px 15px rgba(233, 196, 103, 0.7));
        }

        .separator-h {
            background-color: rgba(150, 147, 162, 0.2);
            width: 932px;
            height: 5px;
            margin-left: 5%;
        }

        .why-us-pricing {
            display: flex;
            gap: 20%;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .pricing-basic {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 42px;
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .pricing-basic h3 {
            font-weight: 800;
            font-size: 30px;
        }

        .pricing-basic p {
            color: #000;
            width: 250px;
            text-wrap: wrap;
            font-size: 18px;
            font-weight: bold;
        }

        .pricing-basic img {
            width: 100%;
            height: auto;
            border-radius: 42px 42px 0 0;
            object-fit: cover;
        }
    </style>
</head>
<body>

<!-- Header Nav -->
    <?= $this->include('partials/header_buscar') ?>
























    
</body>
</html>