# ✨A Three-Layer Model for Coding with AI

*(LAMP stack · VS Code · Prudent AI use)*

> **Mental model:**
1. *What should be done?* 
2. *How should it be done?* 
3. *What extra capabilities and safeguards are available?*

---

## 1. Task-Specific Requests (What to do, now)

**The specific "action" prompts**

These define the **immediate unit of work**.

**Includes**

* Prompts typed into chat
* Inline Copilot requests
* Saved / custom prompts
* Debugging queries (e.g., "Why is this SQL query failing?")
* One-off instructions such as:

  * “Refactor this PHP controller”
  * “Write a MySQL migration”
  * “Explain this Apache config”

**Characteristics**

* Short-lived
* Narrow in scope
* Executed within existing constraints

**Key teaching point**

> Task requests do not define standards or safety — they operate inside them.

---

## 2. Behaviour-Shaping Rules (How the AI should behave)

**The "governance" layer**

These define **persistent expectations and constraints**.

**Includes**

* Agent instruction files
  * `copilot-instructions.md`
  * `AGENTS.md`
* PRDs (Product Requirements Documents) written in Markdown
* Architectural rules
* Coding standards (e.g. PSR-12, Laravel conventions)
* Explanation depth and tone
* Context engineering practices

**Role of Markdown**

* Provides structure and hierarchy
* Improves readability and reasoning
* Reduces ambiguity in long-lived context

**Improvement**

> Setting these rules at the project level reduces the need to repeat instructions (e.g., "Use strict types in PHP") in every single prompt. It ensures consistency across all tasks.

**Key teaching point**

> Behaviour rules shape how *all* tasks are interpreted before code is generated.

---

## 3. External Tools, Context, and Safeguards (Capabilities and Protection)

**The "environment and safety" layer**

These extend capability and control risk.

**Includes**

* Repository files and folder structure (Context)
* MCP servers
* Agent skills
* Documentation retrieval
* Database schemas
* Command execution
* **Git version control (Safeguards)**

**Role of Git and Context**

* **Context acts as the fuel**: It gives the AI the knowledge it needs to work effectively.
* **Git acts as the brakes**: It allows you to safely experiment and rollback changes if needed.
* Enables safe experimentation
* Preserves history and intent
* Makes AI assistance reversible

**Key teaching point**

> Tools increase power; Git ensures that power is safe to use. Context fuels the engine; Git provides the brakes.

---

## How Git and Markdown Support All Layers

* **Markdown** improves the *quality of context* the AI reads
* **Git** protects the *quality of code* the AI produces

> Git protects *you* from AI mistakes.
> Markdown protects the AI from *your* mistakes.

---

## One-Slide Summary (Bottom Line)

> AI-assisted coding quality emerges from the interaction of:

* Clear task requests
* Well-defined behaviour rules
* Trusted tools, structured context, and version control

No single layer is sufficient on its own.

---
## Visual Summary

```text
AI Coding Model
├── 1. Task-Specific Requests (Action)
│   ├── Prompts & One-off instructions
│   └── Debugging queries
├── 2. Behaviour-Shaping Rules (Governance)
│   ├── PRDs & Instructions (AGENTS.md)
│   └── Standards (Coding & Architectures)
└── 3. External Tools & Safeguards (Environment)
    ├── Context (Repo, Skills, MCP)
    └── Git Version Control (Safety)
```