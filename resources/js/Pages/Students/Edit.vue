<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
    student:Object,
    groups:Array,
    apstudent:Object
})

//console.log(props);

const form = reactive({
    id: props.student.id,
    groupnames: props.student.groups.map(group => group.name), // studentに紐付いたすべてのグループ名を配列として取得
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
    family_id: props.student.family_id,
    addforms: [],
    apgroupnames: props.apstudent.apgroups.map(group => group.name), // studentに紐付いたすべてのグループ名を配列として取得
    addapforms: [],
})
const addforms = ref([]); //入力されたデータが入るところ

addforms.value = props.student.groups;
console.log(props.student.groups);

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

//ap用
const addapforms = ref([]); //入力されたデータが入るところ

addapforms.value = props.apstudent.apgroups;
console.log(props.student.groups);

const addApForm = () => { //追加ボタンをクリックしたときのイベント
  let form_body = {};
  form_body = {
    id: "",
  };
  addapforms.value.push(form_body);
};

const deleteApForm = (index) => { //削除ボタンをクリックしたときのイベント
    addapforms.value.splice(index, 1);
};

const updateStudent = id => {
    form.addforms = addforms.value;
    form.addapforms = addapforms.value;
    console.log(addforms);
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

        <div class="container px-5 py-8 mx-auto">
            <div class="lg:w-full md:w-full mx-auto">
                <div class="w-full">

        <form @submit.prevent="updateStudent(form.id)">
            <table class="w-full stshow txleft">
                <tr>
                    <th><label>生徒名</label></th>
                    <td><input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th><label>所属クラス</label></th>
                    <td>
                        <div v-for="(addform, index) in addforms" :key="index">
                        <select :id="'selectedGroupIds' + index" v-model="addform.id" class="lg:w-1/4 md:w-full sm:w-full mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">- Select Group -</option>
                            <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger ml-4 bg-red-400 text-white px-2 rounded text-sm" @click="deleteForm(index)">削除</button>
                        </div>
                        <button type="button" class="ml-4 btn btn-sm btn-outline-success bg-blue-400 px-2 border-r text-white" @click="addForm()">追加</button>
                    </td>
                </tr>
                <tr>
                    <th><label>フリガナ</label></th>
                    <td><input type="text" id="kana" name="kana" v-model="form.kana" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th><label>メール</label></th>
                    <td><input type="text" id="email" name="email" v-model="form.email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th><label>パスワード</label></th>
                    <td><input type="text" id="password" name="password" v-model="form.password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th><label>郵便番号</label></th>
                    <td><input type="text" id="zip_code" name="zip_code" v-model="form.zip_code" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>住所1</th>
                    <td> <input type="text" id="address1" name="address1" v-model="form.address1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>住所2</th>
                    <td><input type="text" id="address2" name="address2" v-model="form.address2" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td><input type="text" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input type="radio" id="gender" name="gender" v-model="form.gender" value="0">
                        <label for="gender0" class="ml-2 mr-4">女</label>
                        <input type="radio" id="gender" name="gender" v-model="form.gender" value="1">
                        <label for="gender1" class="ml-2 mr-4">男</label>
                    </td>
                </tr>
                <tr>
                    <th>生年月日</th>
                    <td><input type="date" id="birthday" name="birthday" v-model="form.birthday" class="lg:w-1/4 md:w-full sm:w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>入会日</th>
                    <td><input type="date" id="joindate" name="joindate" v-model="form.joindate" class="lg:w-1/4 md:w-full sm:w-full  bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>支払区分</th>
                    <td>
                        <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="0">
                        <label for="amount_category0" class="ml-2 mr-4">月謝</label>
                        <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="1">
                        <label for="amount_category1" class="ml-2 mr-4">スタンプ</label>
                        <input type="radio" id="amount_category" name="amount_category" v-model="form.amount_category" value="2">
                        <label for="amount_category2" class="ml-2 mr-4">オールパス</label>
                    </td>
                </tr>
                <tr>
                    <th>支払方法</th>
                    <td>
                        <input type="radio" id="payment" name="payment" v-model="form.payment" value="0">
                        <label for="payment0" class="ml-2 mr-4">現金</label>
                        <input type="radio" id="payment" name="payment" v-model="form.payment" value="1">
                        <label for="payment1" class="ml-2 mr-4">PayPay</label>
                    </td>
                </tr>
                <tr>
                    <th>紹介者</th>
                    <td><input type="text" id="introducer" name="introducer" v-model="form.introducer" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>保護者氏名</th>
                    <td><input type="text" id="parent_name" name="parent_name" v-model="form.parent_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>キャンペーン名</th>
                    <td><input type="text" id="campaign" name="campaign" v-model="form.campaign" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
                <tr>
                    <th>ステータス</th>
                    <td>
                        <input type="radio" id="status" name="status" v-model="form.status" value="0">
                        <label for="status0" class="ml-2 mr-4">在籍</label>
                        <input type="radio" id="status" name="status" v-model="form.status" value="1">
                        <label for="status1" class="ml-2 mr-4">休会</label>
                        <input type="radio" id="status" name="status" v-model="form.status" value="2">
                        <label for="status2" class="ml-2 mr-4">退会</label>
                    </td>
                </tr>
                <tr>
                    <th>家族ID</th>
                    <td><input type="text" id="family_id" name="family_id" v-model="form.family_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></td>
                </tr>
            </table>


            <table class="w-full stshow txleft mt-8">
                
                <tr>
                    <th><label>AP出席クラス</label></th>
                    <td>
                        <div v-for="(addapform, index) in addapforms" :key="index">
                        <select :id="'selectedApGroupIds' + index" v-model="addapform.id" class="lg:w-1/4 md:w-full sm:w-full mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <option value="">- Select Group -</option>
                            <option v-for="group in groups" :value="group.id">{{ group.name }}</option>
                        </select>
                        <button type="button" class="btn btn-outline-danger ml-4 bg-red-400 text-white px-2 rounded text-sm" @click="deleteApForm(index)">削除</button>
                        </div>
                        <button type="button" class="ml-4 btn btn-sm btn-outline-success bg-blue-400 px-2 border-r text-white" @click="addApForm()">追加</button>
                    </td>
                </tr>
            </table>

                <div class="p-2 w-full">
                <button class="flex mx-auto text-white bg-indigo-500 border-0 my-8 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                </div>

            </form>
                            </div>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
