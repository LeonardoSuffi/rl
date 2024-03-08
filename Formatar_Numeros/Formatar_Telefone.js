  function formatarTelefone(input) {
    var cleaned = ('' + input.value).replace(/\D/g, '');
    var match = cleaned.match(/^(\d{2})(\d{4,5})(\d{4})$/);
    if (match) {
      input.value = '(' + match[1] + ') ' + match[2] + '-' + match[3];
    } else {
      input.value = cleaned;
    }
  }
  document.getElementById('phone').addEventListener('input', function() {
    formatarTelefone(this);
  });