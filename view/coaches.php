<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coachs disponibles</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<header class="topbar">
  <div class="nav">
    <a class="brand" href="coach.php">
      <img alt="logo" width="24" height="24"
        src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none'><path d='M6 14c2.5-6 9.5-6 12 0' stroke='%2322c55e' stroke-width='2' stroke-linecap='round'/><path d='M7 7h10' stroke='%23e5e7eb' stroke-width='2' stroke-linecap='round'/></svg>">
      SportCoach <span class="badge">Coachs</span>
    </a>
    <nav class="navlinks">
      <a class="active" href="coach.php">Coachs</a>
      <a href="dashboard.sportif.php">Dashboard Sportif</a>
      <a href="login.php">Déconnexion</a>
    </nav>
  </div>
</header>

<main class="container">
  <div class="header">
    <div>
      <h1 class="h-title">Coachs disponibles</h1>
      <p class="h-sub">Liste à remplir depuis MySQL (PHP).</p>
    </div>

    <div class="actions">
      <input class="input" style="max-width:260px" placeholder="Rechercher (front only)" />
      <select class="select" style="max-width:220px">
        <option>Toutes disciplines</option>
        <option>Football</option>
        <option>Tennis</option>
        <option>Natation</option>
      </select>
    </div>
  </div>

  <section class="card">
    <div class="card-h">
      <h2 class="card-title">Résultats</h2>
      <span class="pill">Liste</span>
    </div>
    <div class="card-b">

      <!-- PHP LOOP HERE: foreach($coachs as $c) { ... } -->
      <div class="grid grid-3" id="coachList">
        <!-- Laisse vide si tu veux.
             Sinon tu peux garder 1 card "exemple" puis la remplacer par PHP -->
        <div class="empty">
          Zone des coachs (cards). Remplissage côté PHP.
        </div>
      </div>

      <div class="hr"></div>

      <div class="note">
        Action "Voir profil" → profil.coach.php?id=...
        Action "Réserver" → page/section de réservation (tu peux gérer via dashboard sportif).
      </div>

    </div>
  </section>

  <div class="footer">SportCoach • Template front</div>
</main>

<!-- Modal -->
<div class="modal-backdrop" id="confirmModal" aria-hidden="true">
  <div class="modal" role="dialog" aria-modal="true" aria-label="Confirmation">
    <div class="modal-h">
      <h3 class="modal-title">Confirmer</h3>
      <button class="modal-x" type="button" data-modal-close>&times;</button>
    </div>
    <div class="modal-b">
      <p data-modal-msg style="margin-top:0;color:var(--text)"></p>
      <div class="note" data-modal-hint></div>
      <div class="modal-actions">
        <button class="btn" type="button" data-modal-close>Annuler</button>
        <button class="btn primary" type="button" data-modal-close>OK</button>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/app.js"></script>
</body>
</html>
