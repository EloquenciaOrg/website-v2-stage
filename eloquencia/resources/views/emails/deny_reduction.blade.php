<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demande de réduction refusée</title>
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

        .note {
            color: #dc3545;
            font-weight: bold;
        }

        .footer {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>❌ Réduction refusée</h2>
            <p>Bonjour {{ $reduction->name }},</p>

            <p>Nous sommes désolés de vous informer que votre demande de réduction pour adhérer à <strong>Éloquencia</strong> a été <span class="note">refusée</span>.</p>

            <p>Si vous pensez qu’il s’agit d’une erreur ou si vous souhaitez fournir d’autres justificatifs, vous pouvez nous contacter à nouveau.</p>

            <p class="footer">L'équipe Éloquencia</p>
        </div>
    </div>
</body>
</html>
