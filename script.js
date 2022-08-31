
 let dados = [
    {
        id: 1,
        nome: "Leandri",
        sobrenome: "Junior",
        idade: "22",
        cep: "81490391",
        rua: "Waldemar Orso",
        numero:"490",
        bairro:"Campo de santana",
        cidade:"Curitiba",
        estado:"Parana"
    }
];



var objeto = dados.filter((value)=>{ return value.id == 1 }); 
function addDados(){
    
    let id = 1
    if(dados.length > 0){
        id = dados[dados.length - 1].id + 1
    }
    if(document.querySelector("form").checkValidity()){
        dados.push({
            id,
            nome: document.getElementById("nome").value,
            sobrenome: document.getElementById("sobrenome").value,
            idade: document.getElementById("idade").value,
            cep: document.getElementById("cep").value,
            rua: document.getElementById("rua").value,
            numero: document.getElementById("numero").value,
            bairro: document.getElementById("bairro").value,
            cidade: document.getElementById("cidade").value,
            estado: document.getElementById("estado").value
        });
        inserirDados();
    }
    
}


function excluirAll ( ){
   
    var di = dados.id
    var check = document.querySelector("input[name= 'checkAll']:checked");
    ckList = document.querySelectorAll("input[name='checkLinha']:checked");
    ckList.forEach(function(el) {
    dados.splice(dados.indexOf(di), 1)
    el.parentElement.parentElement.remove();
    
  });
}


$(document).ready(function() {
    function limpa_formulário_cep() {
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    $("#cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) { 
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                    } 
                    else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } 
            else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            limpa_formulário_cep();
        }
    });
});

function marcarTodos(){
var check = document.querySelector("input[name= 'checkAll']");
var checkLinha = document.querySelectorAll("input[name='checkLinha']");
    
    for(let i = 0; i < checkLinha.length; i++){
        if(check.checked){
            $(checkLinha).prop('checked', true);
        }
        else{
            $(checkLinha).prop('checked', false);
        }
    }

}
