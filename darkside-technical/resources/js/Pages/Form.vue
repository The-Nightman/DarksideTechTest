<script setup lang="ts">
import Toast from "@/Components/Toast.vue";
import { FormData } from "@/types/formData";
import { Head, Link, router } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps<{
    formData: FormData;
}>();

const form = reactive({ ...props.formData });

const toast = reactive<{ show: boolean; message: string; success: boolean; }>({
    show: false,
    message: "",
    success: false,
});

/**
 * Submit the form data to the server.
 */
const submitForm = () => {
    if (form.id === null) {
        router.post(route("addDetails"), form, {
            onSuccess: (res) => {
                showToast("Details saved successfully", true);
                form.id = (res.props.formData as FormData).id;
            },
            onError: () => {
                showToast("Details failed to save", false);
            },
        });
    } else if (typeof form.id === "number") {
        router.put(route("editDetails"), form, {
            onSuccess: () => {
                showToast("Details updated successfully", true);
            },
            onError: () => {
                showToast("Details failed to update", false);
            },
        });
    }
};

/**
 * Delete the user's details from the server.
 */
const handleDelete = () => {
    router.delete(route("deleteDetails", { id: form.id }), {
        onSuccess: () => {
            showToast("Details deleted successfully", true);
            form.id = null;
            form.name = "";
            form.email = "";
            form.phone = "";
            form.house_number = "";
            form.address_1 = "";
            form.address_2 = "";
            form.postcode = "";
            form.city = "";
            form.state = "";
            form.country = "";
        },
        onError: () => {
            showToast("Details failed to delete", false);
        },
    });
};

/**
 * Show a toast notification with the given message and type.
 * @param {string} message - The message to display in the toast.
 * @param {boolean} success - The type of the toast (success = true, error = fail).
 */
const showToast = (message: string, success: boolean) => {
    toast.show = true;
    toast.message = message;
    toast.success = success;
    // Hide the toast after 4 seconds to give the user enough time to read it
    setTimeout(() => {
        toast.show = false;
    }, 4000);
};
</script>

<template>

    <Head title="My Details" />
    <div class="min-h-screen flex flex-col bg-gradient-to-tr from-blue-500 to-pink-500">
        <main class="flex-grow flex flex-col items-center justify-center">
            <Toast v-if="toast.show" :message="toast.message" :success="toast.success" />
            <div class="flex flex-col w-5/6 p-8 rounded-2xl bg-white shadow-2xl">
                <div class="flex mb-6 justify-between">
                    <Link :href="route('home')" aria-label="Back to home"
                        class="w-min py-2 px-6 rounded-md bg-blue-400 hover:bg-blue-300 active:bg-blue-500" as="button">
                    Back
                    </Link>
                    <button class="w-min py-2 px-6 rounded-md bg-red-400 hover:bg-red-300 active:bg-red-500"
                        v-if="form.id !== null" @click="handleDelete" as="button" aria-label="Delete my details">
                        Delete
                    </button>
                </div>
                <img class="w-24 mx-auto rounded-full" src="../../images/Profile_avatar_placeholder.png"
                    alt="placeholder avatar image" />
                <h1 class="text-center text-2xl">My Details</h1>
                <form class="flex flex-col" @submit.prevent="submitForm">
                    <fieldset class="mt-6">
                        <legend class="mb-6">Customer Information</legend>
                        <div class="flex flex-col gap-3">
                            <div class="relative z-0 w-full sm:w-96">
                                <input
                                    class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/name"
                                    v-model="form.name" type="text" id="name" name="name" placeholder=""
                                    aria-description="Enter your full name" required />
                                <label
                                    class="peer-focus/name:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/name:left-0 peer-focus/name:text-blue-600 peer-placeholder-shown/name:scale-100 peer-placeholder-shown/name:translate-y-0 peer-focus/name:scale-75 peer-focus/name:-translate-y-6"
                                    for="name">Name</label>
                            </div>
                            <div class="relative z-0 w-full sm:w-96">
                                <input
                                    class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/email"
                                    v-model="form.email" type="email" id="email" name="email" placeholder=""
                                    aria-description="Enter your email" required />
                                <label
                                    class="peer-focus/email:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/email:left-0 peer-focus/email:text-blue-600 peer-placeholder-shown/email:scale-100 peer-placeholder-shown/email:translate-y-0 peer-focus/email:scale-75 peer-focus/email:-translate-y-6"
                                    for="email">Email</label>
                            </div>
                            <div class="relative z-0 w-full sm:w-64">
                                <input
                                    class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/tel"
                                    v-model="form.phone" type="tel" id="telephone" name="telephone" placeholder=""
                                    aria-description="Enter your chosen phone number" required />
                                <label
                                    class="peer-focus/tel:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/tel:left-0 peer-focus/tel:text-blue-600 peer-placeholder-shown/tel:scale-100 peer-placeholder-shown/tel:translate-y-0 peer-focus/tel:scale-75 peer-focus/tel:-translate-y-6"
                                    for="telephone">Telephone</label>
                            </div>
                        </div>
                        <fieldset class="flex flex-col sm:flex-row w-full mt-8 justify-between">
                            <legend class="mb-6">Address</legend>
                            <div class="flex flex-col w-full sm:w-5/12 gap-3">
                                <div class="relative z-0 w-40">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/housenum"
                                        v-model="form.house_number" type="text" id="houseNumber" name="houseNumber"
                                        placeholder="" aria-description="Enter your house or building number"
                                        required />
                                    <label
                                        class="peer-focus/housenum:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/housenum:left-0 peer-focus/housenum:text-blue-600 peer-placeholder-shown/housenum:scale-100 peer-placeholder-shown/housenum:translate-y-0 peer-focus/housenum:scale-75 peer-focus/housenum:-translate-y-6"
                                        for="houseNumber">House/Building No.</label>
                                </div>
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/address1"
                                        v-model="form.address_1" type="text" id="addressLine1" name="addressLine1"
                                        placeholder="" aria-description="Enter the first line of your address"
                                        required />
                                    <label
                                        class="peer-focus/address1:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/address1:left-0 peer-focus/address1:text-blue-600 peer-placeholder-shown/address1:scale-100 peer-placeholder-shown/address1:translate-y-0 peer-focus/address1:scale-75 peer-focus/address1:-translate-y-6"
                                        for="addressLine1">Address Line 1</label>
                                </div>
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/address2"
                                        v-model="form.address_2" type="text" id="addressLine2" name="addressLine2"
                                        placeholder=""
                                        aria-description="Enter the second line of your address (optional)" />
                                    <label
                                        class="peer-focus/address2:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/address2:left-0 peer-focus/address2:text-blue-600 peer-placeholder-shown/address2:scale-100 peer-placeholder-shown/address2:translate-y-0 peer-focus/address2:scale-75 peer-focus/address2:-translate-y-6"
                                        for="addressLine2">Address Line 2 (Optional)</label>
                                </div>
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/postcode"
                                        v-model="form.postcode" type="text" id="postcode" name="postcode" placeholder=""
                                        aria-description="Enter your postal or zip code" required />
                                    <label
                                        class="peer-focus/postcode:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/postcode:left-0 peer-focus/postcode:text-blue-600 peer-placeholder-shown/postcode:scale-100 peer-placeholder-shown/postcode:translate-y-0 peer-focus/postcode:scale-75 peer-focus/postcode:-translate-y-6"
                                        for="postcode">Postcode</label>
                                </div>
                            </div>
                            <div class="flex flex-col w-full sm:w-5/12 gap-3">
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/town"
                                        v-model="form.city" type="text" id="town" name="town" placeholder=""
                                        aria-description="Enter your Town or City of residence" required />
                                    <label
                                        class="peer-focus/town:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/town:left-0 peer-focus/town:text-blue-600 peer-placeholder-shown/town:scale-100 peer-placeholder-shown/town:translate-y-0 peer-focus/town:scale-75 peer-focus/town:-translate-y-6"
                                        for="town">Town/City</label>
                                </div>
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/countyState"
                                        v-model="form.state" type="text" id="countyState" name="countyState"
                                        placeholder="" aria-description="Enter your County or State of residence"
                                        required />
                                    <label
                                        class="peer-focus/countyState:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/countyState:left-0 peer-focus/countyState:text-blue-600 peer-placeholder-shown/countyState:scale-100 peer-placeholder-shown/countyState:translate-y-0 peer-focus/countyState:scale-75 peer-focus/countyState:-translate-y-6"
                                        for="countyState">County/State</label>
                                </div>
                                <div class="relative z-0 w-full">
                                    <input
                                        class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/country"
                                        v-model="form.country" type="text" id="country" name="country" placeholder=""
                                        aria-description="Enter your Country of residence" required />
                                    <label
                                        class="peer-focus/country:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/country:left-0 peer-focus/country:text-blue-600 peer-placeholder-shown/country:scale-100 peer-placeholder-shown/country:translate-y-0 peer-focus/country:scale-75 peer-focus/country:-translate-y-6"
                                        for="country">Country</label>
                                </div>
                            </div>
                        </fieldset>
                    </fieldset>
                    <button
                        class="h-10 w-32 mt-8 mx-auto rounded text-white text-lg bg-blue-500 hover:bg-blue-400 active:bg-blue-600"
                        type="submit" aria-label="Save my details">
                        Save Details
                    </button>
                </form>
            </div>
        </main>
    </div>
</template>
