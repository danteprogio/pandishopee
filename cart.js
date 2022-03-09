
// notification when you add to cart

function test(autoadd,price,seller){
    $.ajax({
     url:"./php/cart.php",
     method:"POST",
     data:{autoadd:autoadd,price:price,seller:seller},
     dataType:"json",   
     success:function(data){
     $(".custom-social-proof").append(data.data) 
    
   
   }
})
} 


// for cart form 
       // product qty section
       let $qty_up = $(".qty .qty-up");
     let $qty_down = $(".qty .qty-down");
     // let $input = $(".qty .qty_input");
 
     // click on qty up button
     $qty_up.click(function(e){
         let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
         if($input.val() >= 1 && $input.val() <= 9){
             $input.val(function(i, oldval){
                 return ++oldval;
                 
             });
            
             let $input1 = $(`.qty_input1[data-id='${$(this).data("id")}']`);
             
             
             var product = $input1.val()
             var qty = $input.val()
             test1(product,qty)

             
             
             
         }
     });

        // click on qty down button
        $qty_down.click(function(e){
         let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
         if($input.val() > 1 && $input.val() <= 10){
             $input.val(function(i, oldval){
                 return --oldval;
             });

             let $input1 = $(`.qty_input1[data-id='${$(this).data("id")}']`);
             var product = $input1.val()
             var qty = $input.val()
             test1(product,qty)
         }
     });

// function to update qty
function test1(product,qty){
    console.log(product,qty)
    $.ajax({
     url:"./php/update.php",
     method:"POST",
     data:{product:product,qty:qty},
     dataType:"json",   
     success:function(data){
    
   }
})
} 


$(document).ready(function(){
 
 function subtotal(view = '')
 {
     
     $.ajax({
     url:"./php/update.php",
     method:"POST",
     data:{view:view},
     dataType:"json",   
    success:function(data)
    {
     $('.subT').html(data.data);
     $('.subT1').html(data.data1);
    
    //  place order computation
     var subtotal = $('#sub1 p').text().substring(1);
     var discount = $('#discount p').text().substring(1);
     var delivery = $('#delivery p').text().substring(1);

     var total = parseInt(subtotal) + parseInt(delivery) - parseInt(discount)
     $('.total').html('₱'+ total);
     
   }
  });
 }
 
 subtotal();
 
 setInterval(function(){ 
  subtotal();;  
 }, 1000);



});
