

function ocultar(){
    $("#resultado").toggle();
}


function jsonToTable(response){
    

    //Cabecalho
    if(response.length>0){
        let text = '<table class="table">';
        text += "<thead><tr>";
        for(coluna in response[0]){
            text += '<th scope="col">' + coluna + "</th>";
        }
       text += "</tr></thead>";
    
       text += "<tbody>";
       for(let linha=0; linha<response.length; linha++){       
            
            //Linha da tabela com uma cidade
            text += "<tr>";

            //Campos da tupla
            for(coluna in response[linha]){
                text += "<td>" + response[linha][coluna] + "</td>";
            }
            text += "</tr>";

        }   

        text += "</tbody></table>";

        $("#resultado").replaceWith('<div id="resultado">' + text + '</div>');
    }
}


function limpar(){

    $("#btn-limpar").toggle();

    //Funcao executada se o servidor retornar OK
    let successDrop = function(dados){
        console.log("Remoção realizada com sucesso!");
        $("#btn-limpar").toggle();
    }

    //Funcao executada se o servidor retornar ERRO
    //jQuery XMLHttpRequest (jqXHR) object 
    let errorDrop = function(jqXHR,
        textStatus, errorThrown){
            console.log("Not OK3a: (" + textStatus + ") (" +
            errorThrown + ")");
            $("#btn-limpar").toggle();
        }

    let dados = {remover: 1};
    //Espera receber um json, entao nada deveria ser echoado sem um 'json_encode' na resposta.
    //Chamada assincrona
    $.ajax({
        url: "db_mysql.php",
        type: "get",
        dataType: "json",
        data: dados,
        success: successDrop,
        error: errorDrop
    });

}


function inserir(){

    $("#btn-inserir").toggle();

    //Funcao executada se o servidor retornar OK
    let successFunc = function(dados){
        console.log("Inserção realizada com sucesso!");
        $("#btn-inserir").toggle();
    }

    //Funcao executada se o servidor retornar ERRO
    //jQuery XMLHttpRequest (jqXHR) object 
    let errorFunc = function(jqXHR,
        textStatus, errorThrown){
            console.log("Not OK2: (" + textStatus + ") (" +
            errorThrown + ")");
            $("#btn-inserir").toggle();
        }

    let dados = {inserir: 1};
    //Chamada assincrona
    $.ajax({
        url: "db_mysql.php",
        type: "get",
        dataType: "json",
        data: dados,
        success: successFunc,
        error: errorFunc
    });

}

function sendForm(){

    //O campo de entrada de dados da pagina HTML
    //armazenado em um vetor
    let dados = {cidade: $("#cidade").val()};  //chave: valor

    //Funcao executada se o servidor retornar OK
    let successFunc = function(dados){
        jsonToTable(dados);
    }

    //Funcao executada se o servidor retornar ERRO
    //jQuery XMLHttpRequest (jqXHR) object 
    let errorFunc = function(jqXHR,
        textStatus, errorThrown){
            console.log("Not OK4: (" + textStatus + ") (" +
            errorThrown + ")");
        }

    //Chamada assincrona
    $.ajax({
        url: "db_search_cidades.php",
        type: "get",
        dataType: "json",
        data: dados,
        success: successFunc,
        error: errorFunc
    });

}

$(document).ready( function(){

    $("#btn-submit").click(function(event){
        sendForm();
    });

    $("#btn-ocultar").click(function(event){
        ocultar();
    });

    $("#btn-limpar").click(function(event){
        limpar();
    });

    $("#btn-inserir").click(function(event){
        inserir();
    });

});
