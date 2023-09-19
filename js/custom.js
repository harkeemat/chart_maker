
$(document).ready(function() {
   
    $('.sub_trader').find('input').change(function(){
        var sum=0;
        $(".input").each(function(){
            if($(this).val() != "")
              sum += Number($(this).val());   
        });
    
        $(".total:text").val(sum);
  
      });






} );
