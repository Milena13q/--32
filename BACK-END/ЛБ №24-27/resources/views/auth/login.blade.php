<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('images/jarovit.png') }}">
    <!-- Page Title  -->
    <title>Login | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.0') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="{{ route('auth.login') }}" class="logo-link">
                            <img class="logo-dark logo-img logo-img-lg" src="{{ asset('images/jarovit.png') }}"
                                 srcset="{{ asset('images/jarovit.png 2x') }}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Авторизация</h4>
                                    <div class="nk-block-des">
                                        <p>Введите Email и пароль для получения доступа к административной панели</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('auth.login.handle') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" id="default-01" name="email"
                                               placeholder="Введите свой Email" value="{{ old('email') }}">
                                        @error('email')
                                            <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Пароль</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                           data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="password"
                                               name="password"
                                               placeholder="Введите свой пароль">
                                        @error('password')
                                            <span id="fv-full-name-error" class="invalid">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('assets/js/bundle.js?ver=3.0.0') }}"></script>
<script src="{{ asset('assets/js/scripts.js?ver=3.0.0') }}"></script>
</body>
</html>
