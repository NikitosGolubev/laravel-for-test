@extends('layouts.app')

@section('title', 'Вход в аккаунт')

@section('page-content')
    @include('subviews.nav-guest')

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
