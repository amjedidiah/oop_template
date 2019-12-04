<?php

  class site {
    private $header;
    private $footer;

    public function __construct($header,$footer) {
      $this->header = $header;
      $this->footer = $footer;
    }

    public function displayHeaderAndFooter($content,$title,$nav) {
      global $page;               //getting the page method in
      include $this->header;      //getting the page method in
      $nav !== "" ? include $nav : "";
      // $page->displayContent($content);
      include $content;
      include $this->footer;
    }

  }

?>
