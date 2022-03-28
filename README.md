## MOFHY Lite
MOFHY Lite is a priceless MyOwnFreeHost Client Area for account management, ticket support system and a free ssl service. It has easy to use features much like the WHMCS Digit UI interface. Visit the [offical website](https://getmofhy.eu.org)!

![AppVeyor](https://img.shields.io/badge/Licence-MIT-lightgrey)
![AppVeyor](https://img.shields.io/badge/Version-v1.0.5-lightgrey)
![AppVeyor](https://img.shields.io/badge/Build-passed-lightgreen)
![AppVeyor](https://img.shields.io/badge/Dependencies-php-lightgrey)
![AppVeyor](https://img.shields.io/badge/Dependencies-mysql-lightgrey)
![AppVeyor](https://img.shields.io/badge/Interface-Digit-lightgrey)
![AppVeyor](https://img.shields.io/badge/Dependencies-Active-lightgrey) 
![AppVeyor](https://img.shields.io/badge/Development-Discontinued-lightred)
 ![GitHub all releases](https://img.shields.io/github/downloads/NXTS-Developers/MOFHY-Lite/total?style=plastic)

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
- PHP v5.6 or above.
- MySQL v5.2 or above.
- OpenSSL v1.1 or above. 

## Installation 
Installation of MOFHY Lite is much eaiser then you think!
- Download the ```MOFHY-Lite-dev.zip``` file. 
- Extract the .zip file to the root folder of your domain. 
- Create an empty database for the project
- Open your browser and type ```http://yourdomain.com/src/``` an installation page will be appear. 
- After clicking "install" you have to fill out your database details and click on validate to connect to the database. 
- Fill out the clientarea name, clientarea URL:```http://example.com/src/```, and clientarea email. Then click next. 
- Register an admin account for free. 
- Rename or remove the "installation" directory form src directory. (This is super important!)
- Access the admin panel at ```http://example.com/src/admin/```. 
- Set callback url to ```http://example.com/src/callback/Callback.php``` in the MOFH Reseller panel (panel.myownfreehostnet).
- Set up the API in "API Settings" in the admin area (```http://example.com/src/admin/```).
- Set up the Domain Extensions (Free subdomains) in the admin panel (```http://example.com/src/admin/```).
- All done! 

## Extra Setup Steps
- Create Knowledgebase articles for your webhost (```http://example.com/src/admin/```).

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

## Extensions
- [MOFHY PLUS](https://mofhyplus.rf.gd)

## Contributer
This build is created, modified and maintained by [Mahtab Hassan](https://github.com/mahtab2003).

## Copyright
Code ©️ Copyright 2021 MOFHY Lite. Code released under the MIT license.
