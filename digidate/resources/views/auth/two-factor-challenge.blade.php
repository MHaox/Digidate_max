<form method="POST" action="{{ route('two-factor.login') }}">
    @csrf
    <div>
        <label for="code">Authentication Code</label>
        <input id="code" type="text" name="code" autofocus autocomplete="one-time-code">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>

    <div>
        <p>Or use one of your recovery codes.</p>
        <input id="recovery_code" type="text" name="recovery_code" autocomplete="one-time-code">
        <button type="submit">Login with Recovery Code</button>
    </div>
</form>