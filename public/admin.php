require_once __DIR__ . '/../src/auth.php';

// Force authentification
require_auth([ROLE_ADMIN, ROLE_BUREAU, ROLE_POLE]);

// Load the dashboard view
require_once __DIR__ . '/../views/admin/dashboard.php';