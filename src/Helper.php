<?php

declare(strict_types=1);

namespace Helper;

/**
 * Abstract Helper expression field.
 */
abstract class Helper
{
  /**
   * Full range of values that are allowed for this field type.
   *
   * @var array
   */
  protected $fullRange = [];

  /**
   * Constructor
   */
  public function __construct()
  {
    //
  }

  /**
   * Check to see if a field is satisfied by a value.
   *
   * @internal
   * @param int $dateValue Date value to check
   * @param string $value Value to test
   *
   * @return bool
   */
  public static function encrypt($data = '---', $key = '---')
  {
    // Encrypt the data using HMAC-SHA256
    $encryptedData = hash_hmac('sha256', $data, $key, true);
    return base64_encode($encryptedData);
  }
}
