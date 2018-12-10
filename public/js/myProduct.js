$(function () {
    getStatus = 1;
    getMyProducts()
});

function changeStatusMyProductTrue() {
    getStatus = 1;
    getMyProducts()
}

function changeStatusMyProductFalse() {
    getStatus = 2;
    getMyProducts()
}

var getStatus = 0;

function getMyProducts() {
    var idUser = $('#idUserMyProduct').val();
    $.ajax({
        url: '/lk/getMyProducts',
        data: {
            'id': idUser,
            'status': getStatus
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                $('#myBoughtItem').empty();
                response.myProducts.forEach(function (i) {
                    var product = $('<tr></tr>');
                    product.append($('<th></th>').append(i.id))
                            .append($('<th></th>').append(i.name))
                            .append($('<th></th>').append(i.buy_time))
                            .append($('<th></th>').append(i.end_time))
                            .append($('<th></th>').append(i.price));
                    $('#myBoughtItem').append(product);
                })
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