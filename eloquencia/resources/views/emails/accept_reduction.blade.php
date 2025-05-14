<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demande de réduction acceptée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .content {
            padding: 30px;
        }

        h2 {
            color: #212529;
            text-align: center;
        }

        p {
            color: #212529;
            margin-bottom: 15px;
        }

        .code-box {
            font-size: 1.2em;
            background-color: #ffc107;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 20px 0;
        }

        .footer {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>🎉 Réduction acceptée</h2>
            <p>Bonjour {{ $reduction->name }},</p>

            <p>Nous avons le plaisir de vous informer que votre demande de réduction pour adhérer à <strong>Éloquencia</strong> a bien été <strong style="color: green;">acceptée</strong>.</p>

            <p>Voici votre code de réduction personnel :</p>

            <div style="text-align: center;">
                <span class="code-box">{{ $code->code }}</span>
            </div>

            <p>Utilisez ce code lors de votre inscription pour bénéficier de la réduction.</p>

            <p class="footer">L'équipe Éloquencia</p>
        </div>
    </div>
</body>
</html>
