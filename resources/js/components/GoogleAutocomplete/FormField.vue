<template>
    <default-field :field="field">
        <template slot="field">
            <div class="form-group">
                <vue-google-autocomplete
                        ref="address"
                        :id="field.name"
                        class="w-full form-control form-input form-input-bordered"
                        :class="errorClasses"
                        :placeholder="placeholder"
                        :country="field.countries"
                        :types="field.type"
                        v-model="value"
                        v-on:keypress.enter.prevent=""
                        v-on:placechanged="getAddressData">
                </vue-google-autocomplete>
            </div>

            <p v-if="value != ''" class="my-2 text-success">{{ translate.current_address }}: {{ value }}</p>

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import VueGoogleAutocomplete from 'vue-google-autocomplete'

export default {
    components: { VueGoogleAutocomplete },

    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data: function () {
        return {
            address: ''
        }
    },

    computed: {
        translate() {
            return Nova.config.google_autocomplete_translations
        },

        placeholder() {
            if (this.value != '') {
                return this.translate.update_address
            }

            return this.field.name
        }
    },

    methods: {

        /**
         * Get address
         */
        getAddressData: function (addressData, placeResultData) {
            // Save current data address as a string
            this.handleChange(placeResultData.formatted_address)

            // Emmit events to by catch up for the other AddressMetadata fields
            this.field.addressObject.forEach(element => {
                if(addressData.hasOwnProperty(element)) {
                    Nova.$emit('address-metadata-update-' + element, {
                        value: addressData[element]
                    })
                }

                if(placeResultData.hasOwnProperty(element)) {
                    Nova.$emit('address-metadata-update-' + element, {
                        value: placeResultData[element]
                    })
                }
            });
        },

        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        }
    }
}
</script>
