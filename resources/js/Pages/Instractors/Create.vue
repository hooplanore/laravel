<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Core as YubinBangoCore } from "yubinbango-core2";

defineProps({
    errors: Object,
    instractors:Array
})

const fetchAddress = () => {
new YubinBangoCore(String(form.zip_code), (value) => {
form.address1 = value.region + value.locality + value.street
})
}

const form = reactive({
    name : "",
    kana: "",
    email: "",
    password: "",
    zip_code: "",
    address1: "",
    address2: "",
    tel: "",
    gender: "",
    birthday: ""
})
const storeInstractor = () => {
//   form.addforms = addforms.value;
  Inertia.post('/instractors', form);
};
const addforms = ref([]); //入力されたデータが入るところ

// const addForm = () => { //追加ボタンをクリックしたときのイベント
//   let form_body = {};
//   form_body = {
//     selectedGroupIds: "",
//   };
//   addforms.value.push(form_body);
// };

// const deleteForm = (index) => { //削除ボタンをクリックしたときのイベント
//     addforms.value.splice(index, 1);
// };

</script>

<template>
    <Head title="講師登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">講師登録</h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">




                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">


                        <form @submit.prevent="storeInstractor">
                            

                            <div class="flex flex-wrap -m-2">
                                 <!-- <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="selectedGroupIds" class="leading-7 text-sm text-gray-600 pr-4">所属クラス</label>
                                    <select id="selectedGroupIds" class="w-2/1 bg-gray-100 bg-opacity-50 rounded border border-gray-300"  v-model="form.selectedGroupIds">
                                    <option value="">- Select Group -</option>
                                    <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                                    </select>

                                </div>
                                </div>  -->
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">講師名</label>
                                    <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="kana" class="leading-7 text-sm text-gray-600">フリガナ</label>
                                    <input type="text" id="kana" name="kana" v-model="form.kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">メール</label>
                                    <input type="email" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                                    <input type="text" id="password" name="password" v-model="form.password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="zip_code" class="leading-7 text-sm text-gray-600">郵便番号</label>
                                    <input type="text" id="zip_code" name="zip_code" @change="fetchAddress" v-model="form.zip_code" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="address1" class="leading-7 text-sm text-gray-600">住所1</label>
                                    <input type="text" id="address1" name="address1" v-model="form.address1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="address2" class="leading-7 text-sm text-gray-600">住所2</label>
                                    <input type="text" id="address2" name="address2" v-model="form.address2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                    <input type="tel" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label class="leading-7 text-sm text-gray-600 mr-4">性別</label>
                                    <input type="radio" id="gender" name="gender" v-model="form.gender" value="0">
                                    <label for="gender0" class="ml-2 mr-4">女</label>
                                    <input type="radio" id="gender" name="gender" v-model="form.gender" value="1">
                                    <label for="gender1" class="ml-2 mr-4">男</label>
                                    <input type="radio" id="gender" name="gender" v-model="form.gender" value="2">
                                    <label for="gender2" class="ml-2 mr-4">他</label>
                                </div>
                                </div>
                                <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="birthday" class="leading-7 text-sm text-gray-600">生年月日</label>
                                    <input type="date" id="birthday" name="birthday" v-model="form.birthday" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                </div>
                            </div>
                        </form>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
