<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness - Selección de suscripción</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #d9d9d9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1, h2, h3, h4, label, button {
            font-family: 'Montserrat', sans-serif;
        }

        #form-container {
            background-color: #fff;
            border-radius: 25px;
            width: 100%;
            max-width: 600px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        #form-container h2.main-title {
            font-size: 32px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 30px;
            text-align: center;
        }

        .plans-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 25px;
        }

        .plan-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .plan-card input[type="radio"] {
            display: none;
        }

        .plan-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .radio-circle {
            width: 20px;
            height: 20px;
            border: 2px solid #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .radio-circle::after {
            content: '';
            width: 10px;
            height: 10px;
            background-color: #fed107;
            border-radius: 50%;
            display: none;
        }

        .plan-text h4 {
            font-size: 16px;
            font-weight: 800;
            color: #1a1a1a;
        }

        .plan-text p {
            font-size: 12px;
            color: #7e7c7c;
            font-weight: 500;
        }

        .plan-price {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            white-space: nowrap;
        }

        .plan-card:has(input[type="radio"]:checked) {
            border-color: #fed107;
            background-color: rgba(254, 209, 7, 0.05);
        }

        .plan-card:has(input[type="radio"]:checked) .radio-circle {
            border-color: #fed107;
        }

        .plan-card:has(input[type="radio"]:checked) .radio-circle::after {
            display: block;
        }

        .form-footer {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        button#pagoBtn {
            background-color: #fed107;
            color: #fff;
            padding: 18px 80px;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button#pagoBtn:hover {
            background-color: #333;
            color: #fff;
            transform: translateY(-2px);
        }

        small {
            margin-top: 15px;
            color: #7e7c7c;
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: #fed107;
            font-weight: 700;
        }

        @media (max-width: 500px) {
            button#pagoBtn { width: 100%; }
        }
    </style>
</head>
<body>
    <div id="form-container">
        <h2 class="main-title">Selecciona tu suscripción</h2>

        <form action="<?= base_url('stripe/subscription') ?>" method="post">
            <div class="plans-container">

                <label class="plan-card">
                    <input type="radio" name="price_id" value="<?= PLANES['PLAN_BASICO'];?>">
                    <div class="plan-info">
                        <div class="radio-circle"></div>
                        <div class="plan-text">
                            <h4>Plan Básico</h4>
                            <p>Perfecto para empezar</p>
                        </div>
                    </div>
                    <div class="plan-price">20 € / Mes</div>
                </label>

                <label class="plan-card">
                    <input type="radio" name="price_id" value="<?= PLANES['PLAN_PREMIUM'] ?>" checked>
                    <div class="plan-info">
                        <div class="radio-circle"></div>
                        <div class="plan-text">
                            <h4>Plan Premium</h4>
                            <p>Recomendado</p>
                        </div>
                    </div>
                    <div class="plan-price">30 € / Mes</div>
                </label>

            </div>

            <div class="form-footer">
                <button type="submit" id="pagoBtn">Confirmar suscripción</button>
                <small>¿Ya eres socio? <a href="#">Inicia sesión</a></small>
            </div>
        </form>
    </div>
</body>

</html>