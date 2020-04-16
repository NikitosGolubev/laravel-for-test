@extends('layouts.app')

@section('page-content')
        @include('subviews.nav-guest')

        <div class='edit-profile'>
            <h2 class="heading">Создать профиль пользователя</h2>

            <form class='form' id='form' action='/user/create' method='POST' enctype='multipart/form-data'>
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
                        @component('components.field')
                            <label class='form__label' for="name">Имя:</label>
                            <input value="{{old('user_name')}}" class='form__input' id='name' name="user_name" type="text">

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'user_name'])
                                @endcomponent
                            @endslot
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="surname">Фамилия:</label>
                            <input value="{{old('last_name')}}" class='form__input' id='surname' name="last_name" type="text">

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'last_name'])
                                @endcomponent
                            @endslot
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__inline-label' for="avatar">Аватар:</label>
                            <input class='form__inline-input' id='avatar' name="avatar" type="file">

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'avatar'])
                                @endcomponent
                            @endslot
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__label' for="phone">Телефон:</label>
                            <input value="{{old('phone_number')}}" class='form__input' id='phone' name="phone_number" type="text">

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'phone_number'])
                                @endcomponent
                            @endslot
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
                                @if (old('gender_type') == 1)
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
                                @if (old('gender_type') == 2)
                                checked
                                @endif
                            />

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'gender_type'])
                                @endcomponent
                            @endslot
                        @endcomponent
                    </li>
                    <li class="form__item">
                        @component('components.field')
                            <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                            <input
                                class='form__inline-input'
                                @if (old('accept_mailing'))
                                checked
                                @endif
                                value="1"
                                name="accept_mailing"
                                id='showPhone'
                                type="checkbox"/>

                            @slot('details')
                                @component('components.field-error', ['field_name' => 'accept_mailing'])
                                @endcomponent
                            @endslot
                        @endcomponent
                    </li>
                    <li class="form__item">
                        <button class='form__button' type="submit">Отправить</button>
                    </li>
                </ul>
            </form>
        </div>
@endsection
