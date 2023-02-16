$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#numero").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    function limpa_formulário_end() {

        $("#cep").val("");
    }

    $('input[name="opt"]').change(function () {

        if($('input[name="opt"]:checked').val() === "Sim") 
        {
            limpa_formulário_end();
            limpa_formulário_cep();
            $('#camposExtras').show();
            $('#insereCEP').hide();
            $("#cep").removeAttr('required');
        } 
        else
        {
            $("#cep").attr("required", "req");
            limpa_formulário_cep();
            limpa_formulário_end();
            $('#camposExtras').hide();
            $('#insereCEP').show();
        }
    });

    function validarCPF(cpf) {  
        cpf = cpf.replace(/[^\d]+/g,'');    
        if(cpf == '') return false; 
        // Elimina CPFs invalidos conhecidos    
        if (cpf.length != 11 || 
            cpf == "00000000000" || 
            cpf == "11111111111" || 
            cpf == "22222222222" || 
            cpf == "33333333333" || 
            cpf == "44444444444" || 
            cpf == "55555555555" || 
            cpf == "66666666666" || 
            cpf == "77777777777" || 
            cpf == "88888888888" || 
            cpf == "99999999999")
            return false;       
        // Valida 1o digito 
        add = 0;    
        for (i=0; i < 9; i ++)      
            add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
        // Valida 2o digito 
        add = 0;    
        for (i = 0; i < 10; i ++)       
            add += parseInt(cpf.charAt(i)) * (11 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11) 
            rev = 0;    
        if (rev != parseInt(cpf.charAt(10)))
            return false;       
        return true;   
    }   

    $("#cpf").blur(function() {

        if(validarCPF($(this).val()) == false)
        {
            //document.getElementById("checar").innerHTML = '<i class="fa fa-times-circle"></i>';
            alert('CPF Inválido!');
            document.getElementById("cad").disabled = true;
        }
        else
        {
            //document.getElementById("checar").innerHTML = '<i class="fa fa-check-circle"></i>';   
            document.getElementById("cad").disabled = false;         
        }

    });
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                /*Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");*/
                document.getElementById("errocep").innerHTML = '<div class="alert alert-info bg-info border-info text-white"> Carregando... </div>';

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        //$("#ibge").val(dados.ibge);
                        $('#camposExtras').show();
                        $('#errocep').hide();

                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        $("#camposExtras").hide();         
                        $('#errocep').show();                   
                        //alert("CEP não encontrado.");
                        document.getElementById("errocep").innerHTML = '<div class="alert alert-danger bg-danger border-danger text-white"> CEP não encontrado</div>';
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                $("#camposExtras").hide();         
                $('#errocep').show(); 
                //alert("Formato de CEP inválido.");
                document.getElementById("errocep").innerHTML = '<div class="alert alert-danger bg-danger border-danger text-white"> Formato de CEP inválido! </div>';

            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
            $("#camposExtras").hide();         
            $('#errocep').show();

            document.getElementById("errocep").innerHTML = '<div class="alert alert-warning bg-warning border-warning text-dark"> CEP incompleto ou vazio! </div>'; 
            setTimeout(function() { $("#errocep").hide(); }, 3000);
        }
    });
});