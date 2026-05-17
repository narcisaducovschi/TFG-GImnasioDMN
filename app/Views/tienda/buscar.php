<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>DMN Fitness | Tienda</title>
    <?= $this->include('partials/css_links') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/cards.css') ?>">
    <style>
        body { background-color: #3A3838; margin: 0; }
        .categorias-nav { display: flex; flex-wrap: wrap; width: 100%; }
        .categorias-nav a {
            flex: 1 1 200px; min-width: 200px; height: 70px;
            background-color: #F5C400; color: #333; text-decoration: none;
            display: flex; align-items: center; justify-content: center;
            font-weight: 600; border: 1px solid #e8c21a; transition: 0.3s;
        }
        .productos-grid { display: flex; flex-wrap: wrap; gap: 25px; padding: 30px; justify-content: center; }

        .floating-cart {
            position: fixed; bottom: 30px; right: 30px;
            background: #F5C400; padding: 15px 25px; border-radius: 50px;
            display: <?= session()->get('cart') ? 'flex' : 'none' ?>;
            align-items: center; gap: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            z-index: 1000; text-decoration: none; color: #333; font-weight: bold;
        }
        .cart-count {
            background: #333; color: #F5C400; width: 25px; height: 25px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%; font-size: 0.8rem;
        }
        .btn-added { background-color: #4CAF50 !important; }
    </style>
</head>
<body>
    <?= $this->include('partials/header_buscar') ?>
    <?= $this->include('partials/accesibilidad') ?>

    <section class="categorias-nav">
        <a href="<?= base_url('search?grupo=0') ?>">TODOS</a>
        <a href="<?= base_url('search?grupo=1') ?>">SUPLEMENTACION</a>
        <a href="<?= base_url('search?grupo=2') ?>">ACCESORIOS</a>
        <a href="<?= base_url('search?grupo=3') ?>">SNACKS</a>
    </section>

    <section class="productos-grid">
        <?php foreach ($productos as $producto): ?>
            <div class="card">
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
                <button class="add-to-cart btn-ajax" data-id="<?= $producto['id'] ?>">
                    <img src="<?= base_url('assets/img/icons/shopping-cart.svg') ?>">
                    Añadir al carrito
                </button>
            </div>
        <?php endforeach; ?>
    </section>

    <a href="<?= base_url('checkout-carrito') ?>" id="floatingCart" class="floating-cart">
        <span>FINALIZAR COMPRA</span>
        <div class="cart-count" id="cartCount">
            <?= session()->get('cart') ? array_sum(array_column(session()->get('cart'), 'cantidad')) : 0 ?>
        </div>
    </a>

    <div id="cartModal" class="modal-overlay" style="display: none; position: fixed; z-index: 2000; inset: 0; background: rgba(0,0,0,0.7); align-items: center; justify-content: center;">
        <div class="modal-content-gym" style="width: 90%; max-width: 500px; background: #fff; border-radius: 15px; overflow: hidden;">
            <div class="modal-header-gym" style="background: #F5C400; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                <h2 style="margin: 0; color: #333; font-family: Montserrat;">Tu Carrito</h2>
                <button onclick="closeCart()" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
            </div>
            <div id="cartItemsList" style="padding: 20px; max-height: 400px; overflow-y: auto;"></div>
            <div style="padding: 20px; border-top: 1px solid #eee;">
                <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.2rem; margin-bottom: 20px; color: #333;">
                    <span>Total:</span>
                    <span id="cartTotalAmount">0.00€</span>
                </div>
                <a href="<?= base_url('checkout-carrito') ?>" class="hero-btn" style="width: 100%; text-align: center; display: block; box-sizing: border-box; background: #F5C400; color: #333; padding: 15px; text-decoration: none; border-radius: 8px; font-weight: bold;">
                    CONTINUAR AL PAGO
                </a>
            </div>
        </div>
    </div>

    <script>
        // AJAX AÑADIR
        document.querySelectorAll('.btn-ajax').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const btn = this;
                fetch('<?= base_url('tienda/add-ajax') ?>', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
                    body: 'id=' + id
                })
                .then(r => r.json())
                .then(data => {
                    if (data.status === 'success') {
                        document.getElementById('cartCount').innerText = data.totalItems;
                        document.getElementById('floatingCart').style.display = 'flex';
                        const originalHtml = btn.innerHTML;
                        btn.classList.add('btn-added');
                        btn.innerText = '¡AÑADIDO!';
                        setTimeout(() => { btn.classList.remove('btn-added'); btn.innerHTML = originalHtml; }, 1000);
                    }
                });
            });
        });

        // CONTROL MODAL
        const floatingBtn = document.getElementById('floatingCart');
        if(floatingBtn) {
            floatingBtn.addEventListener('click', function(e) {
                e.preventDefault();
                openCart();
            });
        }

        function openCart() {
            fetch('<?= base_url('tienda/get-cart-json') ?>')
            .then(r => r.json())
            .then(data => {
                const container = document.getElementById('cartItemsList');
                const totalSpan = document.getElementById('cartTotalAmount');
                container.innerHTML = '';
                let total = 0;
                if (!data.cart || Object.keys(data.cart).length === 0) {
                    container.innerHTML = '<p style="text-align:center; color:#666;">El carrito está vacío</p>';
                } else {
                    for (const id in data.cart) {
                        const item = data.cart[id];
                        total += item.precio * item.cantidad;
                        container.innerHTML += `
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                <div style="flex: 1;">
                                    <strong style="display:block; color:#333;">${item.nombre}</strong>
                                    <small style="color:#666;">${item.precio}€ / ud</small>
                                </div>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <button onclick="updateQty(${id}, -1)" style="padding:2px 8px;">-</button>
                                    <span style="font-weight:bold;">${item.cantidad}</span>
                                    <button onclick="updateQty(${id}, 1)" style="padding:2px 8px;">+</button>
                                    <button onclick="updateQty(${id}, 'remove')" style="color:red; background:none; border:none; margin-left:5px; cursor:pointer;">&times;</button>
                                </div>
                            </div>`;
                    }
                }
                totalSpan.innerText = total.toFixed(2) + '€';
                document.getElementById('cartModal').style.display = 'flex';
            });
        }

        function updateQty(id, action) {
            fetch('<?= base_url('tienda/update-cart') ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest' },
                body: `id=${id}&action=${action}`
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('cartCount').innerText = data.totalItems;
                    if(data.totalItems == 0) closeCart();
                    else openCart();
                }
            });
        }

        function closeCart() { document.getElementById('cartModal').style.display = 'none'; }
        window.onclick = function(e) { if (e.target == document.getElementById('cartModal')) closeCart(); }
    </script>
</body>
</html>