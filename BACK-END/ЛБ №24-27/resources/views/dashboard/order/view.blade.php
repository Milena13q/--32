@extends('layouts.app')

@section('content')
    <div class="nk-block-head">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Заказ <strong class="text-primary small">#{{ $response->id }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Дата создания: <span class="text-base">{{ $response->created_at->format('d.m.Y H:i:s') }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="nk-block-head-content">
                <a href="{{ route('dashboard.order.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Назад</span></a>
                <a href="{{ route('dashboard.order.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="invoice">
            <div class="invoice-action">
                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="{{ route('dashboard.order.export', ['id' => $response->id]) }}" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
            </div><!-- .invoice-actions -->
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img src="{{ asset('images/jarovit.png') }}" srcset="./images/jarovit.png 2x" alt="">
                </div>
                <div class="invoice-head">
                    <div class="invoice-contact">
                        <span class="overline-title">Заказ для</span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{ $response->client->first_name }} {{ $response->client->last_name }}</h4>
                            <ul class="list-plain">
                                <li><em class="icon ni ni-call-fill"></em><span>{{ $response->client->phone }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-desc">
                        <h3 class="title">Заказ</h3>
                        <ul class="list-plain">
                            <li class="invoice-id"><span>Номер заказа</span>:<span>{{ $response->id }}</span></li>
                            <li class="invoice-date"><span>Дата</span>:<span>{{ $response->created_at->format('d.m.Y H:i:s') }}</span></li>
                        </ul>
                    </div>
                </div><!-- .invoice-head -->
                <div class="invoice-bills">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="w-150px">ID</th>
                                <th class="w-60">Наименование</th>
                                <th class="w-30">Описание</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($response->orderItems as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->product->description }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="1">Сумма</td>
                                    <td>{{ $response->price }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div><!-- .nk-block -->
@endsection
