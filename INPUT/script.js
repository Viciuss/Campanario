const voltar = document.getElementById("voltar");

voltar.addEventListener("click", () => {
    window.history.back();
});


$(document).ready(function(){

    // Enviar confissão
    $('#enviar').on('click', function(){
        const texto = $('#area').val().trim();
        if (!texto) return alert("Digite algo antes de enviar!");

        const dados = new FormData();
        dados.append('func', 'add');
        dados.append('texto', texto);

        $.ajax({
            url: "../API/api.php",
            type: 'POST',
            data: dados,

            processData: false,
            contentType: false,
            success: function(resposta){
                if(resposta.success){
                    alert('Confissão enviada!');
                    $('#area').val('');
                } else {
                    alert('Erro: ' + (resposta.error || 'Desconhecido'));
                }
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
                console.log('Erro na requisição: ' + error);
            }
        });
    });
})