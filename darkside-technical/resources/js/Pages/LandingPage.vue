<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canOpenDetails?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>

    <Head title="My Profile" />
    <div class="h-screen flex flex-col bg-gradient-to-tr from-blue-500 to-pink-500">
        <main class="flex-grow flex items-center justify-center">
            <div class="flex flex-col w-5/6 p-8 rounded-2xl bg-white shadow-2xl">
                <img class="w-24 mx-auto rounded-full" src="../../images/Profile_avatar_placeholder.png"
                    alt="placeholder avatar image">
                <h1 class="text-center text-2xl">My Profile</h1>
                <p class="text-center text-lg text-gray-500">Welcome to your profile page</p>
                <Link :href="route('myDetails')"
                    class="mt-12 mx-auto py-2 px-6 rounded-md bg-blue-400 hover:bg-blue-300 active:bg-blue-500"
                    as="button">
                Edit My Details
                </Link>
            </div>
        </main>
        <footer class="py-16 text-center text-sm text-white/70">
            Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
    </div>
</template>
