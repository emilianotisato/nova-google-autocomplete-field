## Nova Google AutoComplete Field Package

This field allows you to work with Google Places API to autocomplete on user input and get the full real address with all the metadata (like latitud and longitud).

## Installation

You can install the package in to a Laravel app that uses Nova via composer:

```bash
composer require emilianotisato/nova-google-autocomplete-field
```

## Usage:
Add the use decalaration to your resource:

```php

AddressAutocomplete::make('Address'),

//You can add a country or countries to autocomplete or leave empty for all.
          
// Specify a single country
AddressAutocomplete::make('Address')
          ->countries('US'),
                
// Specify multiple countries [array]
AddressAutocomplete::make('Address')
          ->countries(['US','AU]),
```

Add the below to nova/resources/views/layout.blade.php
* To get resualts in specific language add (&language=en) to the below

```php

<script src="https://maps.googleapis.com/maps/api/js?key={{env('ADDRESS_AUTOCOMPLETE_API_KEY')}}&libraries=places"></script>
             
```

Add the below to your .env file

Create an app and enable Places API and create credentials to get your API key
https://console.developers.google.com

```php

ADDRESS_AUTOCOMPLETE_API_KEY=############################

```