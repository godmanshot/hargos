@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-6">
            <h1 class="h1">Личные данные</h1>
            <form action="{{ route('update.user.info') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Иван" value="{{ auth()->user()->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="email@example.com" value="{{ auth()->user()->email }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Введите новый пароль или оставьте поле без изменения">
                    @if ($errors->has('password'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <input type="text" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль">
                </div>
                <div class="form-group">
                    <label for="photo">Фото</label>
                    <input type="file" id="photo" name="photo">
                    @if (auth()->user()->avatar)
                    <div>
                        <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="img-fluid" alt="Avatar">
                    </div>
                    @endif
                </div>
                <button class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
</div>
@endsection