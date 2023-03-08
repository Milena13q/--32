@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('dashboard.client.update', ['id' => $response->id]) }}">
        @csrf
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block">
                    <span class="preview-title-lg overline-title">Редактирование клиента</span>
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Имя</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Имя" value="{{ $response->first_name }}">
                                    @error('first_name')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Фамилия</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Фамилия" value="{{ $response->last_name }}">
                                    @error('last_name')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $response->email }}" disabled>
                                    @error('email')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Номер телефона</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Номер телефона" value="{{ $response->phone }}">
                                    @error('phone')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="default-01">Адрес</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Адрес" value="{{ $response->address }}">
                                    @error('address')
                                        <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="col-sm-6">--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="form-label" for="default-06">Default Select</label>--}}
                        {{--                            <div class="form-control-wrap ">--}}
                        {{--                                <div class="form-control-select">--}}
                        {{--                                    <select class="form-control" id="default-06">--}}
                        {{--                                        <option value="default_option">Default Option</option>--}}
                        {{--                                        <option value="option_select_name">Option select name</option>--}}
                        {{--                                        <option value="option_select_name">Option select name</option>--}}
                        {{--                                    </select>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                    </div>
                </div>
                <hr class="preview-hr">
                <span class="preview-title-lg overline-title">Пароль будет сгенерирован случайным образом!</span>
                <input type="submit" class="btn btn-success" value="Сохранить"></input>
                <a href="{{ route('dashboard.client.index') }}" class="btn btn-light">Назад</a>
            </div>
        </div>
    </form>
@endsection
