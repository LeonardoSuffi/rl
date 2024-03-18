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


/*
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(document).ready(function(){
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#tel').mask('(00) 00000-0000');
  });
</script>
*/