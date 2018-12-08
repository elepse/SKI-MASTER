$(function () {

});

function findUsers() {
    var name = $('#findNameUsers').val,
        email = $('#findEmailUsers').val;
    $('#users').empty();

    $.ajax({
        url: 'rent/search',
        data: {
            'name' : name,
            'email': email
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {

            } else if (response.status === false || response.status === 'error') {
                alert(response.error);
            } else {
                alert('Ошибка запроса. Обратитесь к администратору.');
            }
        } else {
            alert('Ошибка запроса. Обратитесь к администратору.');
        }
    });
}