@extends('layouts.app')
@section('content')
    <div class="col col-lg-12 text-center">
        <input id="idUserMyProduct"  value="{{Auth::user()->id}}" hidden>
        <p><span><a onclick="changeStatusMyProductTrue()" href="javascript:void(0);">Действующие</a></span> | <span><a onclick="changeStatusMyProductFalse()" href="javascript:void(0);">Завершённые</a></span></p>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Создан</th>
                <th scope="col">Истёк</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody id="myBoughtItem">

            </tbody>
        </table>
    </div>
    <script src="{{asset('js/myProduct.js')}}"></script>
    @endsection

