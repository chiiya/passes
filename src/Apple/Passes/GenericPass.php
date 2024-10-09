<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Passes;

use Chiiya\Passes\Common\ArrayHelper;

class GenericPass extends Pass
{
    public function encode(): array
    {
        $array = parent::encode();
        $fields = ArrayHelper::only($array, $this->fields());

        return array_merge(ArrayHelper::except($array, $this->fields()), [
            'generic' => $fields,
        ]);
    }
}
