<?php

namespace App\Core;

use App\Core\View\Viewable;

class Response
{
    private $output;

    /**
     * Response constructor.
     * @param Viewable $content
     */
    public function __construct(Viewable $content)
    {
        $this->output = $content->getData();
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
