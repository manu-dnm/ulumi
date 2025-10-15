
<!-- <a href="#whatsapp_dnm">Abrir</a> -->

<div class="dnm-whatsapp-button-wrapper right">
    <button class="dnm-whatsapp-button dnm-trigger-whatsapp">
        <i id="icon-button"></i>
    </button>
    <div class="dnm-whatsapp-modal">
        <div id="dnmWhatsappModalContent" class="modal-content">
            <h2>Escríbenos a Whatsapp</h2>
            <form id="dnm-whatsapp-form" action="#">
                <input type="text" class="dnm-input" placeholder="Tu nombre" name="name" required />
                <input type="email" class="dnm-input" placeholder="Tu correo electrónico" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
                <!-- Campo de teléfono con pattern y required -->
                <input type="tel" class="dnm-input" id="phoneWhatsapp" placeholder="Tu teléfono a 10 dígitos" name="phone"
                    required />
                <button type="submit" class="dnm-button" disabled>Iniciar chat →</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const whatsappNumber = "";
        const webhookURL = "";
        const fbTrack = true;
        const gTagTrack = true;
        const runForm = false; // False to prevent form

        let error = false;

        if (whatsappNumber === '' || whatsappNumber.length < 10) {
            console.error('🚨 Whatsapp Dinametra Snippet: El número de whatsapp configurado es incorrecto.')
            error = true;
        }

        if (runForm && !webhookURL) {
            console.error('🚨 Whatsapp Dinametra Snippet: El webhook no está configurado correctamente, configúralo o desactiva la función del formulario \'runForm: boolean\' .')
            error = true;
        }

        if (error) {
            const modalContent = document.querySelector('#dnmWhatsappModalContent');
            if (modalContent !== null) {
                modalContent.classList.add('error');
                modalContent.innerHTML = '🚨 Revisa los errores en consola';
            }
        }

        const closeIcon = "";
        const whatsappIcon = "";
        const triggerButtons = document.querySelectorAll('.dnm-trigger-whatsapp, [href="#whatsapp_dnm"]');
        const whatsappModal = document.querySelector(".dnm-whatsapp-modal");
        const floatingButtonIcon = document.getElementById("icon-button");

        floatingButtonIcon.classList.add('fab');
        floatingButtonIcon.innerHTML = whatsappIcon;

        const utmParams = ["utm_source", "utm_medium", "utm_campaign", "utm_content"];

        // Guardar UTM en localStorage
        function saveUTMParamsToLocalStorage() {
            const urlParams = new URLSearchParams(window.location.search);
            utmParams.forEach((param) => {
                const value = urlParams.get(param);
                if (value) {
                    localStorage.setItem(param, value);
                }
            });
        }

        // Obtener UTM de localStorage
        function getUTMParamsFromLocalStorage() {
            const utms = {};
            utmParams.forEach((param) => {
                utms[param] = localStorage.getItem(param) || "";
            });
            return utms;
        }

        saveUTMParamsToLocalStorage();

        // Botones para abrir/cerrar el modal
        triggerButtons.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                if (runForm) {
                    toggleModal();
                } else {
                    const message = encodeURIComponent(
                        `¡Hola! Quisiera saber más información sobre sus servicios.`
                    );
                    window.location.href = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${message}`;

                }
            });
        });

        // Cerrar modal si se hace click en el fondo
        whatsappModal.addEventListener("mousedown", function (event) {
            if (event.target === whatsappModal) {
                toggleModal();
            }
        });

        function toggleModal() {
            whatsappModal.classList.toggle("show");
            floatingButtonIcon.innerHTML = whatsappModal.classList.contains("show") ? closeIcon : whatsappIcon;
            floatingButtonIcon.classList.remove('fal');
            floatingButtonIcon.classList.remove('fab');
            whatsappModal.classList.contains("show") ? floatingButtonIcon.classList.add('fal') : floatingButtonIcon.classList.add('fab'); ;
        }

        if (!error) {
            const form = document.getElementById("dnm-whatsapp-form");
            const submitButton = form.querySelector('button[type="submit"]');

            // Inicializar intl-tel-input
            const phoneInput = document.querySelector("#phoneWhatsapp");
            const iti = window.intlTelInput(phoneInput, {
                initialCountry: "mx",
                separateDialCode: true,
                countryOrder: ["mx", "us"],
                // hiddenInput: Mapea a "full_phone" y "country_code" si quisieras verlos en el form
                hiddenInput: () => ({ phone: "full_phone", country: "country_code" }),
                // Cargar utils de forma dinámica
                loadUtils: () =>
                    import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.1/build/js/utils.js"),
            });

            function checkFormValidity() {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                const phoneIsValid = iti.isValidNumber();
                submitButton.disabled = !(data.name && data.email && phoneIsValid);
            }

            // Listeners para revalidar cuando cambian campos
            form.addEventListener("input", checkFormValidity);
            phoneInput.addEventListener("change", checkFormValidity);
            phoneInput.addEventListener("keyup", checkFormValidity);
            phoneInput.addEventListener("countrychange", checkFormValidity);

            // Primer chequeo
            checkFormValidity();

            // Envío del formulario
            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData(form);
                const utms = getUTMParamsFromLocalStorage();

                // Añadir UTM y fecha
                utmParams.forEach((param) => {
                    formData.set(param, utms[param] || "");
                });
                formData.set("date", getTodayDate());

                // Guardamos el número completo en phone (con código de país)
                formData.set("phone", iti.getNumber());

                fetch(webhookURL, {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => {
                        if (response.ok) {
                            // Enviar a dataLayer

                            if( fbTrack ) {
                                fbq('trackCustom', 'whatsapp_form', {
                                    name: formData.get("name"),
                                    email: formData.get("email"),
                                    phone: formData.get("phone"),
                                    ...utms,
                                });
                            }

                            if ( gTagTrack ) {
                                window.dataLayer = window.dataLayer || [];
                                window.dataLayer.push({
                                    event: "whatsapp_form",
                                    name: formData.get("name"),
                                    email: formData.get("email"),
                                    phone: formData.get("phone"),
                                    ...utms,
                                });
                            }

                            // Redirigir a WhatsApp
                            const message = encodeURIComponent(
                                `¡Hola! Mi nombre es ${formData.get("name")}. Quisiera saber más información sobre sus servicios.`
                            );

                            form.reset();
                            toggleModal();
                            checkFormValidity();

                            window.location.href = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${message}`;

                        } else {
                            console.error("Error al enviar el formulario");
                        }
                    })
                    .catch((error) => console.error("Error de red:", error));
            });

            function getTodayDate() {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, "0");
                const day = String(today.getDate()).padStart(2, "0");
                const hours = String(today.getHours()).padStart(2, "0");
                const minutes = String(today.getMinutes()).padStart(2, "0");
                const seconds = String(today.getSeconds()).padStart(2, "0");
                return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
            }
        }
    });
</script>