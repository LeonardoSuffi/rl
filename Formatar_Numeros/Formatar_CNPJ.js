
  document.getElementById('cnpj').addEventListener('input', function (e) {
      var cnpj = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito
      if (cnpj.length > 14) {
          cnpj = cnpj.slice(0, 14); // Limita a 14 caracteres
      }
      if (cnpj.length < 3) {
          e.target.value = cnpj;
          return;
      }
      cnpj = cnpj.replace(/^(\d{2})(\d)/, '$1.$2'); // Coloca ponto após os primeiros dois dígitos
      cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); // Coloca ponto após os próximos três dígitos
      cnpj = cnpj.replace(/\.(\d{3})(\d)/, '.$1/$2'); // Coloca barra após os próximos três dígitos
      cnpj = cnpj.replace(/(\d{4})(\d)/, '$1-$2'); // Coloca hífen após os próximos quatro dígitos
      e.target.value = cnpj;
  });