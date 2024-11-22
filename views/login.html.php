<?php 

if (!empty($_SESSION['email'])){ ?>

    <nav>
        <ul>
            <li><a href="reserver.php">Réserver</a></li>
            <li><a href="profil.php">Mon Profil</a></li>
            <li><a href="logout.php">Se déconnecter</a></li>
        </ul>
    </nav>
<?php } else { ?>

    <form method="post">
        <label for="email">Email</label>
        <input type="email" name="user_mail" id="email" required>
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Se connecter</button>
    </form>
<?php } ?>






