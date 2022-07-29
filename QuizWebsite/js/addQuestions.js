var count = 0;
$("#add").click(()=>{
    let htmlstring = "";
    count++;
    console.log("Test");
    var nrA = window.prompt("How many answers does the question have?(2-4): ");
    //alert(nrA);
    if(nrA<=4 && nrA>=2){
        htmlstring = '<div>' +
            '<label>Question: '+ count +'</label><br>' +
            '<input type="text" class="form-control" id="question' + count + '" name="question' + count + '" required />' + //question1
            '<input type="hidden" name="question' + count + 'NrAns" value="' + nrA + '"/>' + '<div class="row"><br>'+ //question1NrAns
            '<div class="row"><br>'; 
        for(let i=1;i<=nrA;i++){
            htmlstring+='<div class="col-md-6">'+
            '<label>Answer: '+ i +'</label><br>' +
            '<input type="text" class="form-control" id="question' + count + 'Answer' + i + '" name="question' + count + 'Answer' + i + '" required />'+ //question1Answer1
            '</div>';
        }
        htmlstring+='<div class="col-sm-8"><label for="question' + count + 'RA">Choose the right answer:</label>'+
        '<select id="question' + count + 'RA" class="form-select form-select-sm" name="question' + count + 'RA" size="1">'; //question1RA
        for(let i=1;i<=nrA;i++){
            htmlstring+= '<option value="'+ i +'">'+ i +'</option>';
        }
        htmlstring+='</select></div><br>';
        htmlstring+='</div></div></div><br>';
    }
    console.log(htmlstring);
    $(".questions").append(htmlstring);
    if (count>=2){
        $("#sub").show();
    }
});



$("#sub").hide();

