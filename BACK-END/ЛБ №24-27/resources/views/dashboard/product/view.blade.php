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
                                    <p>Стандартная информация об услуге</p>
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
                                    <span class="data-label">Имя</span>
                                    <span class="data-value">{{ $response->title }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                <div class="data-col">
                                    <span class="data-label">Фамилия</span>
                                    <span class="data-value">{{ $response->description }}</span>
                                </div>
                            </div><!-- data-item -->
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value">{{ $response->price }}</span>
                                </div>
                            </div><!-- data-item -->
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
@endsection
