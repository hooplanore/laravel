<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    group:Object
})

const form = reactive({
    id: props.group.id,
    group_category : props.group.group_category,
    name : props.group.name,
    groupdate: props.group.groupdate,
    grouptime: props.group.grouptime,
    placename: props.group.placename,
    address: props.group.address,
    status: props.group.status
})
const updateGroup = id => {
    Inertia.put(route('groups.update',{ group: id}),form)
}
</script>

<template>
    <Head title="クラス編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">クラス編集</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="updateGroup(form.id)">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-full md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">



                                <table class="w-full stshow">
                                    <tr>
                                        <th class="whitespace-nowrap text-center"><label>カテゴリ</label></th>
                                        <td>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="0">
                                            <label for="group_category0" class="ml-2 mr-4">ADV</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="1">
                                            <label for="group_category1" class="ml-2 mr-4">Regular</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="2">
                                            <label for="group_category2" class="ml-2 mr-4">Pre</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="3">
                                            <label for="group_category3" class="ml-2 mr-4">Jr.</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="4">
                                            <label for="group_category4" class="ml-2 mr-4">Kinder</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="5">
                                            <label for="group_category5" class="ml-2 mr-4">Short</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="6">
                                            <label for="group_category6" class="ml-2 mr-4">Studio</label>
                                            <input type="radio" id="group_category" name="group_category" v-model="form.group_category" value="7">
                                            <label for="group_category7" class="ml-2 mr-4">その他</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>クラス名</th>
                                        <td>
                                            <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>曜日</th>
                                        <td>
                                            <input type="text" id="groupdate" name="groupdate" v-model="form.groupdate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>時間</th>
                                        <td>
                                           <input type="text" id="grouptime" name="grouptime" v-model="form.grouptime" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>会場名</th>
                                        <td>
                                            <input type="text" id="placename" name="placename" v-model="form.placename" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>住所</th>
                                        <td>
                                            <input type="text" id="address" name="address" v-model="form.address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ステータス</th>
                                        <td>
                                            <input type="radio" id="status" name="status" v-model="form.status" value="0">
                                            <label for="status0" class="ml-2 mr-4">開校中</label>
                                            <input type="radio" id="status" name="status" v-model="form.status" value="1">
                                            <label for="status1" class="ml-2 mr-4">閉校中</label>
                                            <input type="radio" id="status" name="status" v-model="form.status" value="2">
                                            <label for="status2" class="ml-2 mr-4">その他</label>
                                        </td>
                                    </tr>
                            </table>

                                <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 mt-8 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
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
