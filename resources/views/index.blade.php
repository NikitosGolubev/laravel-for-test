<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Test</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
<div class="wrapper">
    <main class="main-content">
        <div class='edit-profile'>
            <h2 class="heading">Создать профиль пользователя</h2>

            <form class='form' id='form' action='/user/create' method='POST' enctype='multipart/form-data'>
                @csrf
                <ul class="form__list">
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__label' for="nickname">Никнейм:</label>
                                <input value="{{old('nickname')}}" class='form__input' id='nickname' name="nickname" type="text">
                            </div>

                            <div class="field__details">
                                @error('nickname')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__label' for="name">Имя:</label>
                                <input value="{{old('user_name')}}" class='form__input' id='name' name="user_name" type="text">
                            </div>

                            <div class="field__details">
                                @error('user_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__label' for="surname">Фамилия:</label>
                                <input value="{{old('last_name')}}" class='form__input' id='surname' name="last_name" type="text">
                            </div>

                            <div class="field__details">
                                @error('last_name')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__inline-label' for="avatar">Аватар:</label>
                                <input class='form__inline-input' id='avatar' name="avatar" type="file">
                            </div>

                            <div class="field__details">
                                @error('avatar')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__label' for="phone">Телефон:</label>
                                <input value="{{old('phone_number')}}" class='form__input' id='phone' name="phone_number" type="text">
                            </div>

                            <div class="field__details">
                                @error('phone_number')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
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
                            </div>

                            <div class="field__details">
                                @error('gender_type')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <div class="field">
                            <div class="field__content">
                                <label class='form__inline-label' for="showPhone">Я согласен получать email-рассылку</label>
                                <input
                                    class='form__inline-input'
                                    @if (old('accept_mailing'))
                                        checked
                                    @endif
                                    value="1"
                                    name="accept_mailing"
                                    id='showPhone'
                                    type="checkbox">
                            </div>

                            <div class="field__details">
                                @error('accept_mailing')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </li>
                    <li class="form__item">
                        <button class='form__button' type="submit">Отправить</button>
                    </li>
                </ul>
            </form>
        </div>
    </main>
</div>
</body>
</html>
