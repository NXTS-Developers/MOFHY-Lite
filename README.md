## MOFHY Lite
MOFHY LITE is a priceless MyOwnFreeHost Client Area for account management, ticket support system and a free ssl service. It has easy to use features much like the WHMCS Digit UI interface. 

![AppVeyor](https://img.shields.io/badge/Licence-MIT-lightgrey)
![AppVeyor](https://img.shields.io/badge/Version-v1.0.5-lightgrey)
![AppVeyor](https://img.shields.io/badge/Build-passed-lightgreen)
![AppVeyor](https://img.shields.io/badge/Dependencies-php-lightgrey)
![AppVeyor](https://img.shields.io/badge/Dependencies-mysql-lightgrey)
![AppVeyor](https://img.shields.io/badge/Interface-Digit-lightgrey)

## Table of Content 
- [Features](#features)
- [Requirements](#requirements) 
- [Installation](#installation)
- [Dependencies](#dependencies)
- [Contributer](#contributer)
- [Copyright](#copyright)

## Features
MOFHY Lite features are listed below:
- Sign up / Login 
- Password Reset Functionality
- eMail Validation / Verification 
- Account Management 
- Account Settings 
- GoGetSSL Api Integration 
- MOFH Api Integration
- Enchanted Security 
- Ticket Support System 
- Custom Template System 
- Knowledgebase System
- Admin Settings
- Day/Night Mode
- Standalone Setup 
- SMTP Support 
- Extra Tools For Clients
  - WHOIS Lookup
  - DNS Lookup
  - CSR Generator
  - CSR Decoder

## Requirements
Your server need to met minimal requirements to run MOFHY Lite:
- PHP v7.0 or above.
- MySQL v5.7 or above.
- OpenSSL v1.2 or above. 

## Installation 
Installation of MOFHY Lite is much eaiser then you think!

**1. Install And Basic Setup**
- Download the ```MOFHY-Lite-dev.zip``` file. 
- Extract the .zip file to the root folder of your domain. 
- Create an empty database for the project
- Open your browser and type ```http://yourdomain.com/src/```, an installation page will be appear. 
- After clicking "install" you have to fill out your database details and click on validate to connect to the database. 
- Fill out the clientarea name, clientarea URL:```http://example.com/src/```, and clientarea email. Then click next. 
- Register an admin account. 
- Rename or remove the "installation" directory from the main directory. (This is super important!)
- Access the admin panel at ```http://example.com/src/admin/```. 
- Set up the Domain Extensions (Free subdomains) in the admin panel (```http://example.com/src/admin/```).

**2. Setup APIs**
- Set callback url to ```http://example.com/src/callback/Callback.php``` (Replace example.com with your own domain) in the MOFH Reseller panel ([panel.myownfreehostnet](panel.myownfreehostnet)) under "SETUP API".
- Set up the MOFH API in "API Settings" in the admin area (```http://example.com/src/admin/```) using info from [panel.myownfreehost.net](panel.myownfreehost.net).
- Set up the GoGetSSL API in "API Settings" in the admin area (```http://example.com/src/admin/```).

**3. Setup Google ReCapcha**
- Get your Google ReCapcha Keys from [Google Developers](https://developers.google.com/_d/signin?continue=https%3A%2F%2Fdevelopers.google.com%2Frecaptcha%2F&prompt=select_account) (Take note of both the "Secret" and "Private" Keys.
- Open the following files, and add your keys. Please READ the comments in the files, they tell you what key to put where.
  - ```template/Login.php``` (Line 22)
  - ```template/Signup.php``` (Line 36)
  - ```function/Login.php``` (Line 24)
  - ```function/Signup.php``` (Line 34)
- All done! 

## Extra Setup Steps
- Create Knowledgebase articles for your webhost in the admin area (```http://example.com/src/admin/```) if you wish.

## Dependencies
The following libraries are required to run MOFHY Lite:
- phpmailer
- mofh-client
- guzzlehttp
- composer
- user info
- gogetssl

## SMTP
Here are some widely used SMTP services. They have a free plan with some limitations though, most importantly they are compatible with MOFHY-Lite.
- [Mailgun](https://www.mailgun.com/)
- [Sendinblue](https://sendinblue.com/)
- [SendClean](https://sendclean.com/)
- [Mailjet](https://mailjet.com/)
- [Yandex 360](https://360.yandex.com)
- [SendGrid](https://sendgrid.com/free/)
- [SendPulse](https://sendpulse.com/features/smtp)
- [ServersSMTP](https://serversmtp.com/get-free-emails/)

## Contributer
This build is created, modified and maintained by [Mahtab Hassan](https://github.com/mahtab2003) and [Greenreader9](https://github.com/greenreader9).

## Copyright
MOFHY Lite code ©️ 2021. Code released under the MIT license.
