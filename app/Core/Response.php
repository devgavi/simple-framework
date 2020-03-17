<?php

namespace App\Core;

class Response
{
    const HEADERS = [
        'Content-Type: text/html',
    ];

    private $content;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
