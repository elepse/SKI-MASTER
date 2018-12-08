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
        </tr>
        </thead>
        <tbody id="users">

        </tbody>
    </table>
</div>
    @endsection