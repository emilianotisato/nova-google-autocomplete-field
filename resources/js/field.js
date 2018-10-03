Nova.booting((Vue, router) => {
    Vue.component('index-google-autocomplete-address', require('./components/GoogleAutocompleteAddress/IndexField'));
    Vue.component('detail-google-autocomplete-address', require('./components/GoogleAutocompleteAddress/DetailField'));
    Vue.component('form-google-autocomplete-address', require('./components/GoogleAutocompleteAddress/FormField'));

    Vue.component('index-google-autocomplete-address_metadata', require('./components/GetAddressMetadata/IndexField'));
    Vue.component('detail-google-autocomplete-address_metadata', require('./components/GetAddressMetadata/DetailField'));
    Vue.component('form-google-autocomplete-address_metadata', require('./components/GetAddressMetadata/FormField'));
})
