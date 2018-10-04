<?php

namespace EmilianoTisato\GoogleAutocomplete;

use Laravel\Nova\Element;
use Laravel\Nova\Fields\Text;

class AddressMetadata extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'address-metadata';

    /**
     * Initialize the field
     *
     * @param [type] $name
     * @param [type] $attribute
     * @param [type] $resolveCallback
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'disabled' => false
        ]);
    }

    /**
     * The value for autocomplete
     *
     * @param string $addressValue
     * @return void
     */
    public function fromValue(string $addressValue)
    {
        return $this->withMeta(['addressValue' => $addressValue]);
    }

    /**
     * Set the field in disabled mode
     *
     * @return void
     */
    public function disabled()
    {  
        return $this->withMeta(['disabled' => true]);        
    }
}
