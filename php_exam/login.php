<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="Forum">
            <a>Forum</a>
        </div>
        <div class="container">
            <div class="margcont">
                <h1>S'identifier</h1>
                <div class="input-group">
                    <a>Nom d'utilisateur</a>
                    <input type="text">
                </div>
                <div class="input-group">
                    <a>Mot de passe</a>
                    <input type="password">
                </div>
                <div class="input-group">
                    <button class="login" type="submit">Connexion</button>
                </div>
                <div class="text">
                    <a>Pas encore membre ?</a>
                    <button class="register" onclick="window.location.href = 'register.php';">Créer un compte</button>
                    <a class="link">Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
    </body>
</html>