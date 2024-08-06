<script lang="ts" setup></script>

<template>
  <form class="flex flex-col">
    <fieldset class="mt-6">
      <legend class="mb-6">
        Customer Information
      </legend>
      <div class="flex flex-col gap-3">
        <div class="relative z-0 w-96">
          <input
            class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/name"
            type="text" id="name" name="name" placeholder="" required />
          <label
            class="peer-focus/name:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/name:left-0 peer-focus/name:text-blue-600 peer-placeholder-shown/name:scale-100 peer-placeholder-shown/name:translate-y-0 peer-focus/name:scale-75 peer-focus/name:-translate-y-6"
            for="name">Name</label>
        </div>
        <div class="relative z-0 w-96">
          <input
            class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/email"
            type="email" id="email" name="email" placeholder="" required />
          <label
            class="peer-focus/email:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/email:left-0 peer-focus/email:text-blue-600 peer-placeholder-shown/email:scale-100 peer-placeholder-shown/email:translate-y-0 peer-focus/email:scale-75 peer-focus/email:-translate-y-6"
            for="email">Email</label>
        </div>
        <div class="relative z-0 w-64">
          <input
            class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/tel"
            type="tel" id="telephone" name="telephone" placeholder="" required />
          <label
            class="peer-focus/tel:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/tel:left-0 peer-focus/tel:text-blue-600 peer-placeholder-shown/tel:scale-100 peer-placeholder-shown/tel:translate-y-0 peer-focus/tel:scale-75 peer-focus/tel:-translate-y-6"
            for="telephone">Telephone</label>
        </div>
      </div>
      <fieldset class="flex flex-row w-full mt-8 justify-between">
        <legend class="mb-6">
          Address
        </legend>
        <div class="flex flex-col w-5/12 gap-3">
          <div class="relative z-0 w-40">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/housenum"
              type="text" id="houseNumber" name="houseNumber" placeholder="" required />
            <label
              class="peer-focus/housenum:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/housenum:left-0 peer-focus/housenum:text-blue-600 peer-placeholder-shown/housenum:scale-100 peer-placeholder-shown/housenum:translate-y-0 peer-focus/housenum:scale-75 peer-focus/housenum:-translate-y-6"
              for="houseNumber">House/Building
              No.</label>
          </div>
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/address1"
              type="text" id="addressLine1" name="addressLine1" placeholder="" required />
            <label
              class="peer-focus/address1:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/address1:left-0 peer-focus/address1:text-blue-600 peer-placeholder-shown/address1:scale-100 peer-placeholder-shown/address1:translate-y-0 peer-focus/address1:scale-75 peer-focus/address1:-translate-y-6"
              for="addressLine1">Address Line 1</label>
          </div>
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/address2"
              type="text" id="addressLine2" name="addressLine2" placeholder="" />
            <label
              class="peer-focus/address2:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/address2:left-0 peer-focus/address2:text-blue-600 peer-placeholder-shown/address2:scale-100 peer-placeholder-shown/address2:translate-y-0 peer-focus/address2:scale-75 peer-focus/address2:-translate-y-6"
              for="addressLine2">Address Line 2 (Optional)</label>
          </div>
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/postcode"
              type="text" id="postcode" name="postcode" placeholder="" required />
            <label
              class="peer-focus/postcode:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/postcode:left-0 peer-focus/postcode:text-blue-600 peer-placeholder-shown/postcode:scale-100 peer-placeholder-shown/postcode:translate-y-0 peer-focus/postcode:scale-75 peer-focus/postcode:-translate-y-6"
              for="postcode">Postcode</label>
          </div>
        </div>
        <div class="flex flex-col w-5/12 gap-3">
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/town"
              type="text" id="town" name="town" placeholder="" required />
            <label
              class="peer-focus/town:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/town:left-0 peer-focus/town:text-blue-600 peer-placeholder-shown/town:scale-100 peer-placeholder-shown/town:translate-y-0 peer-focus/town:scale-75 peer-focus/town:-translate-y-6"
              for="town">Town/City</label>
          </div>
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/countyState"
              type="text" id="countyState" name="countyState" placeholder="" required />
            <label
              class="peer-focus/countyState:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/countyState:left-0 peer-focus/countyState:text-blue-600 peer-placeholder-shown/countyState:scale-100 peer-placeholder-shown/countyState:translate-y-0 peer-focus/countyState:scale-75 peer-focus/countyState:-translate-y-6"
              for="countyState">County/State</label>
          </div>
          <div class="relative z-0 w-full">
            <input
              class="block py-2.5 px-0 w-full text-base text-gray-900 bg-transparent border-0 border-b-2 focus:outline-none focus:ring-0 focus:border-blue-600 peer/country"
              type="text" id="country" name="country" placeholder="" required />
            <label
              class="peer-focus/country:font-medium absolute text-base text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus/country:left-0 peer-focus/country:text-blue-600 peer-placeholder-shown/country:scale-100 peer-placeholder-shown/country:translate-y-0 peer-focus/country:scale-75 peer-focus/country:-translate-y-6"
              for="country">Country</label>
          </div>
        </div>
      </fieldset>
    </fieldset>
    <button class="h-10 w-32 mt-8 mx-auto rounded text-white text-lg bg-blue-500" type="submit">Save Details</button>
  </form>
</template>
