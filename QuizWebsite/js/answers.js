$('#results').click((e) => {
    e.preventDefault();
    let correct = 0;
    let count = $("#nrQ").val() - 1;
    for (let i = 1; i <= count; i++) {
        //$("#myForm input:radio[name='Question"+ count +"']")
        // let radioButtons = $("#myForm input:radio[name='Question"+ (i+1) +"']:checked");
        console.log($('input[name=Question' + i + ']:checked', '#myForm').val());
        if ($('input[name=Question' + i + ']:checked', '#myForm').val() == $('#Question' + i + 'RAns').val()) {
            console.log("Correct");
            correct++;
        }

    }
    console.log("You got: " + correct + "/" + count);
    $('#ResultAns').append("<br>You got: " + correct + "/" + count);
});