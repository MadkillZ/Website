
//I decided to make an api singleton class which also acts as a facade for the api calls
class api{
    constructor(){
        this.url = "https://gendacproficiencytest.azurewebsites.net/API/ProductsAPI";
        this.NewId = 5;
    }
    //This function is used to get all the products from the api making use of page number and page size, as well ass a filter
    getProducts(page, sizeOfPage, filter=""){
        return new Promise((resolve, reject)=>{
            $.getJSON((this.url + "?page="+ page +"&pageSize="+ sizeOfPage + "&filter="+ filter), json => {
                resolve(json);
                });
        });
    }

    //This function is used to insert a new product into the api
    insertProduct(id, name, category, price){
        return new Promise((resolve, reject)=>{
            $.ajax({
                url: this.url,
                type: "POST",
                data: {
                    Id: id,
                    Name: name,
                    Category: category,
                    Price: price
                },
                success: function (result) {
                    //console.log(result);
                    resolve(result);
                },
                async: true
            });
        });
    }

    //This function is used to return a certain product with id
    getProduct(id){
        return new Promise((resolve, reject)=>{
            $.getJSON((this.url + "/"+ id), json => {
                resolve(json);
                });
        });
    }

    //This function takes in an id and deletes the product with that id
    deleteProduct(id){
        return new Promise((resolve, reject)=>{
            $.ajax({
                url: this.url + "/" + id,
                type: "DELETE",
                success: function (result) {
                    //console.log(result);
                    resolve(result);
                },
                async: true
            });
        });
    }

    //This function is used to update an existing product with new values
    updateProduct(id, name, category, price){
        return new Promise((resolve, reject)=>{
            $.ajax({
                url: this.url + "/" + id,
                type: "PUT",
                data: {
                    Id: id,
                    Name: name,
                    Category: category,
                    Price: price
                },
                success: function (result) {
                    resolve(result);
                },
                async: true
            });
        });
    }
}

//Where the singleton is made
const singletonInstance = new api();
Object.freeze(singletonInstance);

//the makeCard function just makes the cards for the front page
let makeCard = (product) => {
    let card = $("<div>").addClass("card");
    let cardBody = $("<div>").addClass("card-body");
    let cardTitle = $("<h5>").addClass("card-title").text(product.Name);
    let cardCategory = $("<p>").addClass("card-text").text("Category: " + product.Category);
    let cardPrice = $("<p>").addClass("card-text").text("$" + product.Price);
    let cardButton = $("<a href='/PHP/ProductManager.php?id="+ product.Id +"'>").addClass("btn btn-primary").text("View/Edit");
    //here it just appends everything at the top to the complete card
    cardBody.append(cardTitle);
    cardBody.append(cardCategory);
    cardBody.append(cardPrice);
    cardBody.append(cardButton);
    card.append(cardBody);
    return card;
}

//this makes a card for a single product, and also adds an edit and delete button
let makeSingleCard = (product) => {
    let card = $("<div>").addClass("card");
    let cardBody = $("<div>").addClass("card-body");
    let cardTitle = $("<h5>").addClass("card-title").text("Name: " +product.Name);
    let cardCategory = $("<p>").addClass("card-text").text("Category: " + product.Category);
    let cardPrice = $("<p>").addClass("card-text").text("Price: $" + product.Price);
    let messageLabel = $("<br><label>").attr("id", "message").attr("style","display: none;").addClass("alert alert-danger");
    let cardButton1 = $("<br><button id='Edit'>").addClass("btn btn-primary").text("Edit");
    let cardButton2 = $("<button id='Delete'>").addClass("btn btn-primary").text("Delete");
    cardButton1.click(()=>{
        editEntry(product);
    });
    cardButton2.click(()=>{
        deleteEntry(product);
        $(messageLabel).removeClass('alert alert-danger').addClass('alert alert-success');
        $(messageLabel).text("Successfully deleted product");
        $(messageLabel).show();
    });
    //here it just appends everything at the top to the complete card
    cardBody.append(cardTitle);
    cardBody.append(cardCategory);
    cardBody.append(cardPrice);
    cardBody.append(messageLabel);
    cardBody.append(cardButton1);
    cardBody.append(cardButton2);
    card.append(cardBody);
    return card;
}

//used for making sure the right values are inputted into the form and if not it tells you what was not done in the right way
let errorCheck = (id="", name="", category="", price="") => {
    let errorMessage = "";
    if(id==""){
        errorMessage = "Id cannot be empty!";
    }
    else if(isNaN(id)){
        errorMessage = "Id must be a number!";
    }
    else if(name==""){
        errorMessage = "Name cannot be empty!";
    }
    else if(category==""){
        errorMessage = "Category cannot be empty!";
    }
    else if(isNaN(category)){
        errorMessage = "Category must be a number!";
    }
    else if(price==""){
        errorMessage = "Price cannot be empty!";
    }
    else if(isNaN(price)){
        errorMessage = "Price must be a number!";
    }
    return errorMessage;
}
    