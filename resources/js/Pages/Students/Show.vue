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
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <!-- <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="class_id" class="leading-7 text-sm text-gray-600">所属クラス</label>
                                    <div id="class_id" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ student.class_id }}</div>
                                </div>
                                </div> -->
                                <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                    <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.name }}
                                    </div>
                                    <label for="kana" class="leading-7 text-sm text-gray-600">カナ</label>
                                    <div id="kana" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.kana }}
                                    </div>
                                    <label for="email" class="leading-7 text-sm text-gray-600">メール</label>
                                    <div id="email" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.email }}
                                    </div>
                                    <label for="zip_code" class="leading-7 text-sm text-gray-600">郵便番号</label>
                                    <div id="zip_code" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.zip_code }}
                                    </div>
                                    <label for="address1" class="leading-7 text-sm text-gray-600">住所1</label>
                                    <div id="address1" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.address1 }}
                                    </div>
                                    <label for="address2" class="leading-7 text-sm text-gray-600">住所2</label>
                                    <div id="address2" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.address2 }}
                                    </div>
                                    <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                                    <div id="tel" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.tel }}
                                    </div>
                                    <label for="gender" class="leading-7 text-sm text-gray-600">性別</label>
                                    <div id="gender" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <span v-if="student.gender === 0 ">女</span>
                                        <span v-if="student.gender === 1 ">男</span>
                                        <span v-if="student.gender === 2 ">他</span>
                                    </div>
                                    <label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
                                    <div id="birthday" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.birthday }}
                                    </div>
                                    <label for="joindate" class="leading-7 text-sm text-gray-600">入会日</label>
                                    <div id="joindate" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ student.joindate }}
                                    </div>
                                    <label for="amount_category" class="leading-7 text-sm text-gray-600">入会日</label>
                                    <div id="amount_category" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <span v-if="student.amount_category === 0 ">月謝</span>
                                        <span v-if="student.amount_category === 1 ">スタンプ</span>
                                        <span v-if="student.amount_category === 2 ">オールパス</span>
                                    </div>
                                    <label for="payment" class="leading-7 text-sm text-gray-600">支払方法</label>
                                    <div id="payment" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <span v-if="student.payment === 1 ">現金</span>
                                        <span v-if="student.payment === 2 ">PayPay</span>
                                    </div>
                                    <label for="status" class=" leading-7 text-sm text-gray-600">支払方法</label>
                                    <div id="status" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <span v-if="student.status === 0 ">在籍</span>
                                        <span v-if="student.status === 1 ">休会</span>
                                        <span v-if="student.status === 2 ">退会</span>
                                    </div>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <Link as="button" :href="route('students.edit', { student: student.id })" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                </div>
                                <div class="mt-20 p-2 w-full">
                                <button @click="deleteStudent(student.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
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
