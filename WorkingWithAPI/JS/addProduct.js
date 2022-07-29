$( document ).ready(function() {
    $("form").submit(function(e){
        e.preventDefault();
    });
    //Here I get the new id which will be used when sending the new product to the api
    let newID;
    let getNewId = () => {
        jQuery.ajax({
            url: singletonInstance.url + "?page=1&pageSize=1&ascending=False",
            success: function (result) {
                newID = result.Results[0].Id + 1;
            },
            async: false
        });
    }

    getNewId();
    $("#ID").val(newID);
    console.log(newID);
    //On submit the new product is sent to the api
    $("#submit").click(()=>{
        let id = $("#ID").val();
        let name = $("#name").val();
        let category = $("#category").val();
        let price = $("#price").val();
        // console.log(id);
        // console.log(name);
        // console.log(category);
        // console.log(price);
        //This is where I error check to make sure all the inputs are valid
        let error = errorCheck(id, name, category, price);
        if(error!=""){
            $("#message").text(error);
            $("#message").show();
        }
        else{
            //making use of singleton to insert new product
            singletonInstance.insertProduct(id, name, category, price).then((json)=>{
                console.log(json);
                if(json==""){
                    //This just displays a simple message inside a label to tell you if everything worked out as it should
                    $("#message").removeClass('alert alert-danger').addClass('alert alert-success');
                    $("#message").text("Successfully added product");
                    $("#message").show();
                    return;
                }
            });
        }
        
    });
});



