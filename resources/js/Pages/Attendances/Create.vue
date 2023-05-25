<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


// defineProps({
//     group:Object,
//     user:Object,
//     apgroup:Object,
// })


</script>

<template>
    <Head title="出席登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">出席登録</h2>
       </template>

         <!-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <div class="container px-1 py-8 mx-auto">

                            <div class="w-full text-center bg-gradient-to-r from-blue-400 to-green-500 rounded-md my-8 shadow">
                                <h2 class="text-4xl text-white py-4">{{ group.name }} <span class="text-sm">クラス</span></h2>
                            </div>
                            

                            <div class="w-full mx-auto lg:flex md:flex-row justify-center">

                            <div class="lg:w-1/2 md:w-full">
                                <h2 class="text-2xl subtitle">所属生徒一覧</h2>
                                    <table class="w-full stshow">
                                            <tr> 
                                                <th class="whitespace-nowrap text-center"></th>
                                                <th>生徒名</th>
                                                <th>支払区分</th>
                                                <th>支払方法</th>
                                                <th>ステータス</th>
                                                <th>出席管理</th>
                                            </tr>
                                            <tr v-for="student in group.students" :key="group.id">
                                                <td class="whitespace-nowrap text-center"><Link class="text-white bg-green-600 py-1 px-1 hover:bg-gray-600 rounded" :href="route('students.show',{student:student.id})">詳細</LINK></td>
                                                <td class="whitespace-nowrap text-center">{{ student.name }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span v-if="student.amount_category === 0 ">月謝</span>
                                                    <span v-if="student.amount_category === 1 ">スタンプ</span>
                                                    <span v-if="student.amount_category === 2 ">オールパス</span>
                                                </td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span v-if="student.payment === 0 ">現金</span>
                                                    <span v-if="student.payment === 1 ">PayPay</span>
                                                </td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span class="bg-blue-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="student.status === 0 ">在籍</span>
                                                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="student.status === 1 ">休会</span>
                                                    <span class="bg-gray-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="student.status === 2 ">退会</span>
                                                </td>
                                                <td class="whitespace-nowrap text-center">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                </label>
                                                </td>
                                            </tr>
                                    </table>
                                <h2 class="text-2xl subtitle">AP生徒一覧</h2><table class="w-full stshow">
                                            <tr> 
                                                <th class="whitespace-nowrap text-center"></th>
                                                <th>生徒名</th>
                                                <th>支払区分</th>
                                                <th>支払方法</th>
                                                <th>ステータス</th>
                                                <th>出席管理</th>
                                            </tr>
                                            <tr v-for="apgroup in apgroup.apstudents" :key="apgroup.id"> 
                                                <td class="whitespace-nowrap text-center"><Link class="text-white bg-green-600 py-1 px-1 hover:bg-gray-600 rounded" :href="route('students.show',{student:apgroup.id})">詳細</Link></td>
                                                <td class="whitespace-nowrap text-center">{{ apgroup.name }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span v-if="apgroup.amount_category === 0 ">月謝</span>
                                                    <span v-if="apgroup.amount_category === 1 ">スタンプ</span>
                                                    <span v-if="apgroup.amount_category === 2 ">オールパス</span>
                                                </td>
                                                <td class="whitespace-nowrap text-center">
                                                    <span v-if="apgroup.payment === 0 ">現金</span>
                                                    <span v-if="apgroup.payment === 1 ">PayPay</span>
                                                </td>
                                                <td class="whitespace-nowrap text-center">
                                                    
                                                    <span class="bg-blue-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="apgroup.status === 0 ">在籍</span>
                                                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="apgroup.status === 1 ">休会</span>
                                                    <span class="bg-gray-500 text-white text-xs font-bold px-2 py-2 rounded-md" v-if="apgroup.status === 2 ">退会</span>
                                                    </td>
                                                <td class="whitespace-nowrap text-center">
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                </label>
                                                </td>
                                            </tr>
                                    </table>
                            </div>

                            <div class="lg:w-1/2 md:w-full lg:ml-5 md:mx-2">
                                <h2 class="text-2xl subtitle">クラス詳細</h2>

                                <table class="w-full stshow txleft">
                                    <tr>
                                        <th><label for="group_category" class="whitespace-nowrap">クラスカテゴリ</label></th>
                                        <td> 
                                            <div id="group_category" class="whitespace-nowrap">
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
                                    <tr>
                                        <th><label for="groupdate" class="whitespace-nowrap">曜日</label></th>
                                        <td>  {{ group.groupdate }} </td>
                                    </tr>
                                    <tr>
                                        <th><label for="grouptime" class="whitespace-nowrap">時間</label></th>
                                        <td>{{ group.grouptime }} </td>
                                    </tr>
                                    <tr>
                                        <th><label for="placename" class="whitespace-nowrap">会場名</label></th>
                                        <td>{{ group.placename }}</td>
                                    </tr>
                                    <tr>
                                        <th><label for="address" class="whitespace-nowrap">住所</label></th>
                                        <td>{{ group.address }}</td>
                                    </tr>
                                    <tr>
                                        <th><label for="address" class="whitespace-nowrap">担当講師</label></th>
                                        <td><div class="my-2" v-for="user in user.users" :key="user.id">{{ user.name }} <Link :href="route('instractors.show',{instractor:user.id})" class="mx-auto text-white bg-green-600 py-1 px-1 hover:bg-gray-600 rounded">詳細</Link><br></div></td>
                                    </tr>
                                </table>
                                
                                <div class="my-10 p-2 w-full flex justify-center">
                                <div><Link as="button" :href="route('groups.edit', { group: group.id })" class="mx-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link></div>
                                <div><button @click="deleteStudent(group.id)" class="mx-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button></div>
                                </div>
                            </div>
                  
                            </div>
                
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div> -->
    </AuthenticatedLayout>
</template>
