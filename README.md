
# Redirect to Child
Rudy Affandi (2015)  
Version 1.0.1
For Statamic v2.x

## What is this?
Use `redirect_to_child` tag in your template to automatically redirects page to its first child.

## Changelog
- 1.0.0: Initial release

## Installation
Copy the `RedirectToChild` folder to the `site/addons` folder in your Statamic website.

## How to use
Use the following single tag in your template.
`{{ redirect_to_child response="301" }}`

### Available parameters
`response` By default, this is set to `302`. Options (`301`, `302`)