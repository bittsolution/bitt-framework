<?php

namespace Pulsar\Factory;

interface ApplicationInterface
{
    public function run(): void;
    public function boot(): void;
}
