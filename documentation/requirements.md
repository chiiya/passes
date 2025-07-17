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

### Usage with OpenSSL3
The .p12 certificate provided by Apple is using legacy encryption algorithms that are not supported by OpenSSL3. 
To convert the .p12 certificate to a format that can be used with OpenSSL3, you can use the following commands.
First install OpenSSL 1.1, which is compatible with the legacy encryption algorithms:

For Ubuntu:
```bash
sudo apt install openssl1.1
```

For Arch:
```bash
sudo pacman -S openssl-1.1
```

Now, you can extract the certificate and private key from the .p12 file using the following commands:

```bash
openssl-1.1 pkcs12 -in cert.p12 -out apple.key.pem -nocerts -nodes
openssl-1.1 pkcs12 -in cert.p12 -out apple.crt.pem -clcerts -nokeys
```

Next, generate a new .p12 file using the extracted certificate and private key:

```bash
openssl pkcs12 -export \
  -inkey apple.key.pem \
  -in apple.crt.pem \
  -out apple.p12 \
  -keypbe AES-256-CBC \
  -certpbe AES-256-CBC \
  -macalg sha256
```

This will create a new `apple.p12` file that is compatible with OpenSSL3.

## Google
1. Follow [these instructions](https://developers.google.com/wallet/generic/getting-started/auth/rest) to gain access to the Google Wallet REST API.
2. Store the service account credentials JSON file you downloaded in step 2 in a non-publicly accessible folder.
