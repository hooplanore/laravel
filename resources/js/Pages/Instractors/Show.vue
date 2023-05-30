<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import dayjs from 'dayjs';


defineProps({
    user:Object
})

const deleteInstractor = id => {
    Inertia.delete(route('instractors.destroy', { user: id}),{
        onBefore: () => confirm('本当に削除しますか？')
    })
}

</script>

<template>
    <Head title="講師詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">講師詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                       <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-8 mx-auto">
                        <div class="lg:w-full md:w-full mx-auto">
                        <div class="w-full lg:flex md:flex-row justify-center">

                            <div class="lg:w-1/2 md:w-full">
                                <h2 class="text-2xl subtitle">イントラ詳細</h2>
                                    <table class="w-full stshow txleft">
                                        <tr>
                                            <th><label for="userid">ID</label></th>
                                            <td><div id="userid">{{ user.id }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="name">名前</label></th>
                                            <td><div id="name">{{ user.name }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="kana">カナ</label></th>
                                            <td><div id="kana">{{ user.kana }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="email">メール</label></th>
                                            <td><div id="email">{{ user.email }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="address1">住所1</label></th>
                                            <td><div id="address1">{{ user.address1 }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="address2">住所2</label></th>
                                            <td><div id="address2">{{ user.address2 }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="tel">電話番号</label></th>
                                            <td><div id="tel">{{ user.tel }}</div></td>
                                        </tr>
                                        <tr>
                                            <th><label for="gender">性別</label></th>
                                            <td>
                                                <div id="gender">
                                                    <span v-if="user.gender === 0 ">女</span>
                                                    <span v-if="user.gender === 1 ">男</span>
                                                    <span v-if="user.gender === 2 ">他</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="birthday">誕生日</label></th>
                                            <td><div id="birthday">{{ user.birthday }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label for="status">ステータス</label></th>
                                            <td>
                                                <div id="status">
                                                    <span v-if="user.status === 0 ">在籍</span>
                                                    <span v-if="user.status === 1 ">休会</span>
                                                    <span v-if="user.status === 2 ">退会</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                <div class="my-10 p-2 w-full flex justify-center">
                                <div><Link as="button" :href="route('instractors.edit', { instractor: user.id })" class="mx-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link></div>
                                <div><button @click="deleteInstractor(user.id)" class="mx-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button></div>
                                </div>
                            </div>


                            <div class="lg:w-1/2 md:w-full lg:ml-5 md:mx-2">
                                <h2 class="text-2xl subtitle">担当クラス一覧</h2>

                                    <table class="w-full stshow">
                                        <tr>
                                            <th><label>担当クラス</label></th>
                                            <th><label>クラスカテゴリ</label></th>
                                            <th><label>更新日時</label></th>
                                            <th><label>登録日時</label></th>
                                        </tr>
                                        <tr v-for="group in user.groups" :key="user.id">
                                            <td class="text-center">
                                                <Link as="button" :href="route('groups.show',{ group: group.id })" class="text-gray-500 hover:text-white hover:bg-gray-500 py-2 px-2">{{ group.name }}クラス</Link> 
                                            </td>
                                            <td class="text-center">
                                                <span>
                                                        <span v-if="group.group_category === 0 " class="bg-red-100 px-1 py-1 rounded-md" >ADV</span>
                                                        <span v-if="group.group_category === 1 " class="bg-green-500 px-1 py-1 rounded-md" >Reg</span>
                                                        <span v-if="group.group_category === 2 " class="bg-green-300 px-1 py-1 rounded-md" >Pre</span>
                                                        <span v-if="group.group_category === 3 " class="bg-yellow-100 px-1 py-1 rounded-md" >Jr.</span>
                                                        <span v-if="group.group_category === 4 " class="bg-pink-100 px-1 py-1 rounded-md" >Kinder</span>
                                                        <span v-if="group.group_category === 5 " class="bg-blue-100 px-1 py-1 rounded-md" >Short</span>
                                                        <span v-if="group.group_category === 6 " class="bg-gray-100 px-1 py-1 rounded-md" >Studio</span>
                                                        <span v-if="group.group_category === 7 ">その他</span><br>
                                                </span>
                                            </td> 
                                            <td class="text-center">{{ dayjs(group.updated_at).format('YYYY-MM-DD') }}</td>
                                            <td class="text-center">{{ dayjs(group.created_at).format('YYYY-MM-DD') }}</td>
                                        </tr>
                                    </table>
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
