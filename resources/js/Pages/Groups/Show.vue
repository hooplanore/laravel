<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';


defineProps({
    group:Object
})

const deleteStudent = id => {
    Inertia.delete(route('groups.destroy', { group: id}),{
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <Head title="クラス詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">クラス詳細</h2>
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
                                    <label for="group_category" class="leading-7 text-sm text-gray-600">クラスカテゴリ</label>
                                    <div id="group_category" class="w-1/3 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <span v-if="group.group_category === 0 ">ADV</span>
                                        <span v-if="group.group_category === 1 ">Regular</span>
                                        <span v-if="group.group_category === 2 ">Pre</span>
                                        <span v-if="group.group_category === 3 ">Jr.</span>
                                        <span v-if="group.group_category === 4 ">Kinder</span>
                                        <span v-if="group.group_category === 5 ">Short</span>
                                        <span v-if="group.group_category === 6 ">Studio</span>
                                        <span v-if="group.group_category === 7 ">その他</span>
                                    </div>
                                    <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                    <div id="name" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ group.name }}
                                    </div>
                                    <label for="groupdate" class="leading-7 text-sm text-gray-600">曜日</label>
                                    <div id="groupdate" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ group.groupdate }}
                                    </div>
                                    <label for="grouptime" class="leading-7 text-sm text-gray-600">時間</label>
                                    <div id="grouptime" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ group.grouptime }}
                                    </div>
                                    <label for="placename" class="leading-7 text-sm text-gray-600">会場名</label>
                                    <div id="placename" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ group.placename }}
                                    </div>
                                    <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                                    <div id="address" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{ group.address }}
                                    </div>
                                </div>
                                </div>
                                <div class="p-2 w-full">
                                <Link as="button" :href="route('groups.edit', { group: group.id })" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                </div>
                                <div class="mt-20 p-2 w-full">
                                <button @click="deleteStudent(group.id)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
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
