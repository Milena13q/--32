@extends('layouts.app')

@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Информация</h4>
                                <div class="nk-block-des">
                                    <p>Стандартная информация о разработчике</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <div class="data-head">
                                <h6 class="overline-title">Базовая информация</h6>
                            </div>
                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Аватар</span>
                                    <div class="user-avatar bg-primary">
                                        <span>{{ $response->getAvatarWords() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Имя</span>
                                    <span class="data-value">{{ $response->first_name }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Фамилия</span>
                                    <span class="data-value">{{ $response->last_name }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value">{{ $response->email }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Номер телефона</span>
                                    <span class="data-value">{{ $response->phone }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Адрес</span>
                                    <span class="data-value">{{ $response->address }}</span>
                                </div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
