Nova.booting((Vue, router) => {
    Vue.component('index-google-autocomplete', require('./components/GoogleAutocomplete/IndexField'));
    Vue.component('detail-google-autocomplete', require('./components/GoogleAutocomplete/DetailField'));
    Vue.component('form-google-autocomplete', require('./components/GoogleAutocomplete/FormField'));

    Vue.component('index-address-metadata', require('./components/AddressMetadata/IndexField'));
    Vue.component('detail-address-metadata', require('./components/AddressMetadata/DetailField'));
    Vue.component('form-address-metadata', require('./components/AddressMetadata/FormField'));
})
