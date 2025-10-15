<?php
    $formName = 'MyForm';
    $webhookURL = '';
    $redirectURL = '/gracias';
?>

<form id="<?php echo $formName; ?>" class="main-form" action="#">
    <div class="input-wrapper">
        <label for="">Nombre *</label>
        <input required name="name" type="text" class="main-input" placeholder="Escribe tu nombre">
    </div>
    <div class="inputs-wrapper inputs-wrapper-2">
        <div class="input-wrapper">
            <label for="">Correo electrónico *</label>
            <input required name="email" type="email" class="main-input" placeholder="Escribe tu correo electrónico">
        </div>
        <div class="input-wrapper">
            <label for="">Teléfono *</label>
            <input required id="phone" name="phone" type="tel" class="main-input" placeholder="Escribe tu teléfono">
        </div>
    </div>
    <div class="input-wrapper">
        <label for="">Pregunta filtro *</label>
        <div class="main-select">
            <select name="pregunta_filtro" required>
                <option value="" disabled selected>Elige uno de la lista</option>
                <option value="Opción 1">Opción 1</option>
                <option value="Opción 2">Opción 2</option>
                <option value="Opción 3">Opción 3</option>
            </select>
            <div></div>
        </div>
    </div>
    <div class="input-wrapper">
        <label for="">Mensaje</label>
        <textarea name="mensaje" type="text" class="main-input" placeholder="Déjanos tu mensaje"></textarea>
    </div>
    <input type="hidden" name="utm_source">
    <input type="hidden" name="utm_campaign">
    <input type="hidden" name="utm_content">
    <input type="hidden" name="utm_medium">
    <input type="hidden" name="utm_term">
    <input type="hidden" name="date_submit">
    <div class="actions">
        <button id="submitForm" class="main-button"><span>Enviar</span></button>
    </div>
</form>

<div id="messageError" class="form-error-message">
    Algo salió mal... por favor, intenta de nuevo más tarde.
</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('<?php echo $formName ?>');

    if (!form) {
        return;
    }

    // --- Definición de variables y constantes dentro del ámbito del formulario ---
    const webhookURL = '<?php echo $webhookURL; ?>';
    const redirection = '<?php echo $redirectURL; ?>';

    // 2. Todos los selectores ahora parten de 'form.querySelector' para buscar solo DENTRO del formulario.
    const phoneInput = form.querySelector("#phone");
    const submitButton = form.querySelector("#submitForm");
    const allRequiredFields = form.querySelectorAll('input[required], select[required]');
    const messageErrorDiv = document.querySelector('#messageError'); // Este es el único elemento que se asume fuera del form.

    // Si no encuentra los elementos esenciales, no continúa para evitar errores.
    if (!phoneInput || !submitButton) {
        console.error("No se encontraron elementos esenciales (teléfono o botón de envío) dentro del formulario #MyCustomForm.");
        return;
    }

    // --- Inicialización de la librería de teléfono (ahora dentro del scope) ---
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: 'mx',
        separateDialCode: true,
        countryOrder: ['mx', 'us'],
        hiddenInput: () => ({ phone: "full_phone", country: "country_code" }),
        loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.1/build/js/utils.js"),
    });


    // --- Lógica de UTMs (la parte que rellena el formulario ya está acotada) ---
    (() => {
        const utmKeys = ["utm_source", "utm_campaign", "utm_content", "utm_medium", "utm_term"];
        // La escritura en localStorage es global, eso no cambia.
        const urlParams = new URLSearchParams(window.location.search);
        utmKeys.forEach(key => {
            if (urlParams.has(key)) {
                localStorage.setItem(key, urlParams.get(key));
            }
        });

        // El rellenado de los campos ocultos SÍ usa la variable 'form' acotada.
        utmKeys.forEach(key => {
            const input = form.querySelector(`input[name="${key}"]`);
            if (input) input.value = localStorage.getItem(key) || "";
        });
    })();


    // --- Lógica de Validación (sin cambios en su funcionamiento, solo en su alcance) ---
    const validateField = (field) => {
        const wrapper = field.closest('.input-wrapper');
        if (!wrapper) return;
        let isValid = false;
        
        if (field.type === 'tel') {
            isValid = iti.isValidNumber();
        } else {
            isValid = field.checkValidity();
        }

        wrapper.classList.toggle('show-error', !isValid);
    };

    const checkOverallValidity = () => {
        const isFormValid = form.checkValidity();
        const isPhoneValid = iti.isValidNumber();
        submitButton.disabled = !(isFormValid && isPhoneValid);
    };

    submitButton.disabled = true;

    allRequiredFields.forEach(field => {
        field.addEventListener('blur', () => validateField(field));

        field.addEventListener('input', () => {
            if (field.closest('.input-wrapper')?.classList.contains('show-error')) {
                validateField(field);
            }
            checkOverallValidity();
        });
    });

    phoneInput.addEventListener('countrychange', checkOverallValidity);


    // --- Lógica de Envío (ahora ligada al evento 'submit' del formulario específico) ---
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        
        allRequiredFields.forEach(validateField);
        checkOverallValidity();
        
        if (submitButton.disabled) {
            return;
        }

        submitButton.disabled = true;
        submitButton.classList.add('loading');
        form.querySelector('input[name="date_submit"]').value = new Date().toISOString();

        if (messageErrorDiv) messageErrorDiv.style.display = 'none';

        try {
            const formData = new FormData(form);
            const response = await fetch(webhookURL, {
                method: "POST",
                body: formData
            });

            if (response.ok) {
                window.location.href = redirection;
            } else {
                if (messageErrorDiv) messageErrorDiv.style.display = 'block';
                submitButton.disabled = false;
                submitButton.classList.remove('loading');
            }
        } catch (error) {
            console.error("Submission error:", error);
            if (messageErrorDiv) messageErrorDiv.style.display = 'block';
            submitButton.disabled = false;
            submitButton.classList.remove('loading');
        }
    });
});
</script>