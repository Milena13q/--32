<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/jarovit.png') }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.0"') }}">
</head>

<body class="bg-white" onload="printPromot()">
<div class="nk-block">
    <div class="invoice invoice-print">
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
<script>
    function printPromot() {
        window.print();
    }
</script>
</body>

</html>
