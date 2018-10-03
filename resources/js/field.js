Nova.booting((Vue, router) => {
    Vue.component('index-google-autocomplete-address', require('./components/GoogleAutocomplete/IndexField'));
    Vue.component('detail-google-autocomplete-address', require('./components/GoogleAutocomplete/DetailField'));
    Vue.component('form-google-autocomplete-address', require('./components/GoogleAutocomplete/FormField'));

    Vue.component('index-google-autocomplete-address_metadata', require('./components/AddressMetadata/IndexField'));
    Vue.component('detail-google-autocomplete-address_metadata', require('./components/AddressMetadata/DetailField'));
    Vue.component('form-google-autocomplete-address_metadata', require('./components/AddressMetadata/FormField'));
})
