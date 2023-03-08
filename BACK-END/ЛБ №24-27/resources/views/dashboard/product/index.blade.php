@extends('layouts.app')

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Услуги</h3>
                <div class="nk-block-des text-soft">
                    <p>Всего {{ $response->total() }} услуг</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="more-options">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('dashboard.product.create') }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Добавить</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @include('elements.with-message')
    <div class="nk-block">
        <form class="nk-tb-list is-separate mb-3" method="GET" action="{{ route('dashboard.product.index') }}">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col">
                    <span class="sub-text">#</span>
                    <input class="form-control form-control-sm" type="text" name="id" placeholder="Введите ID" value="{{ \request()->get('id') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Наименование</span>
                    <input class="form-control form-control-sm" type="text" name="title" placeholder="Введите Наименование" value="{{ \request()->get('title') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Описание</span>
                    <input class="form-control form-control-sm" type="text" name="description" placeholder="Введите Описание" value="{{ \request()->get('description') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Цена</span>
                    <input class="form-control form-control-sm" type="text" name="price" placeholder="Введите цену" value="{{ \request()->get('price') }}">
                </div>
                <div class="nk-tb-col tb-col-md">
                    <span class="sub-text"></span>
                    <button type="submit" href="#" class="btn btn-icon btn-sm btn-primary"><em class="icon ni ni-search"></em></button>
                </div>
            </div><!-- .nk-tb-item -->
            @foreach($response as $product)
                <div class="nk-tb-item">
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $product->id }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $product->title }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $product->description }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $product->price }}</span>
                    </div>
                    <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('dashboard.product.view', ['id' => $product->id]) }}"><em class="icon ni ni-eye"></em><span>Просмотр</span></a></li>
                                            <li><a href="{{ route('dashboard.product.edit', ['id' => $product->id]) }}"><em class="icon ni ni-repeat"></em><span>Изменить</span></a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ route('dashboard.product.destroy', ['id' => $product->id]) }}" onclick="return confirm('Вы точно хотите удалить?')">
                                                    <em class="icon ni ni-na"></em>
                                                    <span>Удалить</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-tb-item -->
            @endforeach
        </form><!-- .nk-tb-list -->
        {{ $response->appends(request()->query())->links('elements.pagination') }}
    </div><!-- .nk-block -->
@endsection
