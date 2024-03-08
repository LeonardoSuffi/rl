<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <input type="tel" name="tel" id="tel" class="tel" style="width: 100%;" />
    
<script>
const phoneInputField = document.querySelector("#tel");
const phoneInput = window.intlTelInput(phoneInputField, {
    preferredCountries: ["br", "us", "co"],
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

// Adiciona um ouvinte de evento de entrada (input) ao campo de telefone
phoneInputField.addEventListener("input", function() {
    // Obtém o número de telefone formatado
    const formattedNumber = phoneInput.getNumber();

    // Define o número formatado de volta no campo de telefone
    phoneInputField.value = formattedNumber;
});
phoneInputField.style.width = "100%";
</script>