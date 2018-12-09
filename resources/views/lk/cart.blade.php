@extends('layouts/app')
@section('content')
    <div class="col col-lg-12 text-center">
        <h3>Корзина</h3>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody id="productsCart">

            </tbody>
        </table>
        <h4 id="noneProducts"> Вы ничего не выбрали</h4>
        <hr>
        <h3 id="sumCart"></h3>
        <button class="btn btn-danger">
            Удалить
        </button>
        <button class="btn btn-primary" onclick="buyCart()">
            Купить
        </button>
    </div>
    <div class="modal fade" id="notEnoughtMoney" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Недостаточно средств</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col col-lg-12 text-center">
                        <button class="btn btn-primary">
                            Пополнить
                        </button>
                        <br>
                        <p>ИЛИ</p>
                        <p>Обратитесь к администратору!</p>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/cart.js')}}">

    </script>

    @endsection
