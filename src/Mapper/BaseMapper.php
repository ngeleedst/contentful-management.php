<?php

/**
 * This file is part of the contentful/contentful-management package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Management\Mapper;

use Contentful\Core\Resource\ResourceArray;
use Contentful\Core\Resource\ResourceInterface;
use Contentful\Core\ResourceBuilder\MapperInterface;
use Contentful\Core\ResourceBuilder\ObjectHydrator;
use Contentful\Management\ResourceBuilder;

/**
 * BaseMapper class.
 */
abstract class BaseMapper implements MapperInterface
{
    /**
     * @var ResourceBuilder
     */
    protected $builder;

    /**
     * @var ObjectHydrator
     */
    protected $hydrator;

    /**
     * BaseMapper constructor.
     *
     * @param ResourceBuilder $builder
     */
    public function __construct(ResourceBuilder $builder)
    {
        $this->builder = $builder;
        $this->hydrator = new ObjectHydrator();
    }

    /**
     * @param string|object $target either a FQCN, or an object whose class will be automatically inferred
     * @param array         $data
     *
     * @return ResourceInterface|ResourceArray
     *
     * @deprecated 1.1 Use $this->hydrator->hydrate() instead
     */
    protected function hydrate($target, array $data)
    {
        /** @var ResourceInterface|ResourceArray $resource */
        $resource = $this->hydrator->hydrate($target, $data);

        return $resource;
    }
}
