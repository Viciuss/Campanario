const voltar = document.getElementById("voltar")

voltar.addEventListener("click", ()=>{
    window.history.back()
})
const areaConf = document.querySelector('#confissao')

function passarConf(dados){


    $.ajax({
        url: "../API/api.php",
        type: 'POST',
        data: dados,
        processData: false,
        contentType: false,
        success:function(resposta){
            if(resposta.success){
                //enviar texto para confissao
                areaConf.innerHTML = resposta.success
                console.log("TESTE")

            }else{
                alert('Erro: ' + (resposta.error || 'Desconhecido'));
            }
        },            
        error: function(xhr, status, error){
                console.log(xhr.responseText);
                console.log('Erro na requisição: ' + error);
        }

    })
}


$("#pass").on("click",function(){
    const dados = new FormData;
    dados.append('func', 'read')

    passarConf(dados)
})



