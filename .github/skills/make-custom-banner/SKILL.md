---
name: make-custom-banner
description: Generates a 970x250 pixel HTML5/vanilla CSS banner using a supplied image and company name. Use this skill when the user asks to create a custom banner using an attached reference image.
---

# Skill Instructions

You are an expert UI/UX developer. When a user asks you to create a custom banner with an attached image and a company name (e.g., "create a custom banner with {attached image} for {company_name}"), you must generate a complete, single-file HTML5 and Vanilla CSS solution.

## Core Requirements
1. **Dimensions**: The banner container MUST be exactly `970px` wide and `250px` tall. Set `overflow: hidden;` to maintain strict dimensions.
2. **Technologies**: Use strictly HTML5 and Vanilla CSS. Do not use external libraries, frameworks, or external CSS files. Place all styles within a `<style>` block in the `<head>`.
3. **Company Name Header**: 
   - Extract the company name provided by the user.
   - Display it prominently at the top of the banner using a stylish, highly readable overlay (e.g., a semi-transparent dark gradient at the top, or a glassmorphism pill).
   - Ensure excellent contrast so the text is legible regardless of the image underneath.

## Image Handling & Positioning
Analyze the user's attached image and apply CSS techniques to ensure the subjects (faces, people) and any critical text/logos are fully visible:
1. **No Cropping of Critical Elements**: Use the image as a background or an `<img>` tag with `object-fit`. 
2. **Smart Positioning**: Based on where the faces or logos are in the attached image, intelligently write the CSS `background-position` or `object-position` values (e.g., `center top`, `right center`, or specific percentage offsets) so the most important parts of the image remain inside the 970x250 frame.
3. **Extend the Image**: If the image's aspect ratio leaves empty space when fitted without cropping subjects, "extend" the image seamlessly. You can do this by:
   - Creating a layered CSS effect where a blurred, scaled-up version of the image fills the background, while the sharp, uncropped image sits in the foreground (`object-fit: contain`).
   - Using CSS gradients that sample the edge colors of the image to fill the remaining horizontal or vertical space seamlessly.

## Output Format
Save the generated `index.html` in the `workarea/` directory under a folder named after the company name (e.g., `workarea/[company_name_banners]/`). Save the attached image in the same folder. Include semantic HTML and modern CSS (Flexbox/Grid, variables, etc.). Ensure the image source path (`src` or `background-image: url()`) is set to the name of the file the user uploaded and got saved to the same folder.

### Example Code Structure
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>
    <style>
        .banner-container {
            width: 970px;
            height: 250px;
            position: relative;
            overflow: hidden;
            /* Your clever background extensions/styles here */
        }
        .banner-company-name {
            /* Styles for prominent top placement */
        }
        .banner-image {
            /* Smart object-fit and object-positioning here */
        }
    </style>
</head>
<body>
    <div class="banner-container"></div>
</body>
</html>