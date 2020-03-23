<template>
    <div :class="{ invisible: field.invisible }">
        <default-field :field="field">
            <template slot="field">
                <input :id="field.name" type="text"
                    :disabled="field.disabled"
                    class="w-full form-control form-input form-input-bordered"
                    :class="errorClasses"
                    :placeholder="field.name"
                    v-model="value"
                />

                <p v-if="hasError" class="help-text error-text mt-2 text-danger">
                    {{ firstError }}
                </p>
            </template>
        </default-field>
    </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    /**
     * Mount the component.
     */
    mounted() {
        Nova.$on('address-metadata-update-' + this.field.addressValue, ({value}) => {
            this.value = value;
        })
    },

    methods: {
        
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

<style>
    .invisible {
        visibility: hidden;
        position: absolute;
    }
</style>
