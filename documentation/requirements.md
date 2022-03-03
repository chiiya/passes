# Requirements
In order to start creating passes, you will need to create some certificates and service credentials:

## Apple
1. Log into your Apple Developer Console and select Certificates, Identifiers & Profiles.
2. Select Identifiers from the menu on the left, and select "Pass Type IDs".
3. Follow the instructions to create a Pass Type ID and remember the identifier.
4. Generate a certificate according to the instructions shown on the page.
5. Download the .cert file and drag it into Keychain. In Keychain, select both the certificate and the private key under it, then right-click and choose "Export 2 items...".
6. Choose a password and remember it.
7. Store the exported .p12 certificate in a non-publicly accessible folder.
8. Download the G4 WWDR certificate from https://www.apple.com/certificateauthority/. It can be exported from Keychain into a .pem file.

## Google
1. Follow the first 3 steps of the following manual to gain access to the Google Pay for Passes API: https://developers.google.com/pay/passes/guides/basic-setup/get-access-to-rest-api
2. Store the service account credentials JSON file you downloaded in step 2 in a non-publicly accessible folder.
