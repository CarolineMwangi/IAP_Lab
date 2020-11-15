$(document).ready(function(){
    $("#btn").click(function(event){
        event.preventDefault();
        

        var name_of_item = $('#name').val();
        var quantity_of_item = $('#quantity').val();

    
        alert("This feature is coming soon");
        return;
        
        $.ajax({
            url:"api.foodapi.com/order",
            type: "post",
            header:{
                "api-key":""
            },
            data: {
                "name_of_item":name_of_item,
                "quantity_of_item":quantity_of_item
            },
            success: function(data){
                //process data
            },
            error:function(error){
                alert("An error occurred");
            }
        });
   
    });
    
   
});