<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    groups: Object
})

const search = ref('')
// ref の値を取得するには .valueが必要
const searchGroups = () => {
Inertia.get(route('groups.index', { search: search.value }))
}
</script>

<template>
    <Head title="クラス一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">クラス一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="w-full mx-auto overflow-auto">

                        <div>
                        <input type="text" name="search" v-model="search">
                        <button class="bg-blue-300 text-white py-2 px-2" @click="searchGroups">検索</button>
                        </div>

                        <div class="flex pl-4 w-full mx-auto mb-10">
                                <Link as="button" :href="route('groups.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">クラス登録</Link>
                        </div>

                        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-left text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">クラス名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カテゴリ</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">曜日</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">時間</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">会場名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-b dark:border-neutral-500" v-for="group in groups.data" :key="group.id">
                                            <td class="px-4 py-3">
                                                <Link :href="route('groups.show',{group:group.id})">{{ group.id }}</Link>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.name }}クラス</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span class="bg-red-100 px-1 py-1" v-if="group.group_category === 0 ">ADV</span>
                                                        <span class="bg-green-100 px-1 py-1" v-if="group.group_category === 1 ">Regular</span>
                                                        <span class="bg-lime-100 px-1 py-1" v-if="group.group_category === 2 ">Pre</span>
                                                        <span class="bg-yellow-100 px-1 py-1" v-if="group.group_category === 3 ">Jr.</span>
                                                        <span class="bg-pink-100 px-1 py-1" v-if="group.group_category === 4 ">Kinder</span>
                                                        <span class="bg-blue-100 px-1 py-1" v-if="group.group_category === 5 ">Short</span>
                                                        <span class="bg-black-100 px-1 py-1" v-if="group.group_category === 6 ">Studio</span>
                                                        <span class="bg-black-100 px-1 py-1" v-if="group.group_category === 7 ">その他</span>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.groupdate }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.grouptime }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.placename }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span v-if="group.status === 0 ">開校中</span>
                                                        <span v-if="group.status === 1 ">閉校中</span>
                                                        <span v-if="group.status === 2 ">その他</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    <Pagination class="mt-6" :links="groups.links"></Pagination>
                    </div>

                    </section>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
