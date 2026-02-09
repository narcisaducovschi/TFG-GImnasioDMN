<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMN Fitness - Pasarela de pago</title>
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
            max-width: 1000px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        #form-container h2.main-title {
            font-size: 32px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .form-section h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1a1a1a;
            border-bottom: 3px solid #fed107;
            display: inline-block;
            padding-bottom: 5px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .input-row {
            display: flex;
            gap: 15px;
        }
        .input-row .input-group {
            flex: 1;
        }

        label.field-label {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 8px;
            color: #333;
            letter-spacing: 0.5px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
            width: 100%;
        }

        input:focus {
            border-color: #fed107;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(254, 209, 7, 0.1);
        }

        .plans-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
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
            font-size: 15px;
            font-weight: 800;
            color: #1a1a1a;
        }

        .plan-text p {
            font-size: 11px;
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
            background-color: rgba(254, 209, 7, 0.02);
        }

        .plan-card:has(input[type="radio"]:checked) .radio-circle {
            border-color: #fed107;
        }

        .plan-card:has(input[type="radio"]:checked) .radio-circle::after {
            display: block;
        }

        .form-footer {
            grid-column: span 2;
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
        /* Media Querys */
        @media (max-width: 850px) {
            .form-grid { grid-template-columns: 1fr; gap: 30px; }
            .form-footer { grid-column: span 1; }
            button#pagoBtn { width: 100%; }
        }
    </style>
</head>

<body>
    <div id="form-container">
        <h2 class="main-title">Pasarela de pago</h2>

        <form action="registro" method="post">
            <div class="form-grid">

                <div class="form-section">
                    <h3>Datos de pago</h3>

                    <div class="input-group">
                        <label class="field-label" for="card_number">Número de tarjeta</label>
                        <input type="text" placeholder="0000 0000 0000 0000" name="card_number" id="card_number" required>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label class="field-label" for="expire_date">Vencimiento</label>
                            <input type="text" placeholder="MM/AA" name="expire_date" id="expire_date" required>
                        </div>
                        <div class="input-group">
                            <label class="field-label" for="cvv">CVV</label>
                            <input type="text" placeholder="123" name="cvv" id="cvv" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="field-label" for="titular">Titular de la tarjeta</label>
                        <input type="text" placeholder="Nombre completo" name="titular" id="titular" required>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Selecciona tu suscripción</h3>
                    
                    <div class="plans-container">
                        <label class="plan-card">
                            <input type="radio" name="plan" value="1">
                            <div class="plan-info">
                                <div class="radio-circle"></div>
                                <div class="plan-text">
                                    <h4>Plan Básico</h4>
                                    <p>Perfecto para empezar</p>
                                </div>
                            </div>
                            <div class="plan-price">9,99 € / Mes</div>
                        </label>

                        <label class="plan-card">
                            <input type="radio" name="plan" value="2" checked>
                            <div class="plan-info">
                                <div class="radio-circle"></div>
                                <div class="plan-text">
                                    <h4>Plan Premium</h4>
                                    <p>Recomendado</p>
                                </div>
                            </div>
                            <div class="plan-price">19,99 € / Mes</div>
                        </label>

                        <label class="plan-card">
                            <input type="radio" name="plan" value="3">
                            <div class="plan-info">
                                <div class="radio-circle"></div>
                                <div class="plan-text">
                                    <h4>Plan Pro</h4>
                                    <p>Lo mejor de lo mejor</p>
                                </div>
                            </div>
                            <div class="plan-price">29,99 € / Mes</div>
                        </label>
                    </div>
                     <div class="form-footer">
                    <button type="submit" id="pagoBtn">Confirmar suscripción</button>
                    <small>¿Ya eres socio? <a href="#">Inicia sesión</a></small>
                </div>
                </div>

               

            </div>
        </form>
    </div>
</body>

</html>