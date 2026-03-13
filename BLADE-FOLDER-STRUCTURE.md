resources/
├── views/
│   ├── layouts/
│   │   ├── app.blade.php         # main layout with sidebar & topbar
│   │   └── guest.blade.php       # layout for login/register/ or sa landing page
│   ├── components/               # reusable UI components (buttons, cards, modals)
│   │   ├── sidebar.blade.php
│   │   ├── topbar.blade.php
│   │   ├── card.blade.php
│   │   └── table.blade.php
│   ├── pages/                    # each "page" in the dashboard
│   │   ├── dashboard.blade.php
│   │   └── landing-page
│   │   │   └── landing-page.blade.php
│   │   ├── sales
│   │   │   └── sales.blade.php
│   │   ├── inventory
│   │   │   └── inventory.blade.php
│   │   └── reports
│   │   │   └── reports.blade.php
│   └── auth/                     # Login/Register pages
│       ├── login.blade.php
│       └── register.blade.php
        