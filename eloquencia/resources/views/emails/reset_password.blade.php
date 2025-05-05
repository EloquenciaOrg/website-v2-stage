<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #212529;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        h2 {
            color: #212529;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffc107;
            color: #212529;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bonjour {{ $member->firstname }}</h2>
        <p>Vous avez demandé une réinitialisation de votre mot de passe.</p>
        <p>Cliquez sur le bouton ci-dessous pour changer votre mot de passe :</p>

        <a href="{{ url('/change_password?reset=' . $member->reset) }}" class="btn">Réinitialiser mon mot de passe</a>

        <div class="footer">
            © 2025 Eloquentia
        </div>
    </div>
</body>
</html>

