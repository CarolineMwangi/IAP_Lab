$(document).ready(function(){
    $("#st-btn").click(function(event){
        event.preventDefault();

        var order_id = $('#status-id').val();

        alert("This feature is coming soon");
        return;

        $.ajax({
            url:"api.foodapi.com/order",
            type: "post",
            header:{
                "api-key":""
            },
            data: {
                "order_id":order_id
            },
            success: function(data){
                //process data
            },
            error:function(error){
                alert("An error occurred");
            }
        });
    })

})