# Back End(Laravel/Lumen) Midtrans Sandbox (Payment Gateway)
### This Is API for example project Midtrans Sandbox. 
Disclaimer: this project just for educational purpose and you cannot use this project for the real payment. You can only test payment using payment simulator in link description below. :) 
Midtrans is one of the most commonly use for payment gateway in Indonesia. Like credit card, transfer bank, e-wallet (gopay, ovo, shopeepay, etc).  

## Programming Language
- Laravel/Lumen (7.1)

## First Config
- Register account Midtrans https://account.midtrans.com/register
- Make endpoint in beeceptor https://beeceptor.com/
- ![This is an image beeceptor](https://drive.google.com/uc?export=view&id=15Asa7kVxjYV9akNEL380KlVEptmvGXW9)
- Set enviroment to sandbox and get Client Key and Server Key (settings->access keys)
- ![This is an image midtrans access key](https://drive.google.com/uc?export=view&id=1onjxd49s9_HeeqpiOynpKGSWHWNpamPM)
- Set Finish URL Midtrans (settings->configuration)
- ![This is an image midtrans configuration](https://drive.google.com/uc?export=view&id=1n9IntSsFLXD4jugDh8dqsfe_L2YmkYPn)
- Set Email Notification
- ![This is an image midtrans email notifcation 0](https://drive.google.com/uc?export=view&id=1wAkHkKZQ5cN6n4XGgOtQJ0M_nlXk0ZyM)
- ![This is an image midtrans email notifcation 1](https://drive.google.com/uc?export=view&id=1Vds6AqzlhNpVp6dCK1Lj8q88doAU0llc)
- Install Laragon
- Download/pull this project to C:\laragon\www
- Open this project with cd thisProject
- Install composer
- Run composer install in Terminal's Laragon
- Start Laragon
- Copy file .env.example and rename it to .env
- Edit value SERVER_KEY_MIDTRANS, FINISH_URL_MIDTRANS,

## Run Development Server
### Make sure different PORT with Front End and same port with API_URL in .env frontend
- php -S localhost:PORT -t public
- example: php -S localhost:8001 -t public

## Run In Broswer
### Link URL for run in browser
- http://localhost:PORT/midtrans/pay
- ex: php -S localhost:8001 -t public

## Special Big Thanks 
### I am follow this articles to create this project.
- [Tutorial 1](https://azharogi.medium.com/membuat-api-menggunakan-lumen-untuk-metode-midtrans-snap-payment-gateway-a9beba75f0f8)
- [Tutorial 2](https://azharogi.medium.com/integrasi-snap-api-midtrans-menggunakan-laravel-dengan-promise-midtrans-snap-ep2-afb5cc4c9a7f)
### URL for Midtrans payment simulator
- [Midtrans Payment Simlator](https://docs.midtrans.com/en/technical-reference/sandbox-test)
### Full Documentation about Midtrans
- [Midtrans Snap Docs](https://snap-docs.midtrans.com/#getting-started)
- [Midtrans Docs](https://docs.midtrans.com/)

## Author 
Firbert Oktariko 