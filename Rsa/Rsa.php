<?php /** @noinspection ALL */

namespace RsaCrypto {

    /** @Dev -> @Ali_Cod7  */

    /** @Php : 8.1 */

    /** @Telegram-ID -> @Error772 */

    class RsaCrypTools {

        /** @Padding Based On @PKCS1 */

        # Values
        private $PublicKey = null;
        private $PrivateKey = null;

        # Constuctor
        public function __construct($PublicKeyPath, $PrivateKeyPath) {
            $this->CheckExistence($PublicKeyPath, $PrivateKeyPath);
        }

        # Check If Files Exist
        private function CheckExistence($Public, $Private) {
            $Pub = file_exists($Public);
            $Pri = file_exists($Private);
            if ($Pub AND $Pri) {
                $this->PublicKey = openssl_get_publickey(file_get_contents($Public));
                $this->PrivateKey = openssl_get_privatekey(file_get_contents($Private));
            } else if ($Pub == false AND $Pri == true) {
                die('Error : PublicKeyPath Is Not Correct!');
            } else if ($Pub == true AND $Pri == false) {
                die('Error : PrivateKeyPath Is Not Correct!');
            } else {
                die('Error : Paths Are Not Correct!');
            }
        }

        # Converting Hex To Binary
        private function Hex2Bin($Data): bool|string {
            return $Data !== false && preg_match('/^[0-9a-fA-F]+$/i', $Data) ? pack("H*", $Data) : false;
        }

        # Easy Function To Encode Data To { Base64 , Hex , Bin }
        private function Encoder($Data, $Type): string {
            return match ($Type) {
                'base64' => base64_encode($Data),
                'hex' => bin2hex($Data),
                default => $Data
            };
        }

        # Easy Function To Decode Data To { Base64 , Hex , Bin }
        private function Decoder($Data, $Type): bool|string {
            return match ($Type) {
                'base64' => base64_decode($Data),
                'hex' => $this->Hex2Bin($Data),
                default => $Data
            };
        }

        # Encrypt Given Data Using Given Encoder Type
        public function Encrypt($Data, $Encoder = 'base64'): string {
            openssl_public_encrypt($Data, $Result, $this->PublicKey, OPENSSL_PKCS1_PADDING);
            return $this->Encoder($Result, $Encoder);
        }

        # Decrypt Given Data Using Given Decoder Type
        public function Decrypt($EncryptedText, $Encoder = 'base64'): string {
            $Data = $this->Decoder($EncryptedText, $Encoder);
            openssl_private_decrypt($Data, $Result, $this->PrivateKey, OPENSSL_PKCS1_PADDING);
            return $Result;
        }

        # Get The Sign
        public function Sign($Data, $Encoder = 'base64'): string {
            openssl_sign($Data, $Result, $this->PrivateKey);
            return $this->Encoder($Result, $Encoder);
        }

        # Veryfying The Sign With Given Data Using Encoder Type
        public function Verify($Data, $Sign, $Encoder = 'base64'): bool {
            $Sig = $this->Decrypt($Sign, $Encoder);
            $Verify = openssl_verify($Data, $Sig, $this->PublicKey);
            if ($Verify) {
                return true;
            } else {
                return false;
            }
        }
    }

    class RsaKeyTools {

        # Generates Rsa Public/Private Keys

        /** @Parameters
         *
         * @Param int $Size For Key-Sizes To Generate Based On Them => { 512 , 1024 , 2048 , 3072 , 4096 }
         *
         * @Param string $Type For Type Of Private Key Encyption => { md5 , sha256 , sha512 }
         *
         * @Note => * If You're Working On Localhost !UNCOMMENT! Line -117- Which Starts With [config]!!!
         */

        public function Generate($Size = 1024, $Type = 'sha512', $FileSaving = true): array|string {
            $Sizes = array(512, 1024, 2048, 3072, 4096);
            $Types = array('md5', 'sha256', 'sha512');
            if (in_array($Size, $Sizes) == false) {
                die('Key-Size Must Be One Of These! { 512 , 1024 , 2048 , 3072 , 4096 }');
            }
            if (in_array($Type, $Types) == false) {
                die('Type Must Be One Of These! { md5 , sha256 , sha512 }');
            }
            $Config = array(
                //"config" => "C:/xampp/php/extras/openssl/openssl.cnf", # Uncomment This Line If You're Working On Localhost!!
                'private_key_bits' => $Size,
                'private_key_type' => $Type
            );
            $Result = openssl_pkey_new($Config);
            openssl_pkey_export($Result, $PrivateKey, null, $Config);
            $PublicKey = openssl_pkey_get_details($Result)["key"];
            if ($FileSaving) {
                file_put_contents('PrivateKey.pem', $PrivateKey);
                file_put_contents('PublicKey.pem', $PublicKey);
            }
            return array("Private" => $PrivateKey, "Public" => $PublicKey);
        }

        # Convert Given Strign Keys To Pem

        /** @Parameters
         *
         * @Param string $Key Is The Given String Line Rsa Public/Private Key
         *
         * @Param bool $Public Choose The Given Key Is The Public Key Or Private Key
         *
         * @final Files Will Be Saved { PublicKey.pem | PrivateKey.pem }
         *
         * @return Public/Private Keys { String | File-Saved }
         */

        public function KeysToPem($Key, bool $Public, bool $FileSaving = false): string {
            $Data = wordwrap($Key,64,"\n", true);
            switch ($Public) {
                case true:
                    $Output = "-----BEGIN PUBLIC KEY-----"."\n".$Data."\n"."-----END PUBLIC KEY-----";
                    if ($FileSaving) {
                        file_put_contents('PublicKey.pem', $Output);
                    }
                    break;
                default:
                    $Output = "-----BEGIN PRIVATE KEY-----"."\n".$Data."\n"."-----END PRIVATE KEY-----";
                    if ($FileSaving) {
                        file_put_contents('PrivateKey.pem', $Output);
                    }
                    break;
            }
            return $Output;
        }
    }
}
