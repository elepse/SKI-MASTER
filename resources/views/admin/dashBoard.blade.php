@extends('layouts/app')
@section('content')
    <h3 class="text-center">Поиск</h3>
<div class="col col-lg-6 offset-3 text-center row" >
            <div class="col col-lg-6">
            <dd>Имя</dd>
    <dt><input class="form-control" id="findNameUsers" type="text"></dt>
            </div>
            <div class="col col-lg-6">
                <dl>
                <dd>Почта</dd>
                <dt><input class="form-control" id="findEmailUsers" type="text"></dt>
                </dl>
            </div>
    </div>
    <hr>
<div class="col col-lg-12">

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Баланс</th>
            <th scope="col">Информация о аренде</th>
        </tr>
        </thead>
        <tbody id="users">

        </tbody>
    </table>
</div>
    <script src="{{asset('js/admin.js')}}">

    </script>
    <!-- модалка для редактирования баланса -->
    <div class="modal fade" id="changeBalanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="nameUserInChangeBalanceModal">Имя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5 id="currentBalanceInChangeBalanceModal">Баланс: ...</h5>
                    <div class="col col-lg-12 text-center">
                        <input type="number" class="form-control" id="balanceUserInChangeModal">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" onclick="addBalance()" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Модалка для просмотра аренды -->
    <div class="modal fade" tabindex="-1" id="rentInfo" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Информация об аренде<i class="fa fa-plus-square" aria-hidden="true"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="col col-lg-12">
                            <h3>Аренда</h3>

                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Наименование</th>
                                    <th scope="col">Создан</th>
                                    <th scope="col">Истёк</th>
                                    <th scope="col">Цена</th>
                                </tr>
                                </thead>
                                <tbody id="RentInfoItem">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
            </div>
        </div>
    </div>
    @endsection