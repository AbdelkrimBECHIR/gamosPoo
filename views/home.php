<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamos - Accueil</title>
    <link rel="stylesheet" href="/css/home.css"> 
</head>
<body>
    <div class="gamos-container">
        <header class="gamos-header">
            <h1 class="gamos-title">Gamos</h1>
        </header>
        
        <div class="gamos-form-container">
            <form action="/Home/handleForm" method="POST" class="gamos-form">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">

                <div class="gamos-field">
                    <label for="start_date" class="gamos-label">Date de début :</label>
                    <input type="date" id="start_date" name="start_date" class="gamos-input" required>
                </div>

                <div class="gamos-field">
                    <label for="end_date" class="gamos-label">Date de fin :</label>
                    <input type="date" id="end_date" name="end_date" class="gamos-input" required>
                </div>

                <button type="submit" class="gamos-button">Voir les véhicules</button>
            </form>
        </div>
    </div>
</body>
</html>
