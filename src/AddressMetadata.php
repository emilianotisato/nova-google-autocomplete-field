<?php

namespace EmilianoTisato\GoogleAutocomplete;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Text;

class AddressMetadata extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'address-metadata';

    public function getValue(string $addressValue)
    {
        return $this->withMeta(['addressValue' => $addressValue]);
    }
}
