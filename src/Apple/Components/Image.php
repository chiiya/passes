<?php

namespace Chiiya\Passes\Apple\Components;

use SplFileInfo;

class Image extends SplFileInfo
{
    /**
     * Optional name to use in pass archive.
     */
    protected ?string $name;

    /**
     * Optional image scale for retina displays (@1x, @2x or @3x).
     */
    protected ?int $scale;

    /**
     * Image constructor.
     *
     * @param $file_name
     */
    public function __construct($file_name, ?string $name = null, int $scale = 1)
    {
        parent::__construct($file_name);
        $this->name = $name;
        $this->scale = $scale;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getScale(): int
    {
        return $this->scale;
    }

    public function setScale(int $scale): self
    {
        $this->scale = $scale;

        return $this;
    }
}
