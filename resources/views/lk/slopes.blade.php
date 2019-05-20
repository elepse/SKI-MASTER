@extends('layouts.app')
@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card card-route">
            <img class="card-img-top" src="{{asset('img/route1.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title text-center">Склон "Метель"</h2>
                <h5 class="card-title text-center" style="color: deepskyblue">Сложность: простой</h5>
                <hr>
                <p class="card-text" style="font-size: 18px; text-align: justify;">
                    Склон предназначен прежде всего для любителей, которые уже имеют навыки катания.
                    Оборудован подъёмником, трамплинами для прыжков. Имеет протяжённость 850 метров на которой каждый день мы обновляем снег.
                    Здесь вы можете попробовать исполнять ваши первые элементы, благодаря невысоким трамплинам.
                    На данный момент самый популярный среди наших склонов, идеально подходит для неспешного приносящего удовольсвие катания.
                </p>
                <hr>
                <div class="col-lg-12">
                    <h5 class="card-text text-center" style="font-weight: bold;">
                        Количество людей на склоне: <span id="totalClient1">@php echo($counts[0]['people_total']) @endphp</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="card card-route">
            <img class="card-img-top" src="{{asset('img/route2.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title text-center">Склон "Буран"</h2>
                <h5 class="card-title text-center" style="color: orange">Сложность: Средний</h5>
                <hr>
                <p class="card-text" style="font-size: 18px; text-align: justify;">
                    Склон предназначен для заядлых любителей покататься,его протяжённость 1 200 м!!! Оборудован удобных подъёмником и и после такого
                    длинного спуска вы можете погреться в нашей лаунж зоне и выпить чащечку кофе готовясь к следующему покорению. Прекрасное место для дружеских
                    соревнований с вашими товарищами и исполнение элементов, потому что вы здесь можете встретить трамлины, перила и местами достаточно крутые уклоны.
                    Склон ждёт своих покорителей.
                </p>
                <hr>
                <div class="col-lg-12">
                    <h5 class="card-text text-center" style="font-weight: bold;">
                        Количество людей на склоне: <span id="totalClient2">@php echo($counts[1]['people_total']) @endphp</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="card card-route">
            <img class="card-img-top" src="{{asset('img/route2.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title text-center">Склон "Пурга"</h2>
                <h5 class="card-title text-center" style="color: orangered">Сложность: сложный</h5>
                <hr>
                <p class="card-text" style="font-size: 18px; text-align: justify;">
                    О, даа! Это тот самый склон, который хотят увидеть все профи, извилистая трасса, протяжённость 1 500 м, на верхушке вы можете быть доставлены
                    вертолётом. Или на нашем специальном быстром подъёмнике, сверху вы можете оставить свою именную ленточку на специальных перилах, а дальше пустить с
                    этого невероятного склона вниз за кофе и печеньками. Для вас были организованы самые высоки трамплины и прочные конструкции для того, чтобы вы могли
                    воплотить любой желаемый элемент в жизнь.
                </p>
                <hr>
                <div class="col-lg-12">
                    <h5 class="card-text text-center" style="font-weight: bold;">
                        Количество людей на склоне: <span id="totalClient3">@php echo($counts[2]['people_total']) @endphp</span>
                    </h5>
                </div>
            </div>
        </div>

        <div class="card card-route">
            <img class="card-img-top" src="{{asset('img/route1.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title text-center">Склон "Ветер"</h2>
                <h5 class="card-title text-center" style="color: mediumpurple">Сложность: учебный</h5>
                <hr>
                <p class="card-text" style="font-size: 18px; text-align: justify;">
                    Это несомненно лучший выбор для новичков, здесь вы можете заниматься с нашим инструктором или комфортно учиться сами,
                    этому способствует низкий угол наклона, широкая траса и быстрый подъёмник, и не большая протяжённость делает всё,
                    чтобы вы имели минимальное время между своими попытками.
                </p>
                <hr>
                <div class="col-lg-12">
                    <h5 class="card-text text-center" style="font-weight: bold;">
                        Количество людей на склоне: <span id="totalClient4">@php echo($counts[3]['people_total']) @endphp</span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection