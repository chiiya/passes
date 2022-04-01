<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use SplFileInfo;

class Image extends SplFileInfo
{
    public function __construct(
        string $filename,
        /** Optional name to use in pass archive. */
        protected ?string $name = null,
        /** Optional image scale for retina displays (@1x, @2x or @3x). */
        protected ?int $scale = 1,
    ) {
        parent::__construct($filename);
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
