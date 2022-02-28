<?php

namespace Chiiya\LaravelPasses\Apple\Traits;

use Chiiya\LaravelPasses\Apple\Components\AuxiliaryField;
use Chiiya\LaravelPasses\Apple\Components\Field;
use Chiiya\LaravelPasses\Apple\Components\SecondaryField;
use Chiiya\LaravelPasses\Common\Validation\MaxItems;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

trait HasFields
{
    /**
     * @var SecondaryField[]
     */
    #[CastWith(ArrayCaster::class, SecondaryField::class)]
    #[MaxItems(3)]
    public array $headerFields = [];

    /**
     * @var Field[]
     */
    #[CastWith(ArrayCaster::class, Field::class)]
    #[MaxItems(2)]
    public array $primaryFields = [];

    /**
     * @var SecondaryField[]
     */
    #[CastWith(ArrayCaster::class, SecondaryField::class)]
    #[MaxItems(4)]
    public array $secondaryFields = [];

    /**
     * @var AuxiliaryField[]
     */
    #[CastWith(ArrayCaster::class, AuxiliaryField::class)]
    #[MaxItems(5)]
    public array $auxiliaryFields = [];

    /**
     * @var Field[]
     */
    #[CastWith(ArrayCaster::class, Field::class)]
    public array $backFields = [];

    protected function fields(): array
    {
        return ['headerFields', 'primaryFields', 'secondaryFields', 'auxiliaryFields', 'backFields'];
    }
}
