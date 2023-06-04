<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
defineProps({
    groups: Object,
    attendances: Object
})
</script>

<template>
    <Head title="出席一覧" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">出席一覧</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <section class="text-gray-600 body-font">

                    <div class="container px-5 py-10 mx-auto">
                        <div class="w-full mx-auto overflow-auto">

        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-left text-sm font-light stshow txleft">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">クラス名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">カテゴリ</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">曜日</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">時間</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">会場名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">所属生徒</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="border-b dark:border-neutral-500" v-for="group in groups.data" :key="group.id">
                                            <td class="whitespace-nowrap px-4 py-3">
                                                <Link class="flex mx-auto text-white bg-green-600 py-1 px-2 text-center hover:bg-gray-600 rounded" :href="route('groups.show',{group:group.id})">出席登録</Link>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.name }}クラス</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span class="bg-red-100 px-1 py-1 rounded-md" v-if="group.group_category === 0 ">ADV</span>
                                                        <span class="bg-green-100 px-1 py-1 rounded-md" v-if="group.group_category === 1 ">Regular</span>
                                                        <span class="bg-lime-100 px-1 py-1 rounded-md" v-if="group.group_category === 2 ">Pre</span>
                                                        <span class="bg-yellow-100 px-1 py-1 rounded-md" v-if="group.group_category === 3 ">Jr.</span>
                                                        <span class="bg-pink-100 px-1 py-1 rounded-md" v-if="group.group_category === 4 ">Kinder</span>
                                                        <span class="bg-blue-100 px-1 py-1 rounded-md" v-if="group.group_category === 5 ">Short</span>
                                                        <span class="bg-black-100 px-1 py-1 rounded-md" v-if="group.group_category === 6 ">Studio</span>
                                                        <span class="bg-black-100 px-1 py-1 rounded-md" v-if="group.group_category === 7 ">その他</span>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.groupdate }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.grouptime }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">{{ group.placename }}</td>
                                            <td class="whitespace-nowrap px-4 py-3">
                                                        <span class="bg-green-100 px-1 py-1" v-if="group.status === 0 ">開校中</span>
                                                        <span class="bg-gray-100 px-1 py-1" v-if="group.status === 1 ">閉校中</span>
                                                        <span v-if="group.status === 2 ">その他</span>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3"><span v-for="student in group.students" :key="group.id">{{ student.name }} / </span></td>
                                        </tr>
                                        </tbody>
                                    </table> 
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </section> -->
                    



                    <section class="text-gray-600 body-font">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="w-full mx-auto overflow-auto">
                            
                            
                        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-left text-sm font-light stshow">
                                        
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">日程</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">クラス名</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">全体人数</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">所属人数</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">AP人数</th>
                                            <th scope="col"  class="whitespace-nowrap px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">スタンプ人数</th>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500" v-for="attendance in attendances.data" :key="attendance.id">
                                            <td scope="col"><Link :href="route('attendances.show',{attendance:attendance.id})">{{ attendance.attendancedate }}</Link></td>
                                            <td scope="col">{{ attendance.group.name }}クラス / {{ attendance.group.groupcategory_id }}</td>
                                            <td scope="col">{{ attendance.attendance_count }}人</td>
                                            <td scope="col">{{ attendance.belongs_count }}人</td>
                                            <td scope="col">{{ attendance.ap_count }}人</td>
                                            <td scope="col">{{ attendance.stamp_count }}人</td>
                                        </tr>
                                        </thead>
                                    </table> 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    <Pagination class="mt-6" :links="attendances.links"></Pagination>
                    </div>

                    </section>
                </div>

            </div>
        </div>

    </AuthenticatedLayout>
</template>
