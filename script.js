$(document).ready(function () { 
    //AUTOCOMPLETE OFF
    var timer;
    timer = setTimeout(function(){
        var allInputs = $( "input" );
        for(var i =0; i < allInputs.length; i++){
            if($(allInputs[i]).attr('autocomplete') == 'off'){
                $(allInputs[i]).val('');
            }
        }
        clearTimeout(timer);
        console.log($(allInputs));
    },300);
});

