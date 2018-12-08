@extends('layouts/app')
@section('content')
    <div class="col col-lg-12 row">
        <div class="col col-6 offset-3">
            <dl>
                <dd class="text-center"><h3>Поиск по названию</h3></dd>
                <dt><input class="form-control" id="findNames" type="text"></dt>
            </dl>
        </div>
        <div class="col col-lg-12">
            <div class="row justify-content-center" id="findElements">

            </div>
        </div>
    </div>
    <script src="{{asset('js/rent.js')}}"></script>
@endsection