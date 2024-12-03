@extends('layouts.app')

@section('content')
    <div id="login-wrapper">
        <div class="auth-form" id="login-container">
            <div id="login-form-title">
                <h3>Login</h3>
            </div>
            <form id="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Log in</h1>
                <input class="form-input" type="text" placeholder="Username" name="username" required>
                <input class="form-input" type="password" placeholder="Password" name="password" required>
                <button type="submit" class="submit-button">
                    <h3>Log in</h3>
                </button>
            </form>
        </div>

        <div class="auth-form" id="signup-container">
            <h1 style="margin-bottom: 40px;">Sign up</h1>
            <form id="signup-form" action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="file-upload">
                    <input type="file" id="file-input" name="profile_picture">
                    <label for="file-input" id="file-input-label"></label>
                    <img alt="Profile picture preview" id="profile-picture">
                </div>
                <input class="form-input" type="text" placeholder="Username" name="username" required>
                <div>
                    <input class="form-input" type="text" placeholder="Forename" name="forename" required>
                    <input class="form-input" type="text" placeholder="Surname" name="surname" required>
                </div>
                <input class="form-input" type="password" placeholder="Password" name="password" required>
                <input class="form-input" type="password" placeholder="Confirm password" name="password_confirmation" required>
                <button type="submit" class="submit-button">
                    <h3>Sign up</h3>
                </button>
            </form>
        </div>
    </div>
@endsection
