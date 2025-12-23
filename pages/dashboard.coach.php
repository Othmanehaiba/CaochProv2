<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Coach</title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<header class="topbar">
  <div class="nav">
    <a class="brand" href="dashboard.coach.php">
      <img alt="logo" width="24" height="24"
        src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none'><path d='M6 14c2.5-6 9.5-6 12 0' stroke='%2322c55e' stroke-width='2' stroke-linecap='round'/><path d='M7 7h10' stroke='%23e5e7eb' stroke-width='2' stroke-linecap='round'/></svg>">
      SportCoach <span class="badge">Coach</span>
    </a>
    <nav class="navlinks">
      <a class="active" href="dashboard.coach.php">Dashboard</a>
      <a href="profil.coach.php">Profil</a>
      <a href="login.php">Déconnexion</a>
    </nav>
  </div>
</header>

<main class="container">
  <div class="header">
    <div>
      <h1 class="h-title">Dashboard Coach</h1>
      <p class="h-sub">Demandes de séances à accepter/refuser (PHP).</p>
    </div>
    <div class="actions">
      <button class="btn primary" data-confirm data-confirm-title="Ajouter une séance"
        data-confirm-msg="Tu peux ouvrir un formulaire (ou page) pour créer une séance."
        data-confirm-action-hint="Créer une page create_seance.php ou un modal et POST vers SeanceController::create().">
        Ajouter une séance
      </button>
    </div>
  </div>

  <div class="grid grid-3">
    <div class="kpi">
      <div class="kpi-icon">
        <img alt="" width="20" height="20"
          src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='none'><path d='M3 10h14' stroke='%23f59e0b' stroke-width='2' stroke-linecap='round'/><circle cx='6' cy='10' r='2' stroke='%23e5e7eb' stroke-width='2'/></svg>">
      </div>
      <div>
        <div class="kpi-val"><!-- PHP -->0</div>
        <div class="kpi-lab">Demandes en attente</div>
      </div>
    </div>
    <div class="kpi">
      <div class="kpi-icon">
        <img alt="" width="20" height="20"
          src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='none'><path d='M4 11l3 3 9-9' stroke='%2322c55e' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg>">
      </div>
      <div>
        <div class="kpi-val"><!-- PHP -->0</div>
        <div class="kpi-lab">Validées aujourd’hui</div>
      </div>
    </div>
    <div class="kpi">
      <div class="kpi-icon">
        <img alt="" width="20" height="20"
          src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='none'><path d='M10 2v6l4 2' stroke='%23e5e7eb' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/><circle cx='10' cy='10' r='8' stroke='%2322c55e' stroke-width='2'/></svg>">
      </div>
      <div>
        <div class="kpi-val"><!-- PHP -->0</div>
        <div class="kpi-lab">Validées demain</div>
      </div>
    </div>
  </div>

  <div class="grid grid-2" style="margin-top:16px">
    <section class="card">
      <div class="card-h">
        <h2 class="card-title">Demandes</h2>
        <span class="pill wait">En attente</span>
      </div>
      <div class="card-b">
        <table class="table">
          <thead>
            <tr>
              <th>Sportif</th>
              <th>Date</th>
              <th>Heure</th>
              <th>Durée</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- PHP LOOP HERE -->
            <tr>
              <td colspan="5" class="empty">Aucune demande (remplissage PHP).</td>
            </tr>
          </tbody>
        </table>

        <div class="note" style="margin-top:12px">
          Accept / Reject: POST côté PHP, vérifie statut + propriétaire + CSRF.
        </div>
      </div>
    </section>

    <aside class="card">
      <div class="card-h">
        <h2 class="card-title">Prochain sportif</h2>
        <span class="pill ok">Prochain</span>
      </div>
      <div class="card-b">
        <div class="empty">
          Détails du prochain sportif + séance (à venir depuis PHP).
        </div>
        <div class="hr"></div>

        <button class="btn primary"
          data-confirm
          data-confirm-title="Accepter la demande"
          data-confirm-msg="Accepter cette séance ?"
          data-confirm-action-hint="Brancher un POST vers ReservationController::accept().">
          Accepter (exemple)
        </button>

        <button class="btn danger"
          data-confirm
          data-confirm-title="Refuser la demande"
          data-confirm-msg="Refuser cette séance ?"
          data-confirm-action-hint="Brancher un POST vers ReservationController::reject().">
          Refuser (exemple)
        </button>
      </div>
    </aside>
  </div>

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
