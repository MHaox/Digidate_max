@if (auth()->user()->two_factor_secret)
    <!-- Disable 2FA -->
    <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
        @csrf
        @method('DELETE')

        <div>
            <p>Two-factor authentication is currently enabled on your account.</p>
            <button type="submit">Disable Two-Factor Authentication</button>
        </div>
    </form>

    <!-- Show QR Code for 2FA -->
    <div>
        {!! auth()->user()->twoFactorQrCodeSvg() !!}
        <p>Scan this QR code with your Google Authenticator app.</p>
    </div>

    <!-- Show 2FA Recovery Codes -->
    <div>
        <h3>Recovery Codes:</h3>
        <ul>
            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                <li>{{ $code }}</li>
            @endforeach
        </ul>
    </div>

@else
    <!-- Enable 2FA -->
    <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
        @csrf
        <button type="submit">Enable Two-Factor Authentication</button>
    </form>
@endif