<?php

namespace Jmk25\Service;

use Jmk25\Exception\ValidationException;

class UserService {
  public static function validateRegister($username, $password) {
    if (!$username) {
      throw new ValidationException("Username tidak boleh kosong");
    }

    if (!$password) {
      throw new ValidationException("Password tidak boleh kosong");
    }
  }
}