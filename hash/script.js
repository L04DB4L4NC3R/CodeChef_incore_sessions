$(document).ready(function(){



    $("#enc").on("click",(e)=>{

        e.preventDefault();
        var plaintext = $("#plain").val();
        $("#crypt").val('');
        $.post("action.php",{plain:plaintext},(data)=>{
            $("#crypt").val(data);
        });
    });



    $("#dec").on("click",(e)=>{

        e.preventDefault();
        var hash = $("#crypt").val();

        $("#plain").val('');
        $.post("action.php",{crypt:hash},(data)=>{
            $("#plain").val(data);
        });
    });

    $("#clear").on("click",(e)=>{
        e.preventDefault();
        $("#plain").val('');
        $("#crypt").val('');

    });

});
