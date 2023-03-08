@if(session()->has('success'))
    <div class="alert alert-pro alert-success">
        <div class="alert-text">
            <h6>Системное уведомление</h6>
            <p>{{ session()->get('success') }}</p>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-pro alert-danger">
        <div class="alert-text">
            <h6>Ошибка</h6>
            <p>{{ session()->get('error') }}</p>
        </div>
    </div>
@endif
