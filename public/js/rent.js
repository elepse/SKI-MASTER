$(function () {
    searchProposal();
});

var  products = [];

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
                products = [];
                response.products.forEach(function (i, n) {
                    var product = $('<div class="col col-lg-2 text-center" style="background-color:#d0d0d0; min-width: 20em; height: 20em; margin-bottom: 25px; margin-left: 30px;border-radius: 10px"></div>');
                    product.append($('<h3></h3>').append(i.name));
                    product.append($('<div class="col col-12"></div>').append($('<img src="'+ i.image +'">')));
                    product.append($('<button class="btn btn-primary" data-product="'+ i.id + '" onclick="addCart('+ i.id +')" style="margin-top: 10px">В корзину | </button>').append(i.price + ' ₽'));
                    $('#findElements').append(product);
                    products.push(i);
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

function addCart(id) {
    $('<button[data-product(id)]>').prop('disabled', true);
   var cartProduct =  products.find(function (i) {
        return id === i.id;
    });
    var cart = sessionStorage.getItem('cart');
    cart = JSON.parse(cart);
    if (cart == null){
        cart = [];
    }
    cart.push(cartProduct);
    cart = JSON.stringify(cart);
    sessionStorage.setItem('cart',cart);
}
