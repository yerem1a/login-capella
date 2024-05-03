<!-- resources/views/auth/login.blade.php -->

<style>
    .login-form-container {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
    }

    .login-form {
        width: 100%;
    }

    .login-form table {
        width: 100%;
    }

    .login-form table td {
        padding: 10px;
        text-align: left;
    }

    .login-form button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .login-form button:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="login-form-container">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input id="password" type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember Me</label>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Login</button></td>
            </tr>
        </table>
    </form>
</div>
