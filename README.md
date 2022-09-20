# Luna
Landing page for german dog hairdresser

# Requirements
1. PHP >=7.4
2. Composer - https://getcomposer.org/
3. Email Server or SMTP

# Installation

1. In root directory run `composer install`

Should be fine, if not try changing file permissions:
- `find . -type d -exec chmod 0755 {} \;`
- `find . -type f -exec chmod 0644 {} \;`

and owner: `sudo chwon www-data -R ./`.

# Web server setup
The index file is in `public` folder so point web server there as a root directory.

# Config
All configs are set in `.env.php` file, if you need to change some of them for debugging you can put them in `.env.local.php` it will replace them on run.

## Config variables
- URL - site domain
- ASSET_PREFIX - if you are working on xampp and have url like this `localhost/luna/public` you can set `luna/public` as prefix added when retrieving files.
- DESC - used in meta description
- TITLE - title of page
- SUBTITLE - used in meta subtitle
- CARD_GALLERY - content shown in hero section in the carousel. Its made from:
  - before - image on the left
  - after -  iamge on the right
  - review - object which holds customer review
    - author - the author of the review
    - (optional) stars - rating
    - (optional) desc - actual review from customer
- CONTACT_FORM - representation of the contact form in array (it's easier to maintain). Contact form is rendered using `Tool::generateFormFields()`

# Email Server or SMTP
Script is using PHPMailer to deilver mails, its in `src/HttpResolver.php` method `handleContactForm`. You can look up setup here https://github.com/PHPMailer/PHPMailer.

If you don't want to setup mailing server (as PHPMailer uses `mail` method to sent emails otherwise) you can purchase 3rd party email service and use their servers to send mail with SMTP protocol.
For example: https://proton.me/mail
