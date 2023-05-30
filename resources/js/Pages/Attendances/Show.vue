<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


defineProps({
    group:Object,
    user:Object,
    attendance:Object
})

</script>

<template>
    <Head title="出席管理" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">出席管理Log</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-full md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">

                                <table class="w-full mb-8 stshow">

                                    <tr>
                                        <th><label for="name" class="whitespace-nowrap">日時</label></th>
                                        <td>  {{ attendance.attendancedate }}</td>
                                    </tr>
                                    <tr>
                                        <th><label for="group_category" class="whitespace-nowrap">クラスカテゴリ</label></th>
                                        <td> 
                                            <div id="group_category" class="w-full focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            <span v-if="group.group_category === 0 ">ADV</span>
                                                <span v-if="group.group_category === 1 ">Regular</span>
                                                <span v-if="group.group_category === 2 ">Pre</span>
                                                <span v-if="group.group_category === 3 ">Jr.</span>
                                                <span v-if="group.group_category === 4 ">Kinder</span>
                                                <span v-if="group.group_category === 5 ">Short</span>
                                                <span v-if="group.group_category === 6 ">Studio</span>
                                                <span v-if="group.group_category === 7 ">その他</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><label for="name" class="whitespace-nowrap">クラス名</label></th>
                                        <td>  {{ group.name }}</td>
                                    </tr>
                                </table>

                                    <table class="w-full stshow">
                                            <tr> 
                                                <th class="whitespace-nowrap text-center">ID</th>
                                                <th>生徒名</th>
                                                <th>支払区分</th>
                                                <th>ステータス</th>
                                                <th>出席チェック</th>
                                            </tr>
                                            <tr v-for="student in group.students" :key="group.id"> 
                                                <td class="whitespace-nowrap text-center">{{ student.id }}</td>
                                                <td class="whitespace-nowrap text-center">{{ student.name }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                        <span v-if="student.amount_category === 0 ">月謝</span>
                                                        <span v-if="student.amount_category === 1 ">スタンプ</span>
                                                        <span v-if="student.amount_category === 2 ">オールパス</span></td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span class="bg-blue-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 0 ">在籍</span>
                                                    <span class="bg-red-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 1 ">休会</span>
                                                    <span class="bg-gray-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 2 ">退会</span></td>
                                                <td class="whitespace-nowrap text-center">
                                                    <label>
                                                    <input
                                                    v-model="isCheck"
                                                    type="checkbox"
                                                    class="peer sr-only"
                                                    />
                                                    <span
                                                    class="block w-[2em] cursor-pointer bg-gray-500 rounded-full 
                                                    p-[1px] after:block after:h-[1em] after:w-[1em] after:rounded-full 
                                                    after:bg-white after:transition peer-checked:bg-blue-500 
                                                    peer-checked:after:translate-x-[calc(100%-2px)]"
                                                    >
                                                    </span>
                                                    {{ isCheck }}
                                                    </label></td>
                                            </tr>
                                    </table>

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
