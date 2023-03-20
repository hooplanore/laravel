<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


defineProps({
    student:Object
})

const deleteStudent = id => {
    Inertia.delete(route('students.destroy', { student: id}),{
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <Head title="生徒詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">生徒詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-8 mx-auto">
                        <div class="lg:w-full md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                                <!-- <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="class_id" class="leading-7 text-sm text-gray-600">所属クラス</label>
                                    <div id="class_id" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ student.class_id }}</div>
                                </div>
                                </div> -->
                                <div class="p-2 w-1/2">
                                <div class="relative">

                                    <table class="w-full stshow">
                                        <tr>
                                            <th><label for="name" class="whitespace-nowrap leading-7 text-sm">所属クラス</label></th>
                                            <td> 
                                                <div id="group">
                                                    <span v-for="group in student.groups" :key="student.id">{{ group.name }}クラス / 
                                                        <span v-if="group.group_category === 0 " class="bg-red-100 px-1 py-1 rounded-md" >ADV</span>
                                                        <span v-if="group.group_category === 1 " class="bg-green-500 px-1 py-1 rounded-md" >Reg</span>
                                                        <span v-if="group.group_category === 2 " class="bg-green-300 px-1 py-1 rounded-md" >Pre</span>
                                                        <span v-if="group.group_category === 3 " class="bg-yellow-100 px-1 py-1 rounded-md" >Jr.</span>
                                                        <span v-if="group.group_category === 4 " class="bg-pink-100 px-1 py-1 rounded-md" >Kinder</span>
                                                        <span v-if="group.group_category === 5 " class="bg-blue-100 px-1 py-1 rounded-md" >Short</span>
                                                        <span v-if="group.group_category === 6 " class="bg-gray-100 px-1 py-1 rounded-md" >Studio</span>
                                                        <span v-if="group.group_category === 7 ">その他</span><br> 
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="name" class="leading-7 text-sm text-gray-600">名前</label></th>
                                            <td>
                                                <div id="name">
                                                {{ student.name }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="kana" class="leading-7 text-sm text-gray-600">カナ</label></th>
                                            <td><div id="kana">
                                                {{ student.kana }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="email" class="leading-7 text-sm text-gray-600">メール</label></th>
                                            <td>
                                                <div id="email">
                                                {{ student.email }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="zip_code" class="leading-7 text-sm text-gray-600">郵便番号</label></th>
                                            <td>
                                                <div id="zip_code">
                                                    {{ student.zip_code }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="address1" class="leading-7 text-sm text-gray-600">住所1</label></th>
                                            <td>
                                                <div id="address1">
                                                    {{ student.address1 }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="address2" class="leading-7 text-sm text-gray-600">住所2</label></th>
                                            <td>
                                                <div id="address2">
                                                    {{ student.address2 }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label></th>
                                            <td>
                                                <div id="tel">
                                                    {{ student.tel }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="gender" class="leading-7 text-sm text-gray-600">性別</label></th>
                                            <td>
                                                <div id="gender">
                                                    <span v-if="student.gender === 0 ">女</span>
                                                    <span v-if="student.gender === 1 ">男</span>
                                                    <span v-if="student.gender === 2 ">他</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label></th>
                                            <td>
                                                <div id="birthday">
                                                    {{ student.birthday }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="joindate" class="leading-7 text-sm text-gray-600">入会日</label></th>
                                            <td>
                                                <div id="joindate">
                                                    {{ student.joindate }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="amount_category" class="leading-7 text-sm text-gray-600">支払区分</label></th>
                                            <td>
                                                <div id="amount_category">
                                                    <span v-if="student.amount_category === 0 ">月謝</span>
                                                    <span v-if="student.amount_category === 1 ">スタンプ</span>
                                                    <span v-if="student.amount_category === 2 ">オールパス</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="payment" class="leading-7 text-sm text-gray-600">支払方法</label></th>
                                            <td>
                                                <div id="payment">
                                                    <span v-if="student.payment === 1 ">現金</span>
                                                    <span v-if="student.payment === 2 ">PayPay</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="status" class="leading-7 text-sm text-gray-600">ステータス</label></th>
                                            <td>
                                                <div id="status">
                                                    <span v-if="student.status === 0 ">在籍</span>
                                                    <span v-if="student.status === 1 ">休会</span>
                                                    <span v-if="student.status === 2 ">退会</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="p-2 w-full">
                                                <Link as="button" :href="route('students.edit', { student: student.id })" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                                </div>
                                                <div class="p-2 w-full">
                                                <button @click="deleteStudent(student.id)" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                </div>


                                <div class="p-2 w-1/2">
                                <div class="relative">

                                </div>
                                </div>

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
