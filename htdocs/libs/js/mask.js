$(document).ready(function()
{
    $("#cep").mask("99999-999", {placeholder: "_____-___"});
    $("#cpf").mask("999.999.999-99", {placeholder: "___.___.___-__"});
    $("#data").mask("99/99/9999", {placeholder: "__/__/____"});
    $('#placa').mask("SSS-9999", {placeholder: "___-____",
          onKeyPress: function (value, event) {
     event.currentTarget.value = value.toUpperCase();
    }});    
});