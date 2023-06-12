<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    student:Object,
    apstudent:Object,
    studentIds:Object,
    group:Object,
    groupStudents:Object
})

//console.log(props.studentStatus);

// 家族割判定
import { computed } from 'vue';

const family_content = props.student.family_id
  ? props.studentIds[props.student.family_id - 1]
  : { status: "---",name:"---" };

const familyDiscount = computed(() => {
  return family_content.status === 0 ? '家族割' : '---';
});


const deleteStudent = id => {
    Inertia.delete(route('students.destroy', { student: id}),{
        onBefore: () => confirm('本当に削除しますか？')
    })
}

console.log(family_content);

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
                        <div class="container px-1 py-8 mx-auto">

                            <table class="w-full stshow txleft mb-10">
                                <tr>
                                    <th><label for="name" class="whitespace-nowrap">所属クラス</label></th>
                                    <td>
                                        
                                        <table class="w-full divide-y divide-gray-200 mb-4">
                                        <div id="group">
                                            <tr>
                                                <td class="w-1/6 font-bold txcenter">クラス名</td>
                                                <td class="w-1/6 font-bold txcenter">カテゴリ</td>
                                                <td class="w-1/6 font-bold txcenter">支払方法</td>
                                                <td class="w-1/6 font-bold txcenter">支払区分</td>
                                                <td class="w-1/6 font-bold txcenter">割引</td>
                                                <td class="w-1/6 font-bold txcenter">月謝金額</td>
                                            </tr>
                                            <tr v-for="groupStudent in groupStudents" :key="groupStudent.id">
                                                <td class="txcenter">
                                                    <Link as="button" :href="route('groups.show',{ group: groupStudent.id })" class="text-gray-500 hover:text-indigo-600 py-2">{{ groupStudent.name }}クラス</Link>
                                                </td>
                                                <td class="txcenter">
                                                <span v-if="groupStudent.groupcategory_id === 1 " class="bg-red-100 px-1 py-1 rounded-md" >ADV</span>
                                                <span v-if="groupStudent.groupcategory_id === 2 " class="bg-green-500 px-1 py-1 rounded-md" >Reg</span>
                                                <span v-if="groupStudent.groupcategory_id === 3 " class="bg-green-300 px-1 py-1 rounded-md" >Pre</span>
                                                <span v-if="groupStudent.groupcategory_id === 4 " class="bg-yellow-100 px-1 py-1 rounded-md" >Jr.</span>
                                                <span v-if="groupStudent.groupcategory_id === 5 " class="bg-pink-100 px-1 py-1 rounded-md" >Kinder</span>
                                                <span v-if="groupStudent.groupcategory_id === 6 " class="bg-blue-100 px-1 py-1 rounded-md" >Short</span>
                                                <span v-if="groupStudent.groupcategory_id === 7 " class="bg-gray-100 px-1 py-1 rounded-md" >Studio</span>
                                                </td>
                                                <td class="txcenter">
                                                <span v-if="groupStudent.pivot.payment === 0 " class="bg-gray-100 px-1 py-1 rounded-md" >現金</span>
                                                <span v-if="groupStudent.pivot.payment === 1 " class="bg-pink-100 px-1 py-1 rounded-md" >PayPay</span>
                                                </td>
                                                <td class="txcenter">
                                                <span v-if="groupStudent.pivot.amount_category === 0 " class="bg-gray-100 px-1 py-1 rounded-md" >月謝</span>
                                                <span v-if="groupStudent.pivot.amount_category === 1 " class="bg-gray-100 px-1 py-1 rounded-md" >オールパス</span>
                                                <span v-if="groupStudent.pivot.amount_category === 2 " class="bg-gray-100 px-1 py-1 rounded-md" >スタンプ</span>
                                                </td>
                                                <td class="txcenter">
                                                    {{ familyDiscount }}
                                                </td>
                                                <td class="txcenter">
                                                <span v-if="groupStudent.groupcategory_id === 7">---</span>
                                                <span v-else-if="groupStudent.pivot.amount_category === 1 ">¥10500</span><!--Allpass-->
                                                <span v-else-if="groupStudent.pivot.amount_category === 2 ">¥8400</span><!--スタンプ-->
                                                <span v-else-if="groupStudent.groupcategory_id === 1 ">¥10500</span><!--ADV-->
                                                <span v-else-if="groupStudent.groupcategory_id === 2 && family_content.status === 0 ">¥7100</span><!--Regular-->
                                                <span v-else-if="groupStudent.groupcategory_id === 2 ">¥7400</span><!--Regular-->
                                                <span v-else-if="groupStudent.groupcategory_id === 3 && family_content.status === 0 ">¥6200</span>
                                                <span v-else-if="groupStudent.groupcategory_id === 3 ">¥6500</span><!--Pre-->
                                                <span v-else-if="groupStudent.groupcategory_id === 4 && family_content.status === 0 ">¥5200</span>
                                                <span v-else-if="groupStudent.groupcategory_id === 5 && family_content.status === 0 ">¥5200</span>
                                                <span v-else-if="groupStudent.groupcategory_id === 6 && family_content.status === 0 ">¥5200</span>
                                                <span v-else-if="groupStudent.groupcategory_id === 4 || groupStudent.groupcategory_id === 5 || groupStudent.groupcategory_id === 6 ">¥5500</span>
                                            </td>
                                            </tr>
                                        </div>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <div class="w-full mx-auto lg:flex md:flex-row justify-center">
                            <div class="lg:w-1/2 md:w-full">
                            <h2 class="text-2xl subtitle">生徒詳細 ({{ student.name }})</h2>

                            <table class="w-full stshow txleft">
                                <tr>
                                    <th><label for="name">ID</label></th>
                                    <td><div id="name">{{ student.id }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="kana">カナ</label></th>
                                    <td><div id="kana">{{ student.kana }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="email">メール</label></th>
                                    <td><div id="email">{{ student.email }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="zip_code">郵便番号</label></th>
                                    <td><div id="zip_code">{{ student.zip_code }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="address1">住所1</label></th>
                                    <td><div id="address1">{{ student.address1 }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="address2">住所2</label></th>
                                    <td><div id="address2">{{ student.address2 }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="tel">電話番号</label></th>
                                    <td><div id="tel">{{ student.tel }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="gender">性別</label></th>
                                    <td>
                                        <div id="gender">
                                            <span v-if="student.gender === 0 ">女</span>
                                            <span v-if="student.gender === 1 ">男</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="birthday">誕生日</label></th>
                                    <td><div id="birthday">{{ student.birthday }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="joindate">入会日</label></th>
                                    <td><div id="joindate">{{ student.joindate }}</div></td>
                                </tr>
                                <tr>
                                    <th><label for="status">ステータス</label></th>
                                    <td>
                                        <div id="status">
                                            <span class="bg-blue-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 0 ">在籍</span>
                                            <span class="bg-red-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 1 ">休会</span>
                                            <span class="bg-gray-500 text-white px-2 py-1 rounded-md"  v-if="student.status === 2 ">退会</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="familyId">家族ID / 氏名</label></th>
                                    <td>
                                        <div id="family_id">
                                            {{ student.family_id }} ( {{ family_content.name }}/ 
                                            <span class="bg-blue-500 text-sm text-white px-1 py-1 rounded-md"  v-if="family_content.status === 0 ">在籍</span>
                                            <span class="bg-red-500 text-sm text-white px-1 py-1 rounded-md"  v-if="family_content.status === 1 ">休会</span>
                                            <span class="bg-gray-500 text-sm text-white px-1 py-1 rounded-md"  v-if="family_content.status === 2 ">退会</span>
                                            )
                                        </div>
                                    </td>
                                    </tr>
                                <tr>
                                    <th><label for="discount">割引区分</label></th>
                                    <td>
                                    <div id="discount">
                                        {{ familyDiscount }}
                                    </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="my-10 p-2 w-full flex justify-center">
                                <div>
                                <Link as="button" :href="route('students.edit', { student: student.id })" class="mx-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</Link>
                                </div>
                                <div>
                                <button @click="deleteStudent(student.id)" class="mx-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</button>
                                </div>
                            </div>
                            </div>

                                <div class="lg:w-1/2 md:w-full lg:ml-5 md:mx-2">
                                <h2 class="text-2xl subtitle">AP出席クラス</h2>

                                <table class="w-full stshow">
                                    <tr>
                                        <th>クラス名</th>
                                        <th>クラスカテゴリ</th>
                                    </tr>
                                    <tr v-for="apgroup in apstudent.apgroups" :key="apstudent.id">
                                        <td><Link as="button" :href="route('groups.show',{ group: apgroup.id })" class="text-gray-500 hover:text-indigo-600 py-2">{{ apgroup.name }}クラス</Link></td>
                                        <td><span v-if="apgroup.group_category === 0 " class="bg-red-100 px-1 py-1 rounded-md" >ADV</span>
                                            <span v-if="apgroup.group_category === 1 " class="bg-green-500 px-1 py-1 rounded-md" >Reg</span>
                                            <span v-if="apgroup.group_category === 2 " class="bg-green-300 px-1 py-1 rounded-md" >Pre</span>
                                            <span v-if="apgroup.group_category === 3 " class="bg-yellow-100 px-1 py-1 rounded-md" >Jr.</span>
                                            <span v-if="apgroup.group_category === 4 " class="bg-pink-100 px-1 py-1 rounded-md" >Kinder</span>
                                            <span v-if="apgroup.group_category === 5 " class="bg-blue-100 px-1 py-1 rounded-md" >Short</span>
                                            <span v-if="apgroup.group_category === 6 " class="bg-gray-100 px-1 py-1 rounded-md" >Studio</span>
                                            <span v-if="apgroup.group_category === 7 ">その他</span>
                                        </td>
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