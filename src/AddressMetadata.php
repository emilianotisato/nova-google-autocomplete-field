<?php

namespace Emilianotisato\GoogleAutocomplete;

use Laravel\Nova\Fields\Field;

class AddressMetadata extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'address-metadata';

    /**
     * Specify the extra metadata you need from address response.
     *
     * @param string $meta
     *
     * @return $this
     */
    public function metaData($meta = [])
    {
        return $this->withMeta($meta);
    }
}
