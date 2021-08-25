# Interior Design Theme

Custom Wordpress theme built for interior designers to show their projects to the potential customers.
The theme is responsive and it is fully customizable from the Wordpress admin panel via custom fields.

Interior Design Theme is based on Underscores https://underscores.me/ by Automattic.

## Table of contents
- [Technologies used](#technologies-used)
- [Theme Functionalities](#theme-functionalities)
  - [Header](#header) 
  - [Footer](#footer)
  - [Page Templates](#page-templates)
  - [Shortcodes](#shortcodes)
- [Installation](#installation)

## Technologies used
- Wordpress 5.8
- PHP 7.4
- JavaScript (ES6)
- CSS3
- HTML5
- SASS
- jQuery
- Carbon Fields (Custom fields like ACF plugin but specifically for developers)
- MySQL

## Theme Functionalities

### Header
Header contains logo and three menus - two for desktop and one for mobile.\
Logo can be changed from Admin Panel/Theme Options/Header/Logo.\
Menus can be managed from Admin Panel/Appearance/Menus.

---------------------

### Footer
Footer contains logo, menu, phone number, email, socials and copyright.\
Logo can be changed from Admin Panel/Theme Options/Footer/Logo.\
Menu can be managed from Admin Panel/Appearance/Menus.\
Phone number, email, socials and copyright can be managed from Admin Panel/Theme Options/Footer.

---------------------

### Page Templates

#### Page Builder

This template has different sections that can be used in the order you want.

---------------------

### Shortcodes

`[year]`

Use this shortcode to display the current year.

---------------------

## Installation

### Requirements

`interior-design-theme` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Setup

To use this theme you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

- `npm run compile:css` : compiles SASS files to css.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
