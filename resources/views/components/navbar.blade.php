<div id="navbar-wrapper">
    <a class="navbar-item" id="navbar-home" href="{{ route('home') }}">
        <i class="fa-solid fa-house"></i>
        <h3>Home</h3>
    </a>
    <a class="navbar-item" id="navbar-my-profile" href="{{ url('/my-profile') }}">
        <i class="fa-solid fa-user"></i>
        <h3>My profile</h3>
    </a>
    <a class="navbar-item" id="navbar-upload" href="{{ route('upload') }}">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        <h3>Upload</h3>
    </a>
</div>
