$(function () {
    findUsers();
});

function findUsers() {
    var name = $('#findNameUsers').val(),
        email = $('#findEmailUsers').val();
    $('#users').empty();

    $.ajax({
        url: '/admin/getUsers',
        data: {
            'name' : name,
            'email' : email
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                response.users.forEach(function (i,) {
                    var user = $('<tr data-user="'+ i.id +'"></tr>');
                    user.append($('<th></th>').append(i.id))
                        .append($('<th></th>').append(i.name + ' ').append($('<i class="fa fa-user" aria-hidden="true"></i>')))
                        .append($('<th></th>').append(i.email))
                        .append($('<th></th>').append(i.balance).append('<i class="fa fa-pencil" style="color: #4ba233; font-size: 20px; cursor: pointer;" onclick="getBalance('+ i.id +')" aria-hidden="true"></i>'));
                    $('#users').append(user);
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
$('#findEmailUsers').on('change',findUsers);
$('#findNameUsers').on('change',findUsers);

function getBalance(id) {
    $('#balanceUserInChangeModal').val("");
    $.ajax({
        url: '/admin/getBalanceUser',
        data: {
            'id' : id
        },
        dataType: 'json',
        type: "GET"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                $('#nameUserInChangeBalanceModal').text(response.user.name + ' ').append($('<i class="fa fa-user" aria-hidden="true"></i>')).data('userId',id);
                $('#currentBalanceInChangeBalanceModal').text('Баланс: ' + response.user.balance);
            } else if (response.status === false || response.status === 'error') {
                alert(response.error);
            } else {
                alert('Ошибка запроса. Обратитесь к администратору.');
            }
        } else {
            alert('Ошибка запроса. Обратитесь к администратору.');
        }
    });
    $('#changeBalanceModal').modal('show');
}

function addBalance(){
    var addBalance = $('#balanceUserInChangeModal').val(),
    userId =  $('#nameUserInChangeBalanceModal').data('userId');
    $.ajax({
        url: '/admin/addBalanceUser',
        data: {
            '_token': window.csrf,
            'id' : userId,
            'addBalance' : addBalance
        },
        dataType: 'json',
        type: "POST"
    }).done(function (response) {
        if (response !== undefined) {
            if (response.status === true) {
                findUsers();
                $('#changeBalanceModal').modal('hide');
            } else if (response.status === false || response.status === 'error') {
                alert(response.error);
            } else {
                alert('Ошибка запроса. Обратитесь к администратору.');
            }
        } else {
            alert('Ошибка запроса. Обратитесь к администратору.');
        }
    });
    $('#changeBalanceModal').modal('show');
}
