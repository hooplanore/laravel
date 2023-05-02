<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    student:Object,
    groups:Object
})

const form = reactive({
    id: props.student.id,
    //groupname : props.group.name,
    name : props.student.name,
    kana: props.student.kana,
    email: props.student.email,
    password: props.student.password,
    zip_code: props.student.zip_code,
    address1: props.student.address1,
    address2: props.student.address2,
    tel: props.student.tel,
    gender: props.student.gender,
    birthday: props.student.birthday,
    joindate: props.student.joindate,
    amount_category: props.student.amount_category,
    payment: props.student.payment,
    introducer: props.student.introducer,
    parent_name: props.student.parent_name,
    campaign: props.student.campaign,
    memo: props.student.memo,
    status: props.student.status,

    addforms: [],
})
const addforms = ref([]); //入力されたデータが入るところ

const addForm = () => { //追加ボタンをクリックしたときのイベント
  let form_body = {};
  form_body = {
    selectedGroupIds: "",
  };
  addforms.value.push(form_body);
};

const deleteForm = (index) => { //削除ボタンをクリックしたときのイベント
    addforms.value.splice(index, 1);
};


const updateStudent = id => {
    Inertia.put(route('students.update',{ student: id}),form)
}


</script>

<template>
    <Head title="生徒編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">生徒編集</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">

                        <label for="groupname" class="leading-7 text-sm text-gray-600">所属クラス</label>
                                <button class="ml-4 btn btn-sm btn-outline-success bg-blue-400 px-2 border-r text-white" @click="addForm()">追加</button>
                            <div v-for="(addform, index) in addforms" :key="index">
                                <select :id="'selectedGroupIds' + index" v-model="student.groups[0].id" class="w-2/1 bg-gray-100 bg-opacity-50 rounded border border-gray-300 my-2">
                                <option value="">- Select Group -</option>
                                <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                                </select>
                                <button class="btn btn-outline-danger" @click="deleteForm(index)">×</button>
                            </div>

                        <form @submit.prevent="updateStudent(form.id)">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                    
                            
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="groupname" class="leading-7 text-sm text-gray-600">所属クラス</label>
                                    <select :id="'selectedGroupIds' + index" v-model="student.groups[0].id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                     <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                                    </select>
                                    <button class="btn btn-outline-danger" @click="deleteForm(index)">×</button>
                                </div>
                                </div>

                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">生徒名</label>
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
                                    <input type="text" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                    <input type="text" id="zip_code" name="zip_code" v-model="form.zip_code" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                    <input type="text" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="gender" class="leading-7 text-sm text-gray-600 mr-4">性別</label>
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
                                <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="joindate" class="leading-7 text-sm text-gray-600">入会日</label>
                                    <input type="date" id="joindate" name="joindate" v-model="form.joindate" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="amount_category" class="leading-7 text-sm text-gray-600 mr-4">支払区分</label>
                                    <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="0">
                                    <label for="amount_category0" class="ml-2 mr-4">月謝</label>
                                    <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="1">
                                    <label for="amount_category1" class="ml-2 mr-4">スタンプ</label>
                                    <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="2">
                                    <label for="amount_category2" class="ml-2 mr-4">オールパス</label>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="payment" class="leading-7 text-sm text-gray-600 mr-4">支払方法</label>
                                    <input type="radio" id="payment" name="payment" v-model="form.payment" value="0">
                                    <label for="payment0" class="ml-2 mr-4">現金</label>
                                    <input type="radio" id="payment" name="payment" v-model="form.payment" value="1">
                                    <label for="payment1" class="ml-2 mr-4">PayPay</label>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="introducer" class="leading-7 text-sm text-gray-600">紹介者</label>
                                    <input type="text" id="introducer" name="introducer" v-model="form.introducer" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="parent_name" class="leading-7 text-sm text-gray-600">保護者氏名</label>
                                    <input type="text" id="parent_name" name="parent_name" v-model="form.parent_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="campaign" class="leading-7 text-sm text-gray-600">キャンペーン名</label>
                                    <input type="text" id="campaign" name="campaign" v-model="form.campaign" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div>
                                <!-- <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                                    <input type="text" id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                </div> -->
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="status" class="leading-7 text-sm text-gray-600 mr-4">ステータス</label>
                                    <input type="radio" id="status" name="status" v-model="form.status" value="0">
                                    <label for="status0" class="ml-2 mr-4">在籍</label>
                                    <input type="radio" id="status" name="status" v-model="form.status" value="1">
                                    <label for="status1" class="ml-2 mr-4">休会</label>
                                    <input type="radio" id="status" name="status" v-model="form.status" value="2">
                                    <label for="status2" class="ml-2 mr-4">退会</label>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
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
