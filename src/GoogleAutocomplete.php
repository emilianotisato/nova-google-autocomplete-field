<?php

namespace EmilianoTisato\GoogleAutocomplete;

use Laravel\Nova\Fields\Field;

class GoogleAutocomplete extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'google-autocomplete';

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
            'addressObject' => []
        ]);

        $this->withMeta([
            'type' => ''
        ]);
    }

    /**
     * Pass a country codes array
     *
     * @param [type] $list
     * @return void
     */
    public function countries($list){
        return $this->withMeta([
            'countries' => $list
        ]);
    }

    /**
     * Pass a type val
     *
     * https://developers.google.com/places/supported_types#table3
     *
     * @param string $type
     * @return void
     */
    public function placeType($type){
        return $this->withMeta([
            'type' => $type
        ]);
    }

    /**
     * Specify the extra address object fields you need from address response.
     *
     * @param string $meta
     *
     * @return $this
     */
    public function withValues(array $data)
    {
        $currentObject = $this->meta['addressObject'];
        
        return $this->withMeta([
            'addressObject' => array_merge($currentObject, $data)
        ]);
    }
}
