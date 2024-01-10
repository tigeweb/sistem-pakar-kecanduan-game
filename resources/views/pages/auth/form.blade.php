<form id="loginSubmit_{{ $id }}" action="{{ route('login') }}" class="form-area" method="POST">
    @csrf

    <x-forms.input-group label="username" id="username_{{ $id }}" name="username"
        placeholder="masukan username anda..." className="no-invalid-style username" />
    <x-forms.input-password label="Password" id="password_{{ $id }}" name="password"
        className="no-invalid-style password" />
    <x-buttons.btn-save value="Masuk >" className="w-100 mt-4" />
    <p class="mt-2">username: admin </br> password: password123</p>
</form>
