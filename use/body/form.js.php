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
    const phoneInput = form.querySelector("[name='phone']");
    const submitButton = form.querySelector("button");
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

    const freeEmailDomains = [
        'gmail.com',
        'hotmail.com',
        'yahoo.com',
        'outlook.com',
        'aol.com',
        'live.com',
        'icloud.com'
        // Agrega más dominios aquí si es necesario
    ];


    // --- Lógica de Validación
    const validateField = (field) => {
        const wrapper = field.closest('.input-wrapper');
        if (!wrapper) return;
        let isValid = false;
        
        if (field.type === 'tel') {
            isValid = iti.isValidNumber();
        } else if (field.type === 'email') {
            isValid = field.checkValidity();

            const isBusinessEmailRequired = field.hasAttribute('business-email');
            
            if (isValid && isBusinessEmailRequired) {
                const emailValue = field.value.toLowerCase();
                const domain = emailValue.split('@')[1];
                
                if (freeEmailDomains.includes(domain)) {
                    isValid = false;
                }
            }
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