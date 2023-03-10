<?php

namespace Engine\Core\Template;

class Theme
{
  const RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s',
  ];

  /**
   * Url current theme
   * @type string
   */
  public $url = '';

  /**
   * @var array
   */
  protected $data = [];

  /** 
   * @param null $name
   */
  public function header($name = null)
  {
    $name = strval($name);
    $file = 'header';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['header'], $name);
    }

    $this->loadTemplateFile($file);
  }

  /**
   * @param string $name
   */
  public function footer($name = '')
  {
    $name = strval($name);
    $file = 'footer';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
    }

    $this->loadTemplateFile($file);
  }

  /**
   * @param string $name
   */
  public function sidebar($name = '')
  {
    $name = strval($name);
    $file = 'sidebar';

    if ($name !== '') {
      $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
    }

    $this->loadTemplateFile($file);
  }

  /**
   * @param string $name
   * @param array $data
   */
  public function block($name = '', $data = [])
  {
    $name = strval($name);

    if ($name !== '') {
      $this->loadTemplateFile($name, $data);
    }
  }

  /**
   * @param $nameFile
   * @param array $data
   * @throws \Exception
   */
  private function loadTemplateFile($nameFile, $data = [])
  {
    $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';

    if (is_file($templateFile)) {
      extract($data);
      require_once $templateFile;
    } else {
      throw new \Exception(sprintf('View file %s does not exist!', $templateFile));
    }
  }

  /**
   * @return array
   */
  public function getData()
  {
    return $this->data;
  }

  /**
   * @param array $data
   */
  public function setData($data)
  {
    $this->data = $data;
  }
}
