@extends('layouts/app')
@section('content')
    <h3 class="text-center">Поиск</h3>
    <div class="col col-lg-6 offset-3 text-center">
        <dl>
            <dd>Наименование</dd>
            <dt><input type="text" class="form-control" id="searchNameRentProduct"></dt>
        </dl>
        <button class="btn-success btn" onclick="addProductAdmin()">
            Добавить наименование <i class="fa fa-plus-square" aria-hidden="true"></i>
        </button>
    </div>
    <hr>
    <div class="col col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Создан</th>
                <th scope="col">Цена</th>
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody id="rent_products">

            </tbody>
        </table>
    </div>

    <script src="{{asset('js/adminProducts.js')}}">

    </script>
    <!-- модалка для редактирования баланса -->
    <div class="modal fade" tabindex="-1" id="addProductModal" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Добавление наименования <i class="fa fa-plus-square" aria-hidden="true"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="newProductForm" enctype="multipart/form-data" action="/admin/addProduct" method="POST">
                    <div class="modal-body">
                        <div class="col col-lg-12 row">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col col-lg-6">
                                <dl>
                                    <dd>Наименование</dd>
                                    <dt><input class="form-control" type="text" name="name" id="nameAddProductModal"></dt>
                                </dl>
                            </div>
                            <div class="col col-lg-6">
                                <dl>
                                    <dd>Цена</dd>
                                    <dt><input class="form-control" type="number" name="price" id="priceAddProductModal"></dt>
                                </dl>
                            </div>
                            <br>

                        </div>
                        <br>
                        <div class="col col-lg-12 text-center">
                            <input type="file" multiple="multiple" id="imageForProduct" name="image" accept=".txt,image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!-- Редактирование -->
    <div class="modal fade" tabindex="-1" id="editProductModal" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование наименования <i class="fa fa-pencil" aria-hidden="true"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="newProductForm" enctype="multipart/form-data" action="/admin/editProduct" method="POST">
                    <div class="modal-body">
                        <div class="col col-lg-12 row">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="idEditProductModal">
                            <div class="col col-lg-6">
                                <dl>
                                    <dd>Наименование</dd>
                                    <dt><input class="form-control" type="text" name="name" id="nameEditProductModal"></dt>
                                </dl>
                            </div>
                            <div class="col col-lg-6">
                                <dl>
                                    <dd>Цена</dd>
                                    <dt><input class="form-control" type="number" name="price" id="priceEditProductModal"></dt>
                                </dl>
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class="col col-lg-12 text-center">
                            <input type="file" multiple="multiple" id="imageForProduct" name="image" accept=".txt,image/*">
                        </div>
                        <br>
                        <div class="col col-lg-12 justify-content-center text-center">
                            <h4>Текущиее изображение:</h4>
                                <div class="col col-lg-6 offset-3" id="imageEditItem">

                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection