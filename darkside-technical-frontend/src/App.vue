<script setup lang="ts">
import { Form } from "./components";
import Avatar from "./assets/Profile_avatar_placeholder.png";
</script>

<template>
  <div class="flex h-screen items-center justify-center bg-gradient-to-tr from-blue-500 to-pink-500">
    <div class="w-5/6 p-8 rounded-2xl bg-white shadow-2xl">
      <img class="w-24 mx-auto rounded-full" :src="Avatar" alt="placeholder avatar image">
      <h1 class="text-center text-2xl">My Details</h1>
      <Form />
    </div>
  </div>
</template>
