// Nova.booting((Vue, router) => {
//     Vue.component('index-google-autocomplete', require('./components/GoogleAutocomplete/IndexField'));
//     Vue.component('detail-google-autocomplete', require('./components/GoogleAutocomplete/DetailField'));
//     Vue.component('form-google-autocomplete', require('./components/GoogleAutocomplete/FormField'));

//     Vue.component('index-address-metadata', require('./components/AddressMetadata/IndexField'));
//     Vue.component('detail-address-metadata', require('./components/AddressMetadata/DetailField'));
//     Vue.component('form-address-metadata', require('./components/AddressMetadata/FormField'));
// })

Nova.booting((Vue) => {
    Nova.inertia('IndexGoogleAutocomplete', require('./components/GoogleAutocomplete/IndexField').default)
    Nova.inertia('DetailGoogleAutocomplete', require('./components/GoogleAutocomplete/DetailField').default)
    Nova.inertia('FormGoogleAutocomplete', require('./components/GoogleAutocomplete/FormField').default)

    Nova.inertia('IndexAddressMetadata', require('./components/AddressMetadata/IndexField').default)
    Nova.inertia('DetailAddressMetadata', require('./components/AddressMetadata/DetailField').default)
    Nova.inertia('FormAddressMetadata', require('./components/AddressMetadata/FormField').default)
})