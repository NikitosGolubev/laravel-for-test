@extends('layouts.app')

@section('title', 'Привет, '.$user->nickname)

@section('page-content')
    <div class="nav">
        <a class="nav__item" href="/auth/logout">Выйти из аккаунта</a>
    </div>
    <div class="user-data-profile">
        <div class="my-profile">
            <h2 class="heading">Мой профиль</h2>
            <div class="profile">
                <div class="avatar">
                    <img src="{{asset($user->avatar)}}" alt="Аватар" class="avatar__pic">
                </div>
                <div class="information">
                    <div class="nickname">{{ $user->nickname }}</div>
                    <div class="user-name">
                        <span class="name">{{ $user->name }}</span>
                        <span class="surname">{{ $user->surname }}</span>
                    </div>
                    <a href='tel:{{$user->phone_number}}' class="phone">{{$user->phone_number}}</a>
                </div>
            </div>
        </div>

        <div class='edit-profile'>
            <h2 class="heading">Профиль пользователя</h2>

            <form class='form' id='form'>
                @csrf
                <ul class="form__list">
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="nickname">Никнейм:</label>
                            <input disabled value="{{$user->nickname}}" class='form__input' id='nickname' name="nickname" type="text">
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="name">Имя:</label>
                            <input disabled value="{{$user->name}}" class='form__input' id='name' name="user_name" type="text">
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="surname">Фамилия:</label>
                            <input disabled value="{{$user->surname}}" class='form__input' id='surname' name="last_name" type="text">
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="phone">Телефон:</label>
                            <input disabled value="{{$user->phone_number}}" class='form__input' id='phone' name="phone_number" type="text">
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <div class="form__title">Пол:</div>
                            <label class='form__inline-label' for="male">Мужской</label>
                            <input
                                class='form__inline-input'
                                name='gender_type'
                                value="1"
                                id='male'
                                type="radio"
                                disabled
                                @if ($user->gender == 1)
                                checked
                                @endif
                            />
                            <label class='form__inline-label' for="female">Женский</label>
                            <input
                                class='form__inline-input'
                                name='gender_type'
                                value="2"
                                id='female'
                                type="radio"
                                disabled
                                @if ($user->gender == 2)
                                checked
                                @endif
                            />
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                            <input
                                class='form__inline-input'
                                disabled
                                @if ($user->mailing_accepted)
                                checked
                                @endif
                                value="1"
                                name="accept_mailing"
                                id='showPhone'
                                type="checkbox"/>
                        @endcomponent
                    </li>
                </ul>
            </form>
        </div>
    </div>
@endsection
