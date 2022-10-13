# Interior Design Theme

Custom WordPress theme built for interior designers to show their projects to potential customers.\
The theme is responsive and it is fully customizable from the WordPress admin panel via custom fields.

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
- WordPress 5.8
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

Page builder contains these sections:
- Heading
- Selected Projects
- Projects
- Text Columns with Background Image
- Text Columns with Checkboxes
- Text with Image
- Text with Wide Image
- Text with Form
- Contact Text with Form
- Image with Tabs
- Columns with Icon and Text
- Testimonials Slider

---------------------

### Shortcodes

`[year]`

Use this shortcode to display the current year.

---------------------

## Installation

### Requirements

`interior-design-theme` requires the following dependencies:

- [Yarn](https://yarnpkg.com/)
- [Composer](https://getcomposer.org/)

### Setup

To use this theme you need to install the Composer and Yarn packages:

```sh
$ composer install
$ yarn install
```

### Available CLI commands

- `yarn watch` : watches all SASS files and recompiles them to css when they change.
- `yarn compile:css` : compiles SASS files to css.
- `yarn bundle` : generates a .zip archive for distribution, excluding development and system files.

## Design Images
![home-intro](https://user-images.githubusercontent.com/22518317/136271272-3925b79b-e9df-47e9-9a7c-669136b17241.png)
![home-bottom-section](https://user-images.githubusercontent.com/22518317/136271300-658174e0-44a8-42e0-9f44-b61872c15cf6.png)
![home-footer](https://user-images.githubusercontent.com/22518317/136271307-5fc34036-2c63-4cbe-b927-ea3c84f20e8f.png)
![about-us](https://user-images.githubusercontent.com/22518317/136271343-86567031-d7b6-4264-b6db-8e677f45cc2f.png)
![about-us-2](https://user-images.githubusercontent.com/22518317/136271351-11132061-9c5e-4ba4-84b5-728dfa3ae3a9.png)
![planning](https://user-images.githubusercontent.com/22518317/136271364-9245359c-3bf2-4c0b-aad9-c1f474d16f68.png)
![planning-2](https://user-images.githubusercontent.com/22518317/136271434-b2a8f62d-1acf-4568-9fde-bc53c158f2fb.png)
![planning-3](https://user-images.githubusercontent.com/22518317/136271440-a8482933-6bef-425f-a810-b8e4d9758c23.png)
![projects](https://user-images.githubusercontent.com/22518317/136271377-da2e2bcc-0a42-439a-bb16-e3d0f04a1d4c.png)
![project-single](https://user-images.githubusercontent.com/22518317/136271454-121aa299-fe7d-4bbe-a42a-59c651dfac3f.png)
![project-single-image-zoomed](https://user-images.githubusercontent.com/22518317/136271464-a4647f31-6fae-456f-bbf9-a0f7abf65efa.png)
![services](https://user-images.githubusercontent.com/22518317/136271473-43e25bba-7b44-4472-9494-0b48fd8c9f09.png)
![contacts](https://user-images.githubusercontent.com/22518317/136271487-3932cbd1-21d7-4339-9c52-1bc29a6cf13e.png)


