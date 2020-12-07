# Joomla! 3.X Template Boilerplate
Kickstart your template-workflow with our Joomla 3.X Template Boilerplate provided by BackupMonkey - The dashboard for agencies and freelancers to manage multiple Joomla!-Sites in one place (www.backupmonkey.io).


## SCSS

In this template we are using SCSS as a precompiler to generate the template's CSS files.
To learn more about scss visit the official docs: https://sass-lang.com/


## GULP and NPM

We use gulp as a build-tool to compile our SCSS and to build a minified JS file and NPM as a package manager.

Before you start working the template, make sure you install all the dependencies which are included in the package.json using NPM. To do that just install all dependencies entering "npm install" in the terminal of your IDE.

To start the Gulp-watcher just enter "gulp watch".
Afterwards Gulp, is looking for changes either made in one of the SCSS files or the JS file and compiles the content everytime a change is made.


## CRITICAL vs. NON-CRITICAL CSS

In general 2 different CSS files are generated, which are loaded at two different places of the index.php:

1. critical.css 
The contents of critical.css are loaded in a `<style>` tag in the head of the page.
Within the critical.css all styles should be stored, which are necessary to display content "Above the Fold".
A detailed explanation of how critical-css and non-critical-css work can be found in this Smashing Magazine article: https://www.smashingmagazine.com/2015/08/understanding-critical-css/

2. template.css
In the template.css all further styles are loaded, which are necessary for the overall appearance of the website. Similar to JavaScript files, the template.css is loaded before the closing <body> tag.

3. mixins for sorting into critical and non-critical css
To add CSS styles precisely to critical or non-critical css mixins are used. The functionality is simple:

    @include critical(true) {
    	// implement styles which are crucial to display content above the fold correctly in here
    }
    
    @include critical(false) {
    	// implement styles which aren't crucial to display content above the fold correctly in here
    }


## SCSS STRUCTURE

**Files:**
variables.scss -> implement global variables in here (for example breakpoints)
screen.scss -> import other scss files in here
template.scss & critical.scss -> Don't touch this (https://www.youtube.com/watch?v=otCpCn0l4Wo)

**Directorys:**
In our daily workflow we started to seperate our SCSS into smaller files which makes it easier to maintain projects on larger scale.
We seperate our SCSS by view-specific styles (for example: _item-page.scss), base styles (for example: global heading-styles) and components (for example: _footer.scss).

If it makes your life easier build your template based on this pattern. If not just do it the way it works best for you. :)

## Contribute

We are happy about any improvements to this boilerplate to provide the whole Joomla community with the best possible foundation for the development of individual templates.

So let's go - send us your proposals for improvement.
