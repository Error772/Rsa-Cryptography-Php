# Rsa-Cryptography #
### *The Best Rsa Cryptography Class For Php ✔️*

## Options

- `Rsa Cryptools { Encryption/Decryption }`✔️
- `Rsa Cryptools { Sign/Verify }`✔️
- `Rsa KeyTools { KeysToPem }`✔️
- `Rsa KeyTools { Generate }`✔️

## Note

- ### *If You're Working On Localhost Uncomment Line 117!!!* ###

# **Usage** #
---
```php
<?php /** @noinspection ALL */

require 'Rsa.php';
use RsaCrypto\RsaCrypTools;
use RsaCrypto\RsaKeyTools;

//============================================================================\\

# RsaKeyTools { Generate }

$RsaToolGen = new RsaKeyTools();
$Keys = $RsaToolGen->Generate(4096, 'sha512', true);
echo "============Rsa Public Key============";
echo PHP_EOL . "<br/>" . "<br/>";
echo $Keys["Public"];
echo PHP_EOL . "<br/>" . "<br/>";
echo "============Rsa Private Key============";
echo PHP_EOL . "<br/>" . "<br/>";
echo $Keys["Private"];

# Files Will Be Saved too Because FileSaving Option Is True In Function

echo PHP_EOL . "<br/>" . "<br/>" . "<br/>" . "<br/>";

//============================================================================\\

# RsaKeyTools { KeysToPem }

$PublicKeyString = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuaTfqksIM/RE/SN1bLYo6nmbQY9sEcC4prIEdli2jppPytAAP7wDW+WkDeTSC7gbq0uLO2aMNZiEgVRksm1jFeq9P6gC5gp0b82i46TS1qAAJT6kTXUdylCLm34zOO//DKt5JnrIC/K1I2eie7SMF50hSjUEBYOzsGgxKBC4lCvfmMYtFg+hwaSpbfyaGbQh3O3hbXu4CWK1o5iWRFdYaVIIwFXdd/88iVmpyZ3tXMg/NA87JwAVg0kWr+3+xynPEBSwMiq7Ftn21wGY3vOa2IIpRwOIyjraaBAJgKhDQ4v23yhu5gWpKnQYQHn8PPIU3Dw0WJ7v/HdH7IDrRotbyQIDAQAB";
$PrivateKeyString = "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC5pN+qSwgz9ET9I3VstijqeZtBj2wRwLimsgR2WLaOmk/K0AA/vANb5aQN5NILuBurS4s7Zow1mISBVGSybWMV6r0/qALmCnRvzaLjpNLWoAAlPqRNdR3KUIubfjM47/8Mq3kmesgL8rUjZ6J7tIwXnSFKNQQFg7OwaDEoELiUK9+Yxi0WD6HBpKlt/JoZtCHc7eFte7gJYrWjmJZEV1hpUgjAVd13/zyJWanJne1cyD80DzsnABWDSRav7f7HKc8QFLAyKrsW2fbXAZje85rYgilHA4jKOtpoEAmAqENDi/bfKG7mBakqdBhAefw88hTcPDRYnu/8d0fsgOtGi1vJAgMBAAECggEAXyEUmCAQ2QawH4N/FbEWsGiWXXcQKty2An2webCmA9chUk1aA07l7b50XcZGuEikrRduBodbC8/W/qrvWttg7gc26RrAOX9cATq/4KVCgUbGLE+4RBTiqhyyHYEC4IdjC+wGjehXAIBjv/vIMFnpe+RB/dPC9sxxVNFfdydyXkJoQbQdXmB5wnjPuQ1xBGg0bG9FlYyp2TndeHCf0PP8piaWgcVQ95UgNodlqFEO1LT3Iy4wDGtscQSBo0QC2EZtRzuRwi65ObtNnLcsuhl6/CmsJytwBlgqqDt8cmrWX56ZTORICZn1C92J1jzfbqs/Sp9be7dEkNpnRj3a+UOxAQKBgQD1FTHxRUiEBQIKB4gMlt3qO5l0VHzi/dHm3Dzzb5OnswXujuNg2k4cJgObAaQD0U/mMBBEQV5KCqXkTDzq5I/emEjQaQEgvNhdIrUIeIj+7ZEQCLE7nuDBJDnOC2dIWPxHERCiAnPRu2Hb4Y01sWzQV1fCJx9hwYLbF8b24jSPYQKBgQDB6d4yuayIt5OwGmCgP9RralNCfKm8FLz6JpcVy5xd42CYZS12oAn+8vB9HgSi91QAvcN/FUtgAAslOAHs5E6JdlV9kv2P81Ja1or0RAFMSLLRK4qxt5TZMQHWdIzj/5H5ZoQhRn/yFbvkuW8RmoZfjvzeeeUXLMLcKotHKRitaQKBgQCRIl4S/O52j+inO9KLcgQ0o9q6ExZp7dmRlzbZCmgsVU3b+e4Y+u5qqPBVqOESCbABJtFbOkK2IhwfWC5zA6tXLGNiV+x9EJgof1cpjwfBv7m5/wvFvM5oUiWRKRuesmOjSi3JYx5nQ0ouRiGzfEBuGGs15Kkm4Mu3JxuCNG7fwQKBgFN70zy1cVFe74d2o7j6IgKowPWz5ANkTkPID23DvisxtCmIDb2vgv4vK1hCby6WGqVDDYKN8WiAPEwmw7VwSVunBYFNojqyP/d5vFMTYBeuiMXC4DBI4B1tmuPwQ6P5KKhd+W62Aml/7+e16dqDU2yai8VgZz/F9pKBAnt9dvFZAoGAYnw4q5IoWFmwtF59EbN9f2n5Eow3xB+nNEDVr08xj5EHQHBGFI/mCtfhzF0+Bw3iDCe9O7x7/eVgLBXNMIymVnHvDiSei6XXDm12UlOdn1Mj0NZmlUwepuheMLcFG1mHmMqSGooVa9GUfiV11A1oC3J3izx/78ZYBSV9/V2Mj3I=";

$RsaToolKeysToPem = new RsaKeyTools();
$PublicKeyPem = $RsaToolKeysToPem->KeysToPem($PublicKeyString, true, false);
echo $PublicKeyPem . "<br/>" . "<br/>";
$PrivateKeyToPem = $RsaToolKeysToPem->KeysToPem($PrivateKeyString, false, false);
echo $PrivateKeyToPem . "<br/>" . "<br/>";

echo PHP_EOL . "<br/>" . "<br/>" . "<br/>" . "<br/>";

//============================================================================\\

# RsaCryptools { Encryption/Decryption }

$RsaCyptools = new RsaCrypTools('PublicKey.pem', 'PrivateKey.pem');

$EncryptedText = $RsaCyptools->Encrypt('RsaCrypto', 'base64'); # You Can Use { base64/hex/bin }

echo 'Encrypted Text : ' . $EncryptedText . "<br/>" . "<br/>" . "<br/>";

$DecryptedText = $RsaCyptools->Decrypt($EncryptedText, 'base64'); # You Can Use { base64/hex/bin }

echo 'Decrypted Text : ' . $DecryptedText . "<br/>" . "<br/>" . "<br/>";

//============================================================================\\

# Telegram ID => T.me/Ali_Cod7
```
---

- ### **Telegram ID : [Ali_Cod7](https://T.me/Ali_Cod7)**
