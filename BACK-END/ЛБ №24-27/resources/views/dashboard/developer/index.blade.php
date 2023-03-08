@extends('layouts.app')

@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Разработчики</h3>
                <div class="nk-block-des text-soft">
                    <p>Всего {{ $response->total() }} разработчиков</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="more-options">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt">
                                <a href="{{ route('dashboard.developer.create') }}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                <a href="{{ route('dashboard.developer.create') }}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Добавить</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @include('elements.with-message')
    <div class="nk-block">
        <form class="nk-tb-list is-separate mb-3" method="GET" action="{{ route('dashboard.developer.index') }}">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col">
                    <span class="sub-text">#</span>
                    <input class="form-control form-control-sm" type="text" name="id" placeholder="Введите ID" value="{{ \request()->get('id') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Имя Фамилия</span>
                    <input class="form-control form-control-sm" type="text" name="name" placeholder="Введите Имя Фамилию" value="{{ \request()->get('name') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Email</span>
                    <input class="form-control form-control-sm" type="text" name="email" placeholder="Введите Email" value="{{ \request()->get('email') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Номер телефона</span>
                    <input class="form-control form-control-sm" type="text" name="phone" placeholder="Введите Номер телефона" value="{{ \request()->get('phone') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Адрес</span>
                    <input class="form-control form-control-sm" type="text" name="address" placeholder="Введите Адрес" value="{{ \request()->get('address') }}">
                </div>
                <div class="nk-tb-col tb-col-mb">
                    <span class="sub-text">Должность</span>
                    <input class="form-control form-control-sm" type="text" name="position" placeholder="Введите Должность" value="{{ \request()->get('position') }}">
                </div>
                <div class="nk-tb-col tb-col-md">
                    <span class="sub-text"></span>
                    <button type="submit" href="#" class="btn btn-icon btn-sm btn-primary"><em class="icon ni ni-search"></em></button>
                </div>
            </div><!-- .nk-tb-item -->
            @foreach($response as $user)
                <div class="nk-tb-item">
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $user->id }}</span>
                    </div>
                    <div class="nk-tb-col">
                        <a href="{{ route('dashboard.developer.index') }}">
                            <div class="user-card">
                                <div class="user-avatar bg-primary">
                                    <span>{{ $user->getAvatarWords() }}</span>
                                </div>
                                <div class="user-info">
                                    <span class="tb-lead">{{ $user->first_name }} {{ $user->last_name }} <span class="dot dot-success d-md-none ms-1"></span></span>
                                    <span>{{ $user->email }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $user->phone }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $user->address }}</span>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                        <span>{{ $user->position }}</span>
                    </div>
                    <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{ route('dashboard.developer.view', ['id' => $user->id]) }}"><em class="icon ni ni-eye"></em><span>Просмотр</span></a></li>
                                            <li><a href="{{ route('dashboard.developer.edit', ['id' => $user->id]) }}"><em class="icon ni ni-repeat"></em><span>Изменить</span></a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ route('dashboard.developer.destroy', ['id' => $user->id]) }}" onclick="return confirm('Вы точно хотите удалить?')">
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
