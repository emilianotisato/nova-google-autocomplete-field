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

    public function countries($list){
        return $this->withMeta([
            'countries' => $list
        ]);
    }

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
