<div id="acc-widget">
    <button id="acc-toggle" aria-label="Opciones de accesibilidad" title="Accesibilidad">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
            <path d="M12 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4zm-1 5h2l1.5 4.5L17 13l-1 1.5-2.5-1.5V20h-2v-7L9 14.5 8 13l2.5-1.5L12 7z" />
        </svg>
    </button>

    <div id="acc-panel" role="dialog" aria-label="Panel de accesibilidad" hidden>
        <p class="acc-title">Accesibilidad</p>

        <!-- Tamaño de fuente -->
        <div class="acc-section">
            <span class="acc-label">Tamaño de texto</span>
            <div class="acc-row">
                <button class="acc-btn" id="acc-font-dec" aria-label="Reducir tamaño de fuente">A−</button>
                <span id="acc-font-val">100%</span>
                <button class="acc-btn" id="acc-font-inc" aria-label="Aumentar tamaño de fuente">A+</button>
            </div>
        </div>

        <!-- Modo de color -->
        <div class="acc-section">
            <span class="acc-label">Modo de color</span>
            <div class="acc-colors">
                <button class="acc-color-btn active" data-mode="normal" aria-label="Colores normales" title="Normal">
                    <span class="color-preview normal-preview"></span>Normal
                </button>
                <button class="acc-color-btn" data-mode="deuteranopia" aria-label="Modo deuteranopia" title="Deuteranopia (rojo-verde)">
                    <span class="color-preview deuter-preview"></span>Deuteranopia
                </button>
                <button class="acc-color-btn" data-mode="protanopia" aria-label="Modo protanopia" title="Protanopia (rojo)">
                    <span class="color-preview protan-preview"></span>Protanopia
                </button>
                <button class="acc-color-btn" data-mode="tritanopia" aria-label="Modo tritanopia" title="Tritanopia (azul-amarillo)">
                    <span class="color-preview tritan-preview"></span>Tritanopia
                </button>
                <button class="acc-color-btn" data-mode="alto-contraste" aria-label="Alto contraste" title="Alto contraste">
                    <span class="color-preview contrast-preview"></span>Alto contraste
                </button>
            </div>
        </div>

        <!-- Resetear -->
        <button id="acc-reset" class="acc-btn acc-reset-btn">↺ Restablecer</button>
    </div>
</div>

<style>
    /* ── Widget contenedor ── */
    #acc-widget {
        position: fixed;
        bottom: 25px;
        left: 20px;
        z-index: 9999;
        font-family: Arial, sans-serif;
    }

    /* ── Botón flotante ── */
    #acc-toggle {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: #FFD000;
        color: #000;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(255, 195, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s, box-shadow 0.2s;
        font-size: 26px;
    }

    #acc-toggle:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.4);
    }

    /* ── Panel desplegable ── */
    #acc-panel {
        position: absolute;
        bottom: 58px;
        left: 0;
        background: #1a1a1a;
        border: 1px solid #FFD000;
        border-radius: 12px;
        padding: 16px;
        width: 220px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    #acc-panel[hidden] {
        display: none;
    }

    .acc-title {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #FFD000;
        margin: 0 0 12px 0;
    }

    .acc-section {
        margin-bottom: 14px;
    }

    .acc-label {
        display: block;
        font-size: 11px;
        color: #aaa;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 8px;
    }

    /* ── Fila tamaño fuente ── */
    .acc-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #acc-font-val {
        flex: 1;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
        color: #FFD000;
    }

    /* ── Botones generales ── */
    .acc-btn {
        background: #333;
        color: #fff;
        border: 1px solid #555;
        border-radius: 6px;
        padding: 6px 12px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: background 0.2s;
    }

    .acc-btn:hover {
        background: #FFD000;
        color: #000;
    }

    /* ── Botones de color ── */
    .acc-colors {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .acc-color-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #2a2a2a;
        border: 1px solid #444;
        border-radius: 6px;
        padding: 6px 10px;
        cursor: pointer;
        color: #fff;
        font-size: 12px;
        transition: all 0.2s;
        text-align: left;
    }

    .acc-color-btn:hover,
    .acc-color-btn.active {
        border-color: #FFD000;
        background: #333;
        color: #FFD000;
    }

    /* Previews de color */
    .color-preview {
        width: 14px;
        height: 14px;
        border-radius: 3px;
        flex-shrink: 0;
    }

    .normal-preview {
        background: linear-gradient(135deg, #e74c3c 50%, #27ae60 50%);
    }

    .deuter-preview {
        background: linear-gradient(135deg, #c8a000 50%, #0072b2 50%);
    }

    .protan-preview {
        background: linear-gradient(135deg, #b07a00 50%, #0000cc 50%);
    }

    .tritan-preview {
        background: linear-gradient(135deg, #cc0066 50%, #009966 50%);
    }

    .contrast-preview {
        background: linear-gradient(135deg, #000 50%, #fff 50%);
        border: 1px solid #555;
    }

    /* ── Botón restablecer ── */
    .acc-reset-btn {
        width: 100%;
        margin-top: 4px;
        background: #222;
        border-color: #555;
        font-size: 12px;
    }

    /* FILTROS SVG para daltonismo*/
    .acc-deuteranopia {
        filter: url(#acc-filter-deuteranopia);
    }

    .acc-protanopia {
        filter: url(#acc-filter-protanopia);
    }

    .acc-tritanopia {
        filter: url(#acc-filter-tritanopia);
    }

    .acc-alto-contraste {
        filter: contrast(2) grayscale(0.2);
    }
</style>

<!-- Filtros SVG para daltonismo (invisibles, solo definen los efectos) -->
<svg style="position:absolute;width:0;height:0" aria-hidden="true">
    <defs>
        <!-- Deuteranopia: deficiencia rojo-verde (tipo M) -->
        <filter id="acc-filter-deuteranopia">
            <feColorMatrix type="matrix" values="
                0.625 0.375 0     0 0
                0.7   0.3   0     0 0
                0     0.3   0.7   0 0
                0     0     0     1 0" />
        </filter>
        <!-- Protanopia: deficiencia rojo (tipo L) -->
        <filter id="acc-filter-protanopia">
            <feColorMatrix type="matrix" values="
                0.567 0.433 0     0 0
                0.558 0.442 0     0 0
                0     0.242 0.758 0 0
                0     0     0     1 0" />
        </filter>
        <!-- Tritanopia: deficiencia azul-amarillo (tipo S) -->
        <filter id="acc-filter-tritanopia">
            <feColorMatrix type="matrix" values="
                0.95  0.05  0     0 0
                0     0.433 0.567 0 0
                0     0.475 0.525 0 0
                0     0     0     1 0" />
        </filter>
    </defs>
</svg>

<script>
    (function() {
        const FONT_MIN = 80;
        const FONT_MAX = 140;
        const FONT_STEP = 10;
        const STORAGE_KEY = 'acc_prefs';

        let prefs = JSON.parse(localStorage.getItem(STORAGE_KEY) || '{"fontSize":100,"colorMode":"normal"}');

        const toggle = document.getElementById('acc-toggle');
        const panel = document.getElementById('acc-panel');
        const fontDec = document.getElementById('acc-font-dec');
        const fontInc = document.getElementById('acc-font-inc');
        const fontVal = document.getElementById('acc-font-val');
        const resetBtn = document.getElementById('acc-reset');
        const colorBtns = document.querySelectorAll('.acc-color-btn');

        toggle.addEventListener('click', () => {
            const isHidden = panel.hasAttribute('hidden');
            if (isHidden) panel.removeAttribute('hidden');
            else panel.setAttribute('hidden', '');
        });

        document.addEventListener('click', (e) => {
            if (!document.getElementById('acc-widget').contains(e.target)) {
                panel.setAttribute('hidden', '');
            }
        });

        function applyFontSize(size) {
            document.documentElement.style.fontSize = size + '%';
            fontVal.textContent = size + '%';
            fontDec.disabled = size <= FONT_MIN;
            fontInc.disabled = size >= FONT_MAX;
        }

        fontDec.addEventListener('click', () => {
            prefs.fontSize = Math.max(FONT_MIN, prefs.fontSize - FONT_STEP);
            applyFontSize(prefs.fontSize);
            save();
        });

        fontInc.addEventListener('click', () => {
            prefs.fontSize = Math.min(FONT_MAX, prefs.fontSize + FONT_STEP);
            applyFontSize(prefs.fontSize);
            save();
        });

        const colorClasses = ['acc-deuteranopia', 'acc-protanopia', 'acc-tritanopia', 'acc-alto-contraste'];

        function applyColorMode(mode) {
            document.documentElement.classList.remove(...colorClasses);
            colorBtns.forEach(b => b.classList.remove('active'));
            const activeBtn = document.querySelector(`.acc-color-btn[data-mode="${mode}"]`);
            if (activeBtn) activeBtn.classList.add('active');
            if (mode !== 'normal') {
                document.documentElement.classList.add('acc-' + mode);
            }
        }

        colorBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                prefs.colorMode = btn.dataset.mode;
                applyColorMode(prefs.colorMode);
                save();
            });
        });

        resetBtn.addEventListener('click', () => {
            prefs = {
                fontSize: 100,
                colorMode: 'normal'
            };
            applyFontSize(100);
            applyColorMode('normal');
            save();
        });

        function save() {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(prefs));
        }

        applyFontSize(prefs.fontSize);
        applyColorMode(prefs.colorMode);
    })();
</script>