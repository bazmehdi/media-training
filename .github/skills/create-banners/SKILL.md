---
name: create-banners
description: Use this skill whenever the keywords "create banners" are used in a prompt. It guides the creation of 3 banner ads (970x250, 300x600, 300x250), each saved in its own size-specific folder.
---

# Create Banners

## Objective
Whenever the keywords `create banners` are present in the user's prompt, this skill must be employed to generate 3 banner ads based on the provided inputs (such as images, text copy, or a specific topic).

The banners must strictly adhere to the following dimensions and be placed within their own newly created folders with the size appended to the folder name:

1. **Leaderboard Banner**
   - **Dimensions:** 970x250 pixels
   - **Location:** A new folder ending in `-970x250` (e.g., `[campaign-name]-970x250/`)

2. **Half-Page Banner**
   - **Dimensions:** 300x600 pixels
   - **Location:** A new folder ending in `-300x600` (e.g., `[campaign-name]-300x600/`)

3. **Medium Rectangle Banner**
   - **Dimensions:** 300x250 pixels
   - **Location:** A new folder ending in `-300x250` (e.g., `[campaign-name]-300x250/`)

## Step-by-Step Instructions for the Agent
1. **Analyze the Input:** Review the user's prompt to identify the product, theme, and any provided assets (e.g., source images, brand colors, text).
2. **Scaffold the Directories:** Create the three required folders in the current working directory, appending the specific dimensions to the folder names as defined above.
3. **Generate the Banners:** - Crop, scale, or generate the HTML/CSS/image assets to ensure they perfectly match the exact `width x height` specifications.
   - Ensure the core subject (e.g., the product/image provided) is appropriately centered and visible in all three aspect ratios.
4. **Save the Output:** Output the final files directly into their respective size-specific folders.

## Example Scenario

**User Prompt:** `create banners for gingerbread biscuits using the following image`

**Expected Agent Action:**
1. Derive a base name for the folders (e.g., `gingerbread-banners`).
2. Create directories: 
   - `gingerbread-banners-970x250/`
   - `gingerbread-banners-300x600/`
   - `gingerbread-banners-300x250/`
3. Process the provided image to fit the 970x250 dimension and save the code/asset inside `gingerbread-banners-970x250/`.
4. Process the provided image to fit the 300x600 dimension and save the code/asset inside `gingerbread-banners-300x600/`.
5. Process the provided image to fit the 300x250 dimension and save the code/asset inside `gingerbread-banners-300x250/`.