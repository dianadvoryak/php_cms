<?php

namespace Engine\Core\Request;

class Request
{
  /**
   * @var arrray
   */
  public $get = [];

  /**
   * @var arrray
   */
  public $post = [];

  /**
   * @var arrray
   */
  public $request = [];

  /**
   * @var arrray
   */
  public $cookie = [];

  /**
   * @var arrray
   */
  public $files = [];

  /**
   * @var arrray
   */
  public $server = [];

  /**
   * Request constructor.
   */
  public function __construct()
  {
    $this->get = $_GET;
    $this->post = $_POST;
    $this->request = $_REQUEST;
    $this->cookie = $_COOKIE;
    $this->files = $_FILES;
    $this->server = $_SERVER;
  }
}