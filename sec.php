<?php
require_once('C:\xampp\php\phpseclib1.0.15\Crypt/RSA.php');

define("KEY_PRIVATE", "-----BEGIN RSA PRIVATE KEY-----
MIIBOQIBAAJBAIpfTU+n3XjKhTm6i5WBswyc4E4ZmM2IHVJ5IhmEvGBuLH0zaNwYSzV1B5ZqDyCT
C6ZlzZ6RTWsLZ8hjb/6MrP0CAwEAAQJAAlK9TTln9No5nbwtvHHesWHaO5V0b6b5ubkXmHlrtuwR
nnNLGT9wqtIyP830/njo3qMFSIFKYGIErt+bSxEgBQIhAK5LTM2u2AudTUb6l1pi8qypXf7UHGUQ
bTxqPZaeh4gHAiEAyz0Wt0emBEieUDw7D4g3IXCb36cJcqDJ0OOz9rAwedsCIEV7QzzjrMDEjp/z
Gg8wTunCAvSpfkBT0hg5ih/XRtRVAiAQXVnf5iADBknhEgh7Zq9xvNyANLX5CeNWM4+BFIzCswIg
dGr1KW1fmIGJXoJ8qbFUbY7Bgk+cEc0kf2GvudfGQ5k=
-----END RSA PRIVATE KEY-----");


function decrypt(msg) {
    $rsa = new Crypt_RSA();
    $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
    $rsa->loadKey(KEY_PRIVATE, CRYPT_RSA_PRIVATE_FORMAT_PKCS1);
    $s = new Math_BigInteger(msg, 16);
    retrun $rsa->decrypt($s->toBytes());
}



?>