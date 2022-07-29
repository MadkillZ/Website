let pageNr = 1;
let pageSize = 5;
let filterVal = "";

$( document ).ready(function() {
    //this is the code for the next button, which is used to load more products
    $("#next").click(()=>{
        pageNr++;
        console.log(pageNr);
        $(".Items").empty();
        LoadPage(filterVal); //this is the code for the next button, this is the function that loads the next page
    });

    //this is the code for the previous button, which is used to load the products from the previous page
    $("#previous").click(()=>{
        pageNr--;
        console.log(pageNr);
        $(".Items").empty();
        LoadPage(filterVal); //this is the code for the previous button, which is used to load previous products
    });

    //this is the search button, which applies the filter to the items on the screen and loads the filtered items
    $("#searchBtn").click(()=>{
        pageNr = 1;
        $(".Items").empty();
        filterVal = $("#searchVal").val(); 
        LoadPage(filterVal); //calls the function to load the first page
    });

    //this is the same as the search but allows the user to press ENTER to search instead of the search button
    $("#searchVal").keyup(function(event) {
        if (event.keyCode === 13) {
            pageNr = 1;
            $(".Items").empty();
            filterVal = $("#searchVal").val(); 
            LoadPage(filterVal); //calls the function to load the first page
        }
    });

    //The point of this function is loading everything on the first page, it makes use of a page size (pageSize) of 5 (which can be changed at the top of this page). 
    //The pageNr is used to determine which page to load, which is changed when the user clicks on the next button.
    let LoadPage = (filter="") => {
        singletonInstance.getProducts(pageNr,pageSize,filter).then((json)=>{
            let arrOfItems = json.Results;
            $(".Items").empty();
            if(arrOfItems.length<pageSize){
                $("#next").hide();
            }
            else{
                $("#next").show();
            }
            if(pageNr==1){
                $("#previous").hide();
            }
            else{
                $("#previous").show();
            }
            //this for loop goes through the array of items and makes the cards for each one
            for(i = 0; i < arrOfItems.length; i++){
                $(".Items").append(makeCard(arrOfItems[i])); //makeCard is defined in JS/API.js
                //console.log(arrOfItems[i]);
            }
        });
    }
    LoadPage(); //calls the function to load the first page
});


