$(function(){
   
   $('#select-art').on('change', onSelectArticuloChange);
   
});



$(function(){
   
   $('#inputisito').on('change', onChangeInputisito);
   
});

function onChangeInputisito(){
    
    var inputisin = document.getElementById("inputisito");
    
    if(inputisin.value < 1){
        
        inputisin.value = 1;
    };
    
}



function onSelectArticuloChange() {
    var articulo_id = $(this).val();
    
    // ajax
    
    $.get('/sistemafinal/public/changeart/'+articulo_id, function(data){
        
        $.ajax({
             url: "/sistemafinal/public/showcatalog/"+data.id,
             type: "GET",                
             async: true,
                       
             success: function(response){
                
                $("body").html(response);
                
                
             }
             
});
        
        
      
    });
}