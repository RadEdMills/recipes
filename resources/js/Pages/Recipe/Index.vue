<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    recipes: Object
});
</script>

<template>
    <AppLayout title="Recipes" can-login="{{canLogin}}" can-register="{{canRegister}}">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                All Recipes
            </h2>
        </template>

        <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="w-full sm:max-w-7xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <section class="bg-white dark:bg-gray-900">
                    <div class="container px-6 py-10 mx-auto">
                        <!--Recipe-->
                        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2" >
                            <div class="lg:flex" v-for="recipe in recipes">
                                <!--image-->
                                <a :href="route('recipe.show', recipe.id)">
                                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                                </a>
                                <div class="flex flex-col pt-1 lg:mx-6 relative">
                                    <!--title-->
                                    <a :href="route('recipe.show', recipe.id)" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                        {{  recipe.title }}
                                    </a>
                                    <!--description-->
                                    <div v-html="recipe.description"></div>
                                    <!--other info-->
                                    <div class="absolute bottom-0 left-0 pb-1">
                                        <div class="text-sm text-gray-700 bg-gray-200 dark:text-gray-100 rounded-xl mt-2 py-0.5 px-2 w-fit">
                                            <span v-for="tag in recipe.tags">{{ tag.name }}</span>
                                        </div>
                                        <div class="text-sm text-gray-700 bg-gray-200 dark:text-gray-100 rounded-xl mt-2 py-0.5 px-2 w-fit">
                                            <span v-for="origin in recipe.origins">{{ origin.name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </AppLayout>
</template>

<style scoped>

</style>
