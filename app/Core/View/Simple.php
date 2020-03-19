<?php

namespace App\Core\View;

class Simple implements Viewable
{
    private $data;

    /**
     * Simple constructor.
     * @param string $data
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
