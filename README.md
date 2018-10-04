## Nova Google AutoComplete Field Package

This field allows you to work with Google Places API to autocomplete on user input and get the full real address with all the metadata (like latitud and longitud).

## Installation

You can install the package in to a Laravel app that uses Nova via composer:

```bash
composer require emilianotisato/nova-google-autocomplete-field
```

Add the below to nova/resources/views/layout.blade.php
* To get resualts in specific language add (&language=en) to the below

```php
<script src="https://maps.googleapis.com/maps/api/js?key={{env('ADDRESS_AUTOCOMPLETE_API_KEY')}}&libraries=places"></script>
             
```

Add the below to your `.env` file

Create an app and enable Places API and create credentials to get your API key
https://console.developers.google.com

```shell
ADDRESS_AUTOCOMPLETE_API_KEY=############################
```

## Usage:
Add the use decalaration to your resource:

```php
use EmilianoTisato\GoogleAutocomplete\GoogleAutocomplete;
// ....

GoogleAutocomplete::make('Address'),

//You can add a country or countries to autocomplete or leave empty for all.
          
// Specify a single country
AddressAutocomplete::make('Address')
          ->countries('US'),
                
// Specify multiple countries [array]
AddressAutocomplete::make('Address')
          ->countries(['US','AU]),
```

You can access other parameter like `latitude, longitude, street_number, route, locality, administrative_area_level_1, country, postal_code` and whatever is available by de Places API:

```php
use EmilianoTisato\GoogleAutocomplete\AddressMetadata;
use EmilianoTisato\GoogleAutocomplete\GoogleAutocomplete;

// Now this address field will search and store the address as a string, but also made available the values in the withValues array
GoogleAutocomplete::make('Address')->withValues(['latitude', 'longitude']),

// And you can store the values by autocomplete like this
AddressMetadata::make('lat')->fromValue('latitude'),
AddressMetadata::make('long')->fromValue('longitude'),
```
