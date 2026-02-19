### System Prompt / Technical Specification: PHP Form to JSON Application

**Objective:** Implement a lightweight web application that captures user data via an HTML form, processes and stores the data in a JSON file using PHP, and renders all accumulated records in an HTML table.

#### 1. File Structure & Responsibilities

Please create the following files in the root directory:

* `baz_index.html`: The user-facing data entry form.
* `baz_accept.php`: The backend script for data processing and storage.
* `baz_display.php`: The frontend script for retrieving and rendering the stored data.
* `data.json`: The local storage file (to be generated or appended to by `baz_accept.php`).

#### 2. Technical Requirements

**A. `baz_index.html` (The Form)**

* Create a valid HTML5 boilerplate.
* Implement an HTML `<form>` with the method set to `POST` and the action set to `baz_accept.php`.
* Include the following required input fields (with appropriate `name`, `id`, and `<label>` tags):
* First Name (`type="text"`)
* Surname (`type="text"`)
* Email (`type="email"`)
* Comments (`<textarea>`)


* Include a Submit button.

**B. `baz_accept.php` (The Processor)**

* Accept the incoming `POST` request from `baz_index.html`.
* Sanitize the incoming data to prevent basic XSS or injection vulnerabilities.
* Structure the new submission as an associative array or object.
* Read the existing contents of `data.json`. If the file does not exist, initialize an empty array.
* Append the new submission to the array and encode it back to valid JSON format.
* Save the updated JSON string back to `data.json`.
* Execute an HTTP `Location` header redirect to `baz_display.php` immediately after saving.

**C. `baz_display.php` (The Display)**

* Create a valid HTML5 boilerplate.
* Read the contents of `data.json` and decode it into a PHP array.
* Iterate through the array and render the data into a standard HTML `<table>` (include `<thead>` for column names and `<tbody>` for the data rows).
* Add a prominent HTML link or button styled to read "Back to Form" that routes the user back to `baz_index.html`.

#### 3. Execution Instructions for AI

1. **Acknowledge and Outline:** Before writing any code, reply by outlining the exact steps you will take to implement this task and confirm the file structure/locations.
2. **Pause for Confirmation:** Stop and wait for my explicit confirmation before generating the actual code blocks.

---

### Why this rewrite works better for AI:

* **Explicit File Names:** It names every file involved, including the implied `baz_index.html` and `data.json` that were missing from the original prompt.
* **Defined Data Flow:** It uses precise terminology (`POST`, `Location` header redirect, associative arrays) so the AI doesn't guess how the data moves between files.
* **Security & Edge Cases:** It explicitly asks the AI to handle data sanitization and the edge case of the JSON file not existing yet.
* **Clear Execution Rules:** It separates the system requirements from the behavioral instructions (outlining steps and waiting for confirmation), ensuring the AI doesn't accidentally skip the pause.