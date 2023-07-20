<template>
    <AppLayout title="Create Ingredient">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Ingredient
            </h2>
        </template>

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form @submit.prevent="form.post(route('ingredient.store'))">
                    <div class="">
                        <v-text-field
                            label="Name"
                            v-model="form.name"
                            variant="solo"
                            required
                        ></v-text-field>
                    </div>
                    <div>
                        <v-btn type="submit">Save</v-btn>
                    </div>
                </form>
            </div>
        </div>


    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
})
</script>

<style scoped>

</style>
