$(function () {
    getProductsAdmin();
});

$('#searchNameRentProduct').on('change', function () {
    getProductsAdmin()
});

function getProductsAdmin() {
    $('#rent_products').empty();
    var name = $('#searchNameRentProduct').val();
    $.ajax({
        url: '/admin/getProducts',
        data: {
            'name': name
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                response.products.forEach(function (i) {
                    var product = $('<tr data-product="' + i.id + '"></tr>');
                    product.append($('<th></th>').append(i.id))
                        .append($('<th></th>').append(i.name + ' ').append($('<i class="fa fa-archive" aria-hidden="true"></i>')))
                        .append($('<th></th>').append(i.create_at))
                        .append($('<th></th>').append(i.price))
                        .append($('<th></th>').append('<i class="fa fa-pencil" style="color: #4ba233; font-size: 20px; cursor: pointer;" onclick="editProductAdmin(' + i.id + ')" aria-hidden="true"></i>'))
                        .append($('<th></th>').append('<i class="fa fa-trash" style="color: #eb0810; font-size: 20px; cursor: pointer;;" onclick="deleteProductAdmin(' + i.id + ')" aria-hidden="true"></i>'));
                    $('#rent_products').append(product);
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

function addProductAdmin() {
    $('#addProductModal').modal('show');
}

function editProductAdmin(id) {
    $('#imageEditItem').empty();
    $('#idEditProductModal').val(id);
    var name = $('#nameEditProductModal'),
        price = $('#priceEditProductModal');
    $.ajax({
        url: '/admin/getProduct',
        data: {
            'id': id
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                $('#editProductModal').modal('show');
                $('#nameEditProductModal').val(response.product.name);
                $('#priceEditProductModal').val(response.product.price);
                $('#imageEditItem').append($('<img alt="" style="width: 200px; height: 200px" src="' + response.product.image + ' "/>'))
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

function deleteProductAdmin(id) {
    var answer = confirm('Вы действительно хотите удалить продукт?');
    if (answer) {
        $.ajax({
            url: '/admin/deleteProduct',
            data: {
                'id': id
            },
            dataType: 'json',
            type: "GET"
        }).done(function (response) {
            if (response !== undefined) {
                if (response.status === true) {
                    getProductsAdmin();
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
}
