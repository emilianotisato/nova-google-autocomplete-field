<template>
    <default-field :field="field">
        <template slot="field">
            <div class="form-group">
                <vue-google-autocomplete
                        ref="address"
                        :id="field.name"
                        class="w-full form-control form-input form-input-bordered"
                        :class="errorClasses"
                        :placeholder="field.name"
                        :country="field.countries"
                        v-model="value"
                        v-on:placechanged="getAddressData">
                </vue-google-autocomplete>
            </div>

            <p v-if="value != ''" class="my-2 text-success" v-text="value"></p>

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

    mounted() {
        console.log('Test.. ', this.value)
        this.address = this.value
    },

    methods: {

        /**
         * Get address
         */
        getAddressData: function (addressData, placeResultData, id) {
            console.log(addressData, placeResultData, id)
            this.handleChange(placeResultData.formatted_address)
            window.l1 = addressData
            window.l2 = placeResultData

        },

        /**
         * Handle change and pass metadata
         */
        handleKeydown(event) {
            this.field.metaData.forEach(element => {
                Nova.$emit('address-metadata-update-' + element, {
                    value: event.target.value
                })
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
