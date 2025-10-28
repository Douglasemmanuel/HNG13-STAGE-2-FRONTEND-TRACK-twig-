
```markdown
# TicketApp - React Version

Built with React, demonstrating authentication, protected routes, dashboard statistics, and ticket CRUD functionality and uses `localStorage` to simulate backend storage.

---


## Features

- **Landing Page**: Hero section with wavy SVG, decorative circles, CTA buttons.  
- **Login & Signup**: Form validation with inline error messages and toast notifications.  
- **Protected Dashboard**: Displays ticket summary (Total, Open, Resolved) and navigation to Ticket Management.  
- **Ticket Management**: Full CRUD (Create, Read, Update, Delete) with validation and status indicators.  
- **Session Management**: Uses `localStorage` (`ticketapp_session`) to simulate authentication.  
- **Responsive & Accessible**: Mobile, tablet, and desktop-friendly layout with semantic HTML and focus states.  

---

## Demo
- Landing Page  
- Dashboard  
- Ticket Management  

---

## Tech Stack

- **Frontend**: React 18  
- **Routing**: React Router v6  
- **State Management**: React Hooks (useState, useEffect, useCallback)  
- **Forms & Validation**: react-hook-form  
- **CSS**: CSS Modules / SCSS  
- **Icons**: React Icons  
- **Storage**: `localStorage` for session and tickets  
- **Build Tool**: Vite / Create React App  

---



## Setup and Installation

1. **Clone the repository**  
```bash
git clone. https://github.com/Douglasemmanuel/HNG13-STAGE-2-FRONTEND-TRACK-twig-.git
cd ticket-app-twig
````

2. **Install dependencies**

```bash
npm install
```

3. **Run development server**

```bash
npm start
```

4. **Open in browser**

```
https://tickethubwebapp.vercel.app
```

---

## Authentication

* Login/Signup simulated with `localStorage`.
* Valid session stored under `ticketapp_session`.
* Protected routes redirect unauthorized users to `/auth/login`.
* Logout clears session and redirects to the landing page.

---

## Dashboard

* Shows **summary statistics**:

  * Total Tickets
  * Open Tickets
  * Resolved Tickets
* Navigation to Ticket Management page.
* Logout button visible to clear session.

---

## Ticket Management

* **CRUD operations**:

  * **Create**: Form with title, description, status.
  * **Read**: List tickets with card layout and status colors.
  * **Update**: Edit ticket with validation.
  * **Delete**: Remove ticket with confirmation.

* **Status colors**:

  * `open` → Green
  * `in_progress` → Amber
  * `closed` → Gray

* Validation ensures required fields are filled.

* Feedback via inline messages or toast notifications.

---

## Responsive Design

* **Max width**: 1440px, content centered.
* Hero section with wavy SVG and decorative circles.
* Mobile: stacked layout with collapsible nav.
* Tablet/Desktop: multi-column grid layout.

---

## Known Issues

* Only simulated authentication (no backend).
* Tickets persist in `localStorage` only.
* Limited browser testing; modern browsers recommended.

---

## License

MIT License © 2025 [Your Name]

---


