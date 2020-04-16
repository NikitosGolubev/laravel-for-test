@extends('layouts.app')

@section('page-content')
    <div class="nav">
        <a class="nav__item" href="/">Главная</a>
        <a class="nav__item" href="/login">Вход</a>
    </div>
    <div class='edit-profile'>
        <h2 class="heading">Создать профиль пользователя</h2>

        <form class='form' id='form' action='/auth/login' method='POST'>
            @csrf
            <ul class="form__list">
                <li class="form__item">
                    @component('components.field')
                        <label class='form__label' for="nickname">Никнейм:</label>
                        <input value="{{old('nickname')}}" class='form__input' id='nickname' name="nickname" type="text">

                        @slot('details')
                            @component('components.field-error', ['field_name' => 'nickname'])
                            @endcomponent
                        @endslot
                    @endcomponent
                </li>
                <li class="form__item">
                    <button class='form__button' type="submit">Войти</button>
                </li>
            </ul>
        </form>
    </div>
@endsection
