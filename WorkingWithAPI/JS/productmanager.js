
let submitForm =(event) =>{
    event.preventDefault();
    //window.history.back();
}

//This is the edit entry function. The point of this is to make a new form, which can then be used to update values of a certain product
let editEntry = (product) => {
    $(".Items").empty();
    let form = $("<form>").addClass("form-group").attr("onsubmit", "submitForm(event)");
    let id = $("<input>").addClass("form-control").attr("type", "hidden").attr("id", "id").attr("value", product.Id);
    let name = $("<input>").addClass("form-control").attr("type", "text").attr("id", "name").attr("value", product.Name);
    let nameLabel = $("<label>").attr("for", "name").text("Name: ");
    let category = $("<input>").addClass("form-control").attr("type", "text").attr("id", "category").attr("value", product.Category);
    let categoryLabel = $("<label>").attr("for", "category").text("Category: ");
    let price = $("<input>").addClass("form-control").attr("type", "text").attr("id", "price").attr("value", product.Price);
    let priceLabel = $("<label>").attr("for", "price").text("Price: ");
    let messageLabel = $("<br><label>").attr("id", "message").attr("style","display: none;").addClass("alert alert-danger");
    let submit = $("<br><button>").addClass("btn btn-primary").attr("type", "submit").text("Submit");
    //This is the submit button, which does some error checking but then finally takes the new values and updates the product
    submit.click(()=>{
        let id = $("#id").val();
        let name = $("#name").val();
        let category = $("#category").val();
        let price = $("#price").val();
        //error checking part to make sure nothing is wrong
        let error = errorCheck(id, name, category, price);
        if(error!=""){
            $(messageLabel).text(error);
            $(messageLabel).show();
        }
        else{
            //Here the singleton is used again to update the product
            singletonInstance.updateProduct(id, name, category, price).then((json)=>{
                console.log(json);
                if(json==""){
                    //This just displays a simple message inside a label to tell you if everything worked out as it should
                    $(messageLabel).removeClass('alert alert-danger').addClass('alert alert-success');
                    $(messageLabel).text("Successfully updated product");
                    $(messageLabel).show();
                    return;
                };
                //window.location.href = "/PHP/ProductManager.php";
            });
        }
    });

    //This is where everything is appended to the form before the form is appended to page
    form.append(id);
    form.append(nameLabel);
    form.append(name);
    form.append(categoryLabel);
    form.append(category);
    form.append(priceLabel);
    form.append(price);
    form.append(messageLabel);
    form.append(submit);
    $(".Items").append(form);
}


//This function is used to delete product. It takes in the full value of the product but only uses ID to finally remove it from the api
let deleteEntry = (product) => {
    console.log("delete");
    singletonInstance.deleteProduct(product.Id).then((json)=>{
        console.log(json);
    });
}


$( document ).ready(function() {
    //gets ID value from php input which was send from previous page
    let currentID = $("#id").val();
    //uses getProduct from singleton to make a card which can then be displayed
    singletonInstance.getProduct(currentID).then((json)=>{
       $(".Items").append(makeSingleCard(json)); //makeSingleCard is defined in JS/API.js
    });
    console.log(currentID);

});
