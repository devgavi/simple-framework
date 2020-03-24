<?php

namespace App\Core;

use Exception;

class Response
{
    private $output;

    /**
     * Response constructor.
     * @param $content
     * @throws Exception
     */
    public function __construct($content)
    {
        if (!$content instanceof Template && !is_string($content)) {
            throw new Exception('Data passed to response must be Template or string');
        }

        if ($content instanceof Template) {
            $this->output = $content->getData();
        } else {
            $this->output = (string)$content;
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
