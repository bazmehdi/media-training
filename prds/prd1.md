# PRD — Simple contact form → JSON storage → display

## Summary
Create a small, secure HTML/PHP application that collects user submissions (first name, surname, email, comments), persists them to a JSON file, and displays all submissions in an HTML table.

This PRD is intentionally precise so an AI or developer can implement, test and review without further clarification.

---

## Scope & non-goals
- Scope: single-page form, server-side handler `baz_accept.php`, results page `baz_display.php`, JSON storage. Accessibility, input validation, server-side security and automated test cases are required. Files will be placed under `workarea/baz-form/`.
- Non-goals: database (MySQL) integration, authentication, production-grade rate-limiting (optional extra).

---

## User stories (behavioural)
1. As a visitor, I can submit my first name, surname, email and optional comments so that the site stores my submission.
2. As a visitor, after successful submission I am redirected to a page that shows all submissions in a table.
3. As an operator, I can verify submissions are stored in a `submissions.json` file.

---

## Functional requirements (explicit)
- Fields
  - `first_name` (required, string, 1–100 chars)
  - `surname` (required, string, 1–100 chars)
  - `email` (required, valid email, max 254 chars)
  - `comments` (optional, string, max 2000 chars)

- Form UI (`GET /workarea/baz-form/baz_form.php`)
  - Semantic HTML form with `<label>` for each field and an explicit submit button.
  - Client-side validation (HTML5 + small JS) but **server-side validation is authoritative**.
  - CSRF token included in the form and validated server-side.

- Server handler (`POST /workarea/baz-form/baz_accept.php`)
  - Validate inputs (trim, length, email format via `filter_var`).
  - On validation error: re-render the form with errors (HTTP 422) and preserve entered values.
  - On success: append a submission record to `data/submissions.json` and redirect (HTTP 302) to `baz_display.php`.

- Display page (`GET /workarea/baz-form/baz_display.php`)
  - Read `data/submissions.json` and render a table with columns: Submitted At (ISO 8601), First name, Surname, Email, Comments.
  - Escape all user data with `htmlspecialchars()`; preserve line breaks in `comments` via `nl2br()`.
  - Provide a visible `Back to form` button linking to `baz_form.php`.

- Storage format
  - File: `workarea/baz-form/data/submissions.json` (UTF-8, owner writable by web server)
  - JSON structure: an array of submission objects. Each object contains: `id` (string UUID or hex), `first_name`, `surname`, `email`, `comments`, `submitted_at` (ISO 8601 UTC).
  - Write should be atomic with file-locking (use `flock()` or `FILE_APPEND|LOCK_EX` strategy for NDJSON). Prefer: open→flock(LOCK_EX)→read→append→ftruncate→write→fflush→release.

---

## Non‑functional & security requirements
- PHP 8.3, `declare(strict_types=1);`, PSR-12 compliant code.
- Server-side validation is mandatory; HTML/JS validation is UX-only.
- Escape all output to prevent XSS. Do not store raw HTML.
- Prevent direct public access to `data/` (place `.htaccess` denying access or keep `data/` outside webroot).
- CSRF protection using a session token.
- Log critical failures to `error_log()` and return user-friendly error pages.

---

## Data contract (API)
- Request (form submission)
  - Method: POST
  - URL: `/workarea/baz-form/baz_accept.php`
  - Body (application/x-www-form-urlencoded): `first_name`, `surname`, `email`, `comments`, `csrf_token`

- Responses
  - 302 Found — on success (redirect to `baz_display.php`)
  - 422 Unprocessable Entity — validation errors (form re-rendered with messages)
  - 500 Internal Server Error — storage/write failure

---

## JSON schema (example)
{
  "id": "e7c9a8f4a1b2c3d4",
  "first_name": "Alice",
  "surname": "Smith",
  "email": "alice@example.com",
  "comments": "Hello world",
  "submitted_at": "2026-02-19T12:34:56Z"
}

`submissions.json` contains an array of objects like the above.

---

## Acceptance tests (executable / deterministic) ✅
1. Valid submission
   - POST valid fields → response 302 → `submissions.json` contains new entry with matching fields and `submitted_at`.
   - `baz_display.php` shows the entry in the table.
2. Missing required field
   - POST without `email` → response 422 → no change to `submissions.json`.
3. Invalid email
   - POST `email=not-an-email` → response 422 and error message.
4. XSS sanitisation
   - Submit `comments` containing `<script>` → displayed page shows escaped text (no script execution).
5. Concurrency
   - Two simultaneous posts → `submissions.json` remains valid JSON and contains both entries.

Sample curl (valid):

curl -fsS -X POST \
  -d "first_name=Alice" -d "surname=Smith" -d "email=alice@example.com" -d "comments=Hi" \
  http://localhost/workarea/baz-form/baz_accept.php -v

Verify with `jq`:

jq '. | length' workarea/baz-form/data/submissions.json

---

## Implementation steps (for an AI agent or developer)
1. Create folder `workarea/baz-form/` and `workarea/baz-form/data/` (init `submissions.json` with `[]`).
2. Implement `baz_form.php` (semantic form, CSRF token, client-side validation).
3. Implement `baz_accept.php` (validation, atomic JSON write, logging, redirect/error handling).
4. Implement `baz_display.php` (read JSON, escape output, show table, link back).
5. Add minimal `assets/style.css` and `assets/main.js` (responsive + accessible).
6. Add unit/integration tests (curl + jq) and at least one manual accessibility check.
7. Run tests and fix issues.

---

## Files & locations (exact)
- `workarea/baz-form/baz_form.php` — form page (GET + show errors)
- `workarea/baz-form/baz_accept.php` — POST handler (server validation + storage)
- `workarea/baz-form/baz_display.php` — results table
- `workarea/baz-form/data/submissions.json` — storage (initial: `[]`)
- `workarea/baz-form/assets/style.css` — minimal responsive CSS
- `workarea/baz-form/assets/main.js` — client-side validation
- `workarea/baz-form/tests/` — integration test scripts

---

## Acceptance criteria (ready-to-merge)
- All functional requirements implemented and passing automated tests above.
- Code uses `declare(strict_types=1);` for PHP, follows PSR-12, includes inline docblocks and comments where helpful.
- Security checks in place (server validation, output escaping, CSRF token).

---

## Ready for implementation?
If you confirm, I will implement the files listed above, include automated tests, and open a single PR with the changes. Please confirm or specify changes (for example: make `comments` required / use NDJSON / store IP address).
