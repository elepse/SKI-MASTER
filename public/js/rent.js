$(function () {
    searchProposal();
});
function searchProposal() {
    var name = $('#findNames').val();
    $('#findElements').empty();
    $.ajax({
        url: 'rent/search',
        data: {
            '_token': window.csrf,
            'name' : name
        },
        dataType: 'json',
        type: "POST"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                response.products.forEach(function (i, n) {
                    var product = $('<div class="col col-lg-2" style="background-color:#d0d0d0; min-width: 20em; height: 20em; margin-bottom: 25px; margin-left: 30px;border-radius: 10px"></div>');
                    product.append($('<h1></h1>').append(i.name));
                    $('#findElements').append(product);
                });
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

$('#findNames').on('change',function () {
    searchProposal();
});