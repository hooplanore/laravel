<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    students: Object
})

const search = ref('')
// ref の値を取得するには .valueが必要

const searchStudents = () => {
Inertia.get(route('students.index', { search: search.value }))
}
</script>

<template>
    <Head title="生徒一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">生徒一覧</h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="w-full mx-auto overflow-auto">

                            <!-- <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ID</th>
                                    <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="border-b dark:border-neutral-500" v-for="group in groups.data" :key="group.id">
                                    <td class="whitespace-nowrap px-4 py-3">{{ group }}</td>
                                    <td class="whitespace-nowrap px-4 py-3">{{ group.name }}</td>
                                    <td class="whitespace-nowrap px-4 py-3">{{ group.id }}</td>
                                    <td class="whitespace-nowrap px-4 py-3">{{ group.name }}</td>
                                </tr>
                                </tbody>
                            </table>  -->

                        <div>
                        <input type="text" name="search" v-model="search">
                        <button class="bg-blue-300 text-white py-2 px-2" @click="searchStudents">検索</button>
                        </div>

                        <div class="flex pl-4 w-full mx-auto mb-10">
                                <Link as="button" :href="route('students.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">生徒登録</Link>
                        </div>

                        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">

                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ID</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">所属クラス名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カナ</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メール</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">電話番号</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">性別</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">誕生日</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">編集</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-b dark:border-neutral-500" v-for="student in students.data" :key="student.id">
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <Link as="button" class="flex ml-auto text-white bg-green-700 py-1 px-1 focus:outline-none hover:bg-gray-600 rounded" :href="route('students.show',{student:student.id})">詳細を見る</Link>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.id }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                    <span v-for="group in student.groups" :key="student.id">{{ group.name }}クラス_ 
                                                        <span v-if="group.group_category === 0 " class="bg-red-100 px-1 py-1 rounded-md" >ADV</span>
                                                        <span v-if="group.group_category === 1 " class="bg-green-500 px-1 py-1 rounded-md" >Reg</span>
                                                        <span v-if="group.group_category === 2 " class="bg-green-300 px-1 py-1 rounded-md" >Pre</span>
                                                        <span v-if="group.group_category === 3 " class="bg-yellow-100 px-1 py-1 rounded-md" >Jr.</span>
                                                        <span v-if="group.group_category === 4 " class="bg-pink-100 px-1 py-1 rounded-md" >Kinder</span>
                                                        <span v-if="group.group_category === 5 " class="bg-blue-100 px-1 py-1 rounded-md" >Short</span>
                                                        <span v-if="group.group_category === 6 " class="bg-gray-100 px-1 py-1 rounded-md" >Studio</span>
                                                        <span v-if="group.group_category === 7 ">その他</span> 
                                                    / </span></td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.name }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.kana }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.email }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.tel }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span class="bg-red-100 px-1 py-1" v-if="student.gender === 0 ">女</span>
                                                        <span class="bg-blue-100 px-1 py-1" v-if="student.gender === 1 ">男</span>
                                                        <span class="bg-yellow-100 px-1 py-1" v-if="student.gender === 2 ">他</span>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ student.birthday }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span v-if="student.status === 0 ">在籍</span>
                                                        <span v-if="student.status === 1 ">休会</span>
                                                        <span v-if="student.status === 2 ">退会</span>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <Link as="button" :href="route('students.edit',{student:student.id})" class="flex ml-auto text-white bg-black border-0 py-1 px-1 focus:outline-none hover:bg-gray-600 rounded">編集する</Link>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    <Pagination class="mt-6" :links="students.links"></Pagination>
                    </div>

                    </section>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>