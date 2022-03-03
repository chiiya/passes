<?php

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Passes\BaseClass;
use Chiiya\Passes\Google\Passes\BaseObject;

interface ObjectRepositoryInterface
{
    public function index(string $classId, array $parameters = []): Component;

    public function get(string $id): Component;

    public function create(Component $instance): Component;

    public function update(BaseClass|BaseObject $instance): Component;
}
