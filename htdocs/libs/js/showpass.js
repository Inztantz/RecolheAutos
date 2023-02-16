$(document).ready(function() 
{
    $("#exibirSenha i").on('click', function(event) 
    {
        event.preventDefault();

        if($('#exibirSenha input').attr("type") == "text")
        {
            $('#exibirSenha input').attr('type', 'password');
            $('#exibirSenha i').addClass( "fa-eye-slash" );
            $('#exibirSenha i').removeClass( "fa-eye" );
        }

        else if($('#exibirSenha input').attr("type") == "password")
        {
            $('#exibirSenha input').attr('type', 'text');
            $('#exibirSenha i').removeClass( "fa-eye-slash" );
            $('#exibirSenha i').addClass( "fa-eye" );
        }
    })
});