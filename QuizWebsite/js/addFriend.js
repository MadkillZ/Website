$("#addfriend").click(() => {
    //var result = confirm("Are you sure you want to delete this user");
    //if (result) {
    //Logic to delete the item
    let params = '{"user_1":' + '"' + yourID + '"' + ',"user_2":' + '"' + userID + '"' + '}';
    const obj = JSON.parse(params);
    console.log(obj);
    $.ajax({
        url: './php/friendRequest.php',
        type: 'post',
        data: obj,
        success: function (response) {
            console.log(response);
            $("#message").text(response);
        }
    });
    //}
});