# 2fa-example

*By [RiinaKw](https://riina-k.net/)*

Simple Two-Factor Authentication(2FA) example.

## Usage
1. Show `demo/index.php` in your browser.
1. Scan QR code by Authenticator app.
1. Enter the 6-digit number shown by Authenticator in the form below the QR code.
1. Successful authentication when **congratulations** is displayed, fails when **so bad** is displayed.


## For actual operation
* The secret key `const Config::SECRET` should be manipulated carefully, as it is not safe.
* Why not safe? Because secret key is saved as plain text in the QR code.
* For example, use secret key as a random string and never use the same secret key again.
