<?php

declare(strict_types=1);

namespace GetToken;

use GuzzleHttp\Client;
use Helper\Helper;

/**
 * Abstract GetToken expression field.
 */
abstract class GetToken
{
  /**
   * Full range of values that are allowed for this field type.
   *
   * @var array
   */
  protected $uri;
  protected $data;
  protected $key;

  /**
   * Constructor
   */
  public function __construct($dateTime, $key, $data, $uri)
  {
    $this->uri = $uri;
    $this->key = Helper::encrypt($dateTime, $key);
    $this->data = $data;
  }


  public function token()
  {
    $client = new Client();
    $response = $client->get($this->uri);

    echo $response->getBody();

    $encryptedData = $this->key;
    return $encryptedData;
  }
}
