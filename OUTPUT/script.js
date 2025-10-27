const voltar = document.getElementById("voltar")
const areaConf = document.querySelector('#confissao')
let idUltimaConf = undefined

voltar.addEventListener("click", ()=>{
    window.history.back()
})

function passarConf(){
    const dados = new FormData;
    dados.append('func', 'read')


    $.ajax({
        url: "../API/api.php",
        type: 'POST',
        data: dados,
        processData: false,
        contentType: false,
        success:function(resposta){
            if(resposta.success){
                //enviar texto para confissao
                console.log(resposta.data["id"])
                idUltimaConf = resposta.data["id"]
                areaConf.innerHTML = resposta.data["confissao"]

            }else{
                alert('Erro: ' + (resposta.data));
            }
        },            
        error: function(xhr, status, error){
                console.log(xhr.responseText);
                console.log('Erro na requisição: ' + error);
        }

    })
}

function apagarConfissao(dados){

        $.ajax({
        url: "../API/api.php",
        type: 'POST',
        data: dados,
        processData: false,
        contentType: false,
        success:function(resposta){
            if(resposta.success){
                //enviar texto para confissao
                areaConf.innerHTML = resposta.data["confissao"]
                passarConf()

            }else{
                alert('Erro: ' + (resposta.data["data"]));
                areaConf.innerHTML = " "
            }
        },            
        error: function(xhr, status, error){
                console.log(xhr.responseText);
                console.log('Erro na requisição: ' + error);
        }
    })
}


$("#excluir").on("click",function(){
    if(idUltimaConf == undefined){
        alert("Nenhuma confissão selecionada")
    }else{
        const dados = new FormData;
        dados.append('func', 'apagar')
        dados.append('idConf', idUltimaConf)
        
        apagarConfissao(dados)
    }
})



$("#pass").on("click",function(){

    passarConf()
})
