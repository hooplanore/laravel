<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    errors: Object
})



const form = reactive({
    groupcategory_id : "",
    name : "",
    groupdate: "",
    grouptime: "",
    placename: "",
    address: "",
    status: "",
})
const storeGroup = ()=> {
    Inertia.post('/groups',form)
}

console.log(form);
</script>

<template>
    <Head title="クラス登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">クラス登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">

                        <form @submit.prevent="storeGroup">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="groupcategory_id" class="leading-7 text-sm text-gray-600 mr-4">カテゴリ</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="1">
                                    <label for="groupcategory_id0" class="ml-2 mr-4">ADV</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="2">
                                    <label for="groupcategory_id1" class="ml-2 mr-4">Regular</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="3">
                                    <label for="groupcategory_id2" class="ml-2 mr-4">Pre</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="4">
                                    <label for="groupcategory_id3" class="ml-2 mr-4">Jr.</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="5">
                                    <label for="groupcategory_id4" class="ml-2 mr-4">Kinder</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="6">
                                    <label for="groupcategory_id5" class="ml-2 mr-4">Short</label>
                                    <input type="radio" id="groupcategory_id" name="groupcategory_id" v-model="form.groupcategory_id" value="7">
                                    <label for="groupcategory_id6" class="ml-2 mr-4">Studio</label>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">クラス名</label>
                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="groupdate" class="leading-7 text-sm text-gray-600">曜日</label>
                                    <input type="text" id="groupdate" name="groupdate" v-model="form.groupdate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="grouptime" class="leading-7 text-sm text-gray-600">時間</label>
                                    <input type="text" id="grouptime" name="grouptime" v-model="form.grouptime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="placename" class="leading-7 text-sm text-gray-600">会場名</label>
                                    <input type="text" id="placename" name="placename" v-model="form.placename" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                                    <input type="text" id="address" name="address"  v-model=form.address class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
