<x-layout title="Login">
<div style="width:400px;margin:0 auto;">
    <h2>Loginformular</h2>
    <form action="/login" method="POST">
    @csrf
    <div class="row">
    <label for="email">E-Mail:</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @error('email')<div class="error">{{ $message }}</div> @enderror
    </div>
    <div class="row">
    <label for="password">Passwort:</label>
    <input id="password" type="password" name="password">
    @error('password')<div class="error">{{ $message }}</div>@enderror
    </div>
    <div class="row">
     <button type="submit">Login</button>
    </div>
    </form>
</div>
</x-layout>
