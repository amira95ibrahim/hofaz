<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forget Password Email</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; text-align: center;">
        <h1 style="color: #007bff;">Forget Password Email</h1>

        <p style="font-size: 16px;">You can reset your password by clicking the link below:</p>

        <a href="{{ route('reset.password.get', $token) }}"
            style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; font-size: 16px; border-radius: 5px;">Reset
            Password</a>
    </div>
</body>

</html>
