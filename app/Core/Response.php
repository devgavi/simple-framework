<?php

namespace App\Core;

class Response
{
    private $output;

    /**
     * Response constructor.
     * @param $content
     */
    public function __construct($content)
    {
        if ($content instanceof Template) {
            $this->output = $content->getData();
        } else {
            $this->output = $content;
        }
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return $this->output;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->output;
    }
}
