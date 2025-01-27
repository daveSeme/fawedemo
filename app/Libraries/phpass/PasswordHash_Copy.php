<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Libraries\phpass;

class PasswordHash
{
    public $itoa64 = NULL;
    public $iteration_count_log2 = NULL;
    public $portable_hashes = NULL;
    public $random_state = NULL;
    public function __constructor($iteration_count_log2, $portable_hashes)
    {
        $this->itoa64 = "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        if ($iteration_count_log2 < 4 || 31 < $iteration_count_log2) {
            $iteration_count_log2 = 8;
        }
        $this->iteration_count_log2 = $iteration_count_log2;
        $this->portable_hashes = $portable_hashes;
        $this->random_state = microtime() . getmypid();
    }
    public function get_random_bytes($count)
    {
        $output = "";
        if ($fh = @fopen("/dev/urandom", "rb")) {
            $output = fread($fh, $count);
            fclose($fh);
        }
        if (strlen($output) < $count) {
            $output = "";
            $i = 0;
            while ($i < $count) {
                $this->random_state = md5(microtime() . $this->random_state);
                $output .= pack("H*", md5($this->random_state));
                $i += 16;
            }
            $output = substr($output, 0, $count);
        }
        return $output;
    }
    public function encode64($input, $count)
    {
        $output = "";
        $i = 0;
        $value = ord($input[$i++]);
        $output .= $this->itoa64[$value & 63];
        if ($i < $count) {
            $value |= ord($input[$i]) << 8;
        }
        $output .= $this->itoa64[$value >> 6 & 63];
        if ($count > $i++) {
            if ($i < $count) {
                $value |= ord($input[$i]) << 16;
            }
            $output .= $this->itoa64[$value >> 12 & 63];
            if ($count > $i++) {
                $output .= $this->itoa64[$value >> 18 & 63];
                if ($i < $count) {
                }
            }
        }
        return $output;
    }
    public function gensalt_private($input)
    {
        $output = "\$P\$";
        $output .= $this->itoa64[min($this->iteration_count_log2 + ("5" <= PHP_VERSION ? 5 : 3), 30)];
        $output .= $this->encode64($input, 6);
        return $output;
    }
    public function crypt_private($password, $setting)
    {
        $output = "*0";
        if (substr($setting, 0, 2) == $output) {
            $output = "*1";
        }
        if (substr($setting, 0, 3) != "\$P\$") {
            return $output;
        }
        $count_log2 = strpos($this->itoa64, $setting[3]);
        if ($count_log2 < 7 || 30 < $count_log2) {
            return $output;
        }
        $count = 1 << $count_log2;
        $salt = substr($setting, 4, 8);
        if (strlen($salt) != 8) {
            return $output;
        }
        if ("5" <= PHP_VERSION) {
            do {
                $hash = md5($salt . $password, true);
                $hash = md5($hash . $password, true);
            } while (!--$count);
        } else {
            do {
                $hash = pack("H*", md5($salt . $password));
                $hash = pack("H*", md5($hash . $password));
            } while (!--$count);
        }
        $output = substr($setting, 0, 12);
        $output .= $this->encode64($hash, 16);
        return $output;
    }
    public function gensalt_extended($input)
    {
        $count_log2 = min($this->iteration_count_log2 + 8, 24);
        $count = (1 << $count_log2) - 1;
        $output = "_";
        $output .= $this->itoa64[$count & 63];
        $output .= $this->itoa64[$count >> 6 & 63];
        $output .= $this->itoa64[$count >> 12 & 63];
        $output .= $this->itoa64[$count >> 18 & 63];
        $output .= $this->encode64($input, 3);
        return $output;
    }
    public function gensalt_blowfish($input)
    {
        $itoa64 = "./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $output = "\$2a\$";
        $output .= chr(ord("0") + $this->iteration_count_log2 / 10);
        $output .= chr(ord("0") + $this->iteration_count_log2 % 10);
        $output .= "\$";
        $i = 0;
        $c1 = ord($input[$i++]);
        $output .= $itoa64[$c1 >> 2];
        $c1 = ($c1 & 3) << 4;
        if (16 <= $i) {
            $output .= $itoa64[$c1];
        } else {
            $c2 = ord($input[$i++]);
            $c1 |= $c2 >> 4;
            $output .= $itoa64[$c1];
            $c1 = ($c2 & 15) << 2;
            $c2 = ord($input[$i++]);
            $c1 |= $c2 >> 6;
            $output .= $itoa64[$c1];
            $output .= $itoa64[$c2 & 63];
            if (1) {
            }
        }
        return $output;
    }
    public function HashPassword($password)
    {
        $random = "";
        if (CRYPT_BLOWFISH == 1 && !$this->portable_hashes) {
            $random = $this->get_random_bytes(16);
            $hash = crypt($password, $this->gensalt_blowfish($random));
            if (strlen($hash) == 60) {
                return $hash;
            }
        }
        if (CRYPT_EXT_DES == 1 && !$this->portable_hashes) {
            if (strlen($random) < 3) {
                $random = $this->get_random_bytes(3);
            }
            $hash = crypt($password, $this->gensalt_extended($random));
            if (strlen($hash) == 20) {
                return $hash;
            }
        }
        if (strlen($random) < 6) {
            $random = $this->get_random_bytes(6);
        }
        $hash = $this->crypt_private($password, $this->gensalt_private($random));
        if (strlen($hash) == 34) {
            return $hash;
        }
        return "*";
    }
    public function CheckPassword($password, $stored_hash)
    {
        $hash = $this->crypt_private($password, $stored_hash);
        if ($hash[0] == "*") {
            $hash = crypt($password, $stored_hash);
        }
        return $hash == $stored_hash;
    }
}

?>