/* Coloque isso ao input oninput="formatarMoeda(this)*/

    function formatarMoeda(input) {
    // Obtém o valor digitado pelo usuário
    let valor = input.value;

    // Remove caracteres não numéricos
    valor = valor.replace(/\D/g, '');

    // Formata para o padrão de moeda
    valor = (parseFloat(valor) / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });

    // Define o valor formatado de volta no campo de entrada
    input.value = valor;
}
