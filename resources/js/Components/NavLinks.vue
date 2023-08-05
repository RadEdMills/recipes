<script setup>
import NavLink from '@/Components/NavLink.vue';

</script>

<template>
    <NavLink :href="route('recipe.index')" :active="route().current('recipe.index')">
        All Recipes
    </NavLink>
<!--    <NavLink v-if="$page.props.auth.user" :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--        Dashboard-->
<!--    </NavLink>-->
    <NavLink v-if="$page.props.auth.user && $page.props.auth.user.current_team_id === 1" :href="route('recipe.create')" :active="route().current('recipe.create')">
        Create Recipe
    </NavLink>
    <NavLink v-if="$page.props.auth.user && $page.props.auth.user.current_team_id === 1" :href="route('ingredient.create')" :active="route().current('ingredient.create')">
        Create Ingredient
    </NavLink>

</template>

<script>
export default {
    name: "NavLinks"
}
</script>

<style scoped>

</style>
