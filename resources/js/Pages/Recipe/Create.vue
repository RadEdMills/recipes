<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Editor from '@tinymce/tinymce-vue';
import { useForm } from "@inertiajs/vue3";
import {watch} from "vue";

const form = useForm({
    title: null,
    tags: null,
    origins: null,
    instructions: null,
    ingredients: null,
    description: null,
})

const props = defineProps({
    tags: Object,
    origins: Object,
    ingredients: Object,
    measurement_units: Object
})

</script>
<template>
    <AppLayout title="Create Recipe">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Create Recipe
            </h2>
        </template>

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form @submit.prevent="form.post(route('recipe.store'))">
                    <div class="">
                        <v-text-field
                            label="Title"
                            v-model="form.title"
                            variant="solo"
                            required
                        ></v-text-field>
                    </div>

                    <div>
                        <v-combobox
                            label="Tags"
                            v-model="form.tags"
                            :items="tags"
                            item-id="id"
                            item-title="name"
                            variant="solo"
                            chips
                            multiple
                        ></v-combobox>
                    </div>

                    <div>
                        <v-combobox
                            label="Origin"
                            v-model="form.origins"
                            :items="origins"
                            item-id="id"
                            item-title="name"
                            chips
                            multiple
                            variant="solo"
                        ></v-combobox>
                    </div>

                    <div class="pb-3">
                        <InputLabel for="description" value="Description" />
                        <Editor
                            v-model="form.description"
                            api-key="no-api-key"
                            :init="{
                                plugins: 'lists link image table code help wordcount'
                            }"
                        />
                    </div>

                    <div>
                        <v-combobox
                            label="Ingredients"
                            v-model="form.ingredients"
                            :items="ingredients"
                            item-id="id"
                            item-title="name"
                            @update:modelValue="selectIngredient($event)"
                            chips
                            multiple
                            variant="solo"
                        ></v-combobox>
                    </div>

                    <div>
                        <div class="pb-3" v-for="(ingredient, index) in form.ingredients">
                            <div class="flex" v-if="typeof ingredient === 'string'">
                                <v-text-field
                                    class="!flex-none w-32 px-3"
                                    v-model="form.ingredients[form.ingredients.length - 1].quantity"
                                    label="Quantity"
                                    variant="solo"
                                    type="number"
                                ></v-text-field>
                                <v-select
                                    class="!flex-none w-40 px-3"
                                    v-model="form.ingredients[form.ingredients.length - 1].unit"
                                    label="Unit"
                                    :items="measurement_units"
                                    item-id="id"
                                    item-title="name"
                                    item-value="id"
                                    variant="solo"
                                ></v-select>
                                <div class="flex-none px-3 py-5">
                                    {{ ingredient }}
                                </div>
                            </div>
                            <div class="flex" v-else>
                                <v-text-field
                                    class="!flex-none w-32 px-3"
                                    label="Quantity"
                                    v-model="form.ingredients[index].quantity"
                                    variant="solo"
                                    type="number"
                                    required
                                ></v-text-field>
                                <v-select
                                    class="!flex-none w-40 px-3"
                                    label="Unit"
                                    v-model="form.ingredients[index].unit"
                                    :items="measurement_units"
                                    item-id="id"
                                    item-title="name"
                                    item-value="id"
                                    variant="solo"
                                    required
                                ></v-select>
                                <div class="flex-none px-3 py-5">
                                    {{ ingredient.name }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pb-3">
                        <InputLabel for="instructions" value="Instructions" />
                        <Editor
                            v-model="form.instructions"
                            api-key="no-api-key"
                            :init="{
                                plugins: 'lists link image table code help wordcount'
                            }"
                        />
                    </div>

                    <div>
                        <v-btn type="submit">Save</v-btn>
                    </div>
                </form>
            </div>
        </div>


    </AppLayout>
</template>
<style scoped>

</style>
