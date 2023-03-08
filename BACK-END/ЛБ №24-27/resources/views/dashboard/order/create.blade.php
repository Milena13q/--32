@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('dashboard.order.store') }}">
        @csrf
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block">
                    <span class="preview-title-lg overline-title">Добавление нового заказа</span>
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-06">Заказчик</label>
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="default-06" name="client_id">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="default-07">Продукты</label>
                            <div class="form-control-wrap">
                                <div class="form-control-select-multiple">
                                    <select class="form-select" id="default-07" multiple="" name="products[]" aria-label="multiple select example">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <input type="submit" class="btn btn-success" value="Сохранить">
                <a href="{{ route('dashboard.order.index') }}" class="btn btn-light">Назад</a>
            </div>
        </div>
    </form>
@endsection
