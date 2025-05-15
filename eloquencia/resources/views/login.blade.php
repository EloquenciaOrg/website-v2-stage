<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'config.php';

include 'Utils.php';
$utils = new Utils();

if(isset($_GET['error']) && $_GET['error'] == 'disconnected') {
    $error = [
        'type' => 'danger',
        'message' => 'Vous avez été déconnecté'
    ];
}

if (isset($_POST['submit'])) {
    $req = $db->prepare('SELECT COUNT(*) FROM admins WHERE email = :email AND password = :password');
    $req->execute(array(
        'email' => htmlspecialchars($_POST['email']),
        'password' => hash('sha256', htmlspecialchars($_POST['password']))
    ));
    $req = $req->fetch();
    if ($req[0] == 1) {
        $token = rand(1000000, 9999999);
        if (isset($_POST['remember'])) {
            setcookie('token_admin', $token, time() + 24*365*3600, null, null, false, true);
            $expiration = date('Y-m-d H:i:s', time() + 24*365*3600);
        } else {
            setcookie('token_admin', $token, time() + 24*3600, null, null, false, true);
            $expiration = date('Y-m-d H:i:s', time() + 24*3600);
        }
        $req = $db->prepare('INSERT INTO tokens_admin(token, user_id, expiration) VALUES (:cookie, (SELECT ID FROM admins WHERE email = :email), :expiration)');
        $req->execute(array(
            'cookie' => $token,
            'email' => htmlspecialchars($_POST['email']),
            'expiration' => $expiration
        ));
        header('Location: index.php');
    } else {
        $error = [
            'type' => 'danger',
            'message' => 'Identifiants incorrects'
        ];
    }
}

session_start();
if (isset($_POST['forgotSubmit'])) {
    if($_POST['captcha'] == $_SESSION['captcha']) {
        $req = $db->prepare("SELECT COUNT(*) FROM admins WHERE email = :email");
        $req->execute(array(
            'email' => htmlspecialchars($_POST['email'])
        ));
        $req = $req->fetch();
        if ($req[0] == 1) {
            $token = rand(1000000, 9999999);
            $req = $db->prepare('UPDATE admins SET reset = :token WHERE email = :email');
            $req->execute(array(
                'token' => $token,
                'email' => htmlspecialchars($_POST['email'])
            ));
            $utils->sendRecoveryEmail($_POST['email'], $token);
            $error = [
                'type' => 'success',
                'message' => 'Email envoyé'
            ];
        } else {
            $error = [
                'type' => 'danger',
                'message' => 'Adresse email inconnue'
            ];
        }
    } else {
        $error = [
            'type' => 'danger',
            'message' => 'Captcha incorrect'
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <meta name="keywords" content="éloquence, oratoire, association, loi 1901, parler en public, discours, formation, cours en ligne">
    <meta name="author" content="Eloquéncia">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="fr">
    <meta property="og:site_name" content="Eloquéncia">
    <meta property="og:site" content="https://eloquencia.org">
    <meta property="og:title" content="Accueil">
    <meta property="og:description" content="Eloquéncia est une association loi 1901 visant à promouvoir l'éloquence et l'art oratoire">
    <title>Accueil - Eloquéncia</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-center">Connexion</h2>
            </div>
            <div class="card-body">
                <?php if (isset($error)) { ?>
                    <div class="alert alert-<?php echo $error['type']; ?>" role="alert">
                        <?php echo $error['message']; ?>
                    </div>
                <?php } ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" required name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" required name="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check" for="remember">Se souvenir de moi</label>
                    </div>
                    <div class="d-flex gap-2 justify-content-between align-items-center mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Connexion</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#forgotModal">Mot de Passe oublié ?</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotModalLabel">Mot de passe oublié</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" required name="email">
                    </div>
                    <div class="mb-3">
                        <label for="captcha" class="form-label">Captcha</label>
                        <img src="Captcha/captcha.php" alt="Captcha" class="d-block">
                        <input type="text" class="form-control" id="captcha" required name="captcha">
                    </div>
                    <button type="submit" class="btn btn-primary" name="forgotSubmit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center py-3">
  <div class="container">
    <small class="text-muted">
      © 2025 <strong>Eloquéncia</strong> | Fait avec 💙 et hébergé à Marseille | <a href="/mentions_legales">Mentions légales</a>
    </small>
  </div>
  </footer>

<script>
    document.getElementById('email').focus();
</script>
</body>

</html>