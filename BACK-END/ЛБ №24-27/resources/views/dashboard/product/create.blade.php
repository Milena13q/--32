@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('dashboard.product.store') }}">
        @csrf
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block">
                    <span class="preview-title-lg overline-title">Добавление новой услуги</span>
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Наименование</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Наименование">
                                    @error('title')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Описание</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Описание">
                                    @error('description')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Цена</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Цена">
                                    @error('price')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="preview-hr">
                <input type="submit" class="btn btn-success" value="Сохранить"></input>
                <a href="{{ route('dashboard.product.index') }}" class="btn btn-light">Назад</a>
            </div>
        </div>
    </form>
@endsection
