<?php declare(strict_types=1);

namespace Chiiya\Passes\Common;

use Antwerpes\DataTransferObject\DataTransferObject;
use Chiiya\Passes\Exceptions\ValidationException;
use JsonSerializable;
use Symfony\Component\Validator\Validation;

abstract class Component extends DataTransferObject implements JsonSerializable
{
    public function __construct()
    {
        $validator = Validation::createValidatorBuilder()->enableAttributeMapping()->getValidator();
        $errors = $validator->validate($this);

        if (count($errors) > 0) {
            $messages = [];

            foreach ($errors as $error) {
                $messages[] = static::class.'.'.$error->getPropertyPath().': '.$error->getMessage();
            }

            throw new ValidationException('Invalid arguments', $messages);
        }
    }

    /**
     * Convert the object into something JSON serializable.
     */
    final public function jsonSerialize(): array
    {
        return $this->removeEmptyValues($this->encode());
    }

    /**
     * Remove null values and empty arrays from an array.
     */
    protected function removeEmptyValues(array $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = $this->removeEmptyValues($value);
            }

            if ($array[$key] === null || (is_array($array[$key]) && count($array[$key]) === 0)) {
                unset($array[$key]);
            }
        }

        return $array;
    }
}
