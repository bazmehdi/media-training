# How to use a MCP server

**RAG** stands for Retrieval-Augmented Generation. It is a technique that enhances AI language models by retrieving relevant information from external knowledge sources (such as documents, databases, or the web) before generating a response. This helps the model provide more accurate, up-to-date, and contextually grounded answers rather than relying solely on its training data.

**1. What is a MCP server**
- A MCP Server is lightweight service that exposes external tools, data sources, and capabilities to AI agents via the Model Context Protocol (MCP), allowing them to perform actions beyond their built-in features.
- Install from [Github MCP server registry](https://github.com/mcp)
- This should create a `.vscode/mcp.json` file in your workspace. Create manually to understand how it works.
- You can manually configure MCP servers for your project by updating the workspace's `.vscode/mcp.json`

*For example, to install the Chrome Devtools MCP server*

```json
{
  "mcpServers": {
    "chrome-devtools": {
      "command": "npx",
      "args": ["-y", "chrome-devtools-mcp@latest"]
    }
  }
}
```

**2. How to use a MCP server**

**A. Chrome Devtools**
- Install [From Github registry - Chrome DevTools MCP](https://github.com/mcp)

- Example in using Chrome Devtools: Use Chrome devtools to check all links on `https://www.creativewords.co.uk/` are working and all images have the `alt` attribute.

**B. Context7**
- Install [From Github registry - Context7](https://github.com/mcp)
- Use this for generating code for applications
- Use with agent skills for refactoring ([see example](use_a_agent_skills.md))
- [Requires a free API key](https://context7.com/dashboard)
- Add to the .vscode/mcp.json (keep API key secure)
- Example prompt: refactor `form.html' and all the dependencies. make sure code is secure and production ready.

## Important note
- MCP server take up a lot of tokens and load when the application loads. Although this has now been addressed in VS Code
- Use them wisely
- Agent skills can make them more effective
- Where keys are required keep then private