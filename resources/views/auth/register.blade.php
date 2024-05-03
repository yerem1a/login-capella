<!-- resources/views/auth/register.blade.php -->

<div style="width: 400px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <p>Register</p>
        <table style="width: 100%;">
            <tr>
                <td><label for="name">Name</label></td>
                <td><input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus></td>
            </tr>
            <tr>
                <td><label for="tanggal_lahir">Tanggal Lahir (dd/mm/yyyy)</label></td>
                <td><input id="tanggal_lahir" type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input id="email" type="email" name="email" value="{{ old('email') }}" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>
                    <div style="position: relative;">
                        <input id="password" type="password" name="password" required>

                    </div>
                </td>
            </tr>
            <tr>
                <td><label for="password_confirmation">Confirm Password</label></td>
                <td><input id="password_confirmation" type="password" name="password_confirmation" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit">Sign Up</button></td>
            </tr>
        </table>
    </form>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
