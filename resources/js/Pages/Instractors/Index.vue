<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    users: Object
})

</script>
<template>
 <Head title="講師一覧" />
 <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">講師一覧</h2>

    </template>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="w-full mx-auto overflow-auto">


                        <div class="flex pl-4 w-full mx-auto mb-10">
                                <Link :href="route('instractors.create')" as="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">講師登録</Link>
                        </div>

                        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">

                                    <table class="min-w-full text-left text-sm font-light stshow">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ID</th>
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
                                        <tr v-for="user in users.data" :key="user.id">
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <Link :href="route('instractors.show',{instractor:user.id})" class="mx-auto text-white bg-green-600 py-1 px-1 hover:bg-gray-600 rounded">詳細</Link>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ user.name }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ user.kana }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ user.email }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ user.tel }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <span class="bg-red-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="user.gender === 0 ">女</span>
                                                <span class="bg-blue-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="user.gender === 1 ">男</span>
                                                <span class="bg-yellow-100 text-xs px-2 py-2 font-bold rounded-md" v-if="user.gender === 2 ">他</span>    
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ user.birthday }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <span class="bg-blue-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="user.status === 0 ">在籍</span>
                                                <span class="bg-red-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="user.status === 1 ">退社</span>
                                                <span class="bg-gray-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="user.status === 2 ">その他</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    </section>
                    
                </div>
            </div>
        </div>

 </AuthenticatedLayout>
</template>
