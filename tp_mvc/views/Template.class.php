<?php

class Template {
    private $filename = '';
    private $content = '';

    public function __construct($filename = '') {
        $this->filename = $filename;
        $this->content = implode('', @file($filename));
    }

    public function clear() {
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    public function write() {
        $this->clear();
        print $this->content;
    }

    public function getContent() {
        $this->clear();
        return $this->content;
    }

    public function replace($old = '', $new = '') {
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        } elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        } elseif (is_array($new)) {
            $value = implode(' ', $new);
        } else {
            $value = $new;
        }
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}
