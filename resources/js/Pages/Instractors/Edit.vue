<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    instractor:Object,
    groups:Array
})

//console.log(props);

const form = reactive({
    id : props.instractor.id,
    groupnames: props.instractor.groups.map(group => group.name), // studentに紐付いたすべてのグループ名を配列として取得
    name : props.instractor.name,
    kana : props.instractor.kana,
    zip_code : props.instractor.zip_code,
    address1 : props.instractor.address1,
    address2 : props.instractor.address2,
    email : props.instractor.email,
    tel : props.instractor.tel,
    gender : props.instractor.gender,
    birthday : props.instractor.birthday,
    auth : props.instractor.auth,
    status : props.instractor.status,
    addforms: [],
})

const addforms = ref([]); //入力されたデータが入るところ

addforms.value = props.instractor.groups;
console.log(props.instractor.groups);

const addForm = () => { //追加ボタンをクリックしたときのイベント
  let form_body = {};
  form_body = {
    id: "",
  };
  addforms.value.push(form_body);
};

const deleteForm = (index) => { //削除ボタンをクリックしたときのイベント
    addforms.value.splice(index, 1);
};

const updateInstractor = id => {
    form.addforms = addforms.value;
    Inertia.put(route('instractors.update',{ instractor: id}),form)
}
</script>

<template>
    <Head title="講師編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">講師編集</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="updateInstractor(form.id)">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-full md:w-2/3 mx-auto">
                            <div class="w-full mx-5">

                                <table class="w-full stshow txleft">
                                    <tr>
                                        <th><label>担当クラス</label></th>
                                        <td>
                                            <div v-for="(addform, index) in addforms" :key="index">
                                            <select :id="'selectedGroupIds' + index" v-model="addform.id" class="w-1/2 mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <option value="">- Select Group -</option>
                                                <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                                            </select>
                                            <button type="button" class="btn btn-outline-danger ml-4 bg-red-400 text-white px-2 rounded text-sm" @click="deleteForm(index)">削除</button>
                                            </div>
                                            <button type="button" class="ml-4 btn btn-sm btn-outline-success bg-blue-400 px-2 border-r text-white" @click="addForm()">追加</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="name">名前</label></th>
                                        <td><input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="email" class="leading-7 text-sm text-gray-600">カナ</label></th>
                                        <td><input type="text" id="kana" name="kana" v-model="form.kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th>
                                    <label for="email" class="leading-7 text-sm text-gray-600">メール</label></th>
                                        <td><input type="text" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="zip_code" class="leading-7 text-sm text-gray-600">郵便番号</label></th>
                                        <td><input type="text" id="zip_code" name="zip_code" v-model="form.zip_code" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th> <label for="address1" class="leading-7 text-sm text-gray-600">住所1</label></th>
                                        <td><input type="text" id="address1" name="address1" v-model="form.address1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th> <label for="address1" class="leading-7 text-sm text-gray-600">住所2</label></th>
                                        <td><input type="text" id="address2" name="address2" v-model="form.address2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="tel" class="leading-7 text-sm text-gray-600">電話</label></th>
                                        <td><input type="text" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="gender" class="leading-7 text-sm text-gray-600">性別</label></th>
                                        <td><input type="text" id="gender" name="gender" v-model="form.gender" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </td>
                                    </tr>
                                    <tr>
                                        <th><label for="auth" class="leading-7 text-sm text-gray-600">権限</label></th>
                                        <td><input type="text" id="auth" name="auth" v-model="form.auth" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                                    </tr>
                                    <tr>
                                        <th><label for="birthday" class="leading-7 text-sm text-gray-600">生年月日</label></th>
                                        <td><input type="date" id="birthday" name="birthday" v-model="form.birthday" class="lg:w-1/3 md:w-1/2 sm:w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
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
