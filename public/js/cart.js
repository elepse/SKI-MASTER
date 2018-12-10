$(function () {
    getCart()
});
var sum = 0;
function getCart() {
    sum = 0;
    $('#productsCart').empty();
    var cart = sessionStorage.getItem('cart');
    cart = JSON.parse(cart);
    console.log(cart);
    if (cart == null || cart.length === 0) {
        $('#noneProducts').show();
    } else {
        $('#noneProducts').hide();
        cart.forEach(function (i) {
            var product = $('<tr></tr>');
            product.append($('<th></th>').append(i.id))
                .append($('<th></th>').append(i.name + ' ').append($('<i class="fa fa-archive" aria-hidden="true"></i>')))
                .append($('<th></th>').append(i.price))
                .append($('<th></th>').append('<i class="fa fa-trash" style="color: #eb0810; font-size: 20px; cursor: pointer;;" onclick="deleteProductCart(' + i.id + ')" aria-hidden="true"></i>'));
            $('#productsCart').append(product);
            sum += parseInt(i.price);
        });
    }
    $('#sumCart').text(sum + '₽');
}

function deleteProductCart(id) {
    var cart = sessionStorage.getItem('cart');
    cart = JSON.parse(cart);
    var deleteIndex = cart.findIndex(function (i) {
        return id === i.id;
    });
    if (deleteIndex >= 0) {
        cart.splice(deleteIndex, 1);
    }
    cart = JSON.stringify(cart);
    sessionStorage.setItem('cart',cart);
    getCart();
}

function buyCart() {
    var cart = sessionStorage.getItem('cart');
    cart = JSON.parse(cart);
    console.log(cart);
    if (sum < userBalance && (cart != null && cart.length > 0)){
        $.ajax({
            url: '/lk/buyCart',
            data: {
                '_token': window.csrf,
                'sum' : sum,
                'products' : cart
            },
            dataType: 'json',
            type: "post"
        }).done(function (response) {
            if (response !== undefined) {
                if (response.status === true) {
                    sessionStorage.clear();
                    getCart();
                    window.location.replace('/lk/rent');
                } else if (response.status === false || response.status === 'error') {
                    alert(response.error);
                } else {
                    alert('Ошибка запроса. Обратитесь к администратору.');
                }
            } else {
                alert('Ошибка запроса. Обратитесь к администратору.');
            }
        });
    }else{
        $('#notEnoughtMoney').modal('show');
    }
}

function clearCart() {
sessionStorage.clear();
getCart();
}
