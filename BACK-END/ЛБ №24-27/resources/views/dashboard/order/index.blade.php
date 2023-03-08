@extends('layouts.app')

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Заказы</h3>
                <div class="nk-block-des text-soft">
                    <p>Всего {{ $response->total() }} заказов</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="more-options">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('dashboard.order.create') }}"
                                   class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{ route('dashboard.order.create') }}"
                                   class="btn btn-primary d-none d-md-inline-flex"><em
                                        class="icon ni ni-plus"></em><span>Добавить</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @include('elements.with-message')
    <div class="nk-block">
        <form class="nk-tb-list is-separate mb-3" method="GET" action="{{ route('dashboard.order.index') }}">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col">
                    <span class="sub-text">#</span>
                    <input class="form-control form-control-sm" type="text" name="id" placeholder="Введите ID" value="{{ \request()->get('id') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Цена</span>
                    <input class="form-control form-control-sm" type="text" name="price" placeholder="Введите цену" value="{{ \request()->get('price') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Заказчик</span>
                    <input class="form-control form-control-sm" type="text" name="client_id" placeholder="Введите ID заказчика" value="{{ \request()->get('client_id') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Статус</span>
                    <div class="form-control-select">
                        <select class="form-control" id="default-06" name="status">
                            <option value="0">Любое</option>
                            @foreach(\App\Enums\OrderStatusEnum::cases() as $status)
                                <option @selected((int)\request()->get('status') === $status->value) value="{{ $status->value }}">{{ $status->title() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Дата создания</span>
                </div>
                <div class="nk-tb-col tb-col-md">
                    <button type="submit" href="#" class="btn btn-icon btn-sm btn-primary"><em class="icon ni ni-search"></em></button>
                </div>
            </div><!-- .nk-tb-item -->
            @foreach($response as $order)
                <div class="nk-tb-item">
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $order->id }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $order->price }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>#{{ $order->client_id }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ \App\Enums\OrderStatusEnum::tryFrom($order->status)?->title() }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $order->created_at->format('d.m.Y H:i:s') }}</span>
                    </div>
                    <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('dashboard.order.view', ['id' => $order->id]) }}"><em
                                                        class="icon ni ni-eye"></em><span>Просмотр</span></a></li>
                                            <li><a href="{{ route('dashboard.order.edit', ['id' => $order->id]) }}"><em
                                                        class="icon ni ni-repeat"></em><span>Изменить</span></a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ route('dashboard.order.destroy', ['id' => $order->id]) }}" onclick="return confirm('Вы точно хотите удалить?')">
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
