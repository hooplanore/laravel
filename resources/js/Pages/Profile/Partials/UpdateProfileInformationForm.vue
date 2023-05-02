<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    kana: user.kana,
    tel: user.tel,
    gender: user.gender,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">User Profile Information</h2>

        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="name" value="氏名" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="kana" value="フリガナ" />

                <TextInput
                    id="kana"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.kana"
                    autocomplete="kana"
                />

                <InputError class="mt-2" :message="form.errors.kana" />
            </div>

            <div>
                <InputLabel for="tel" value="電話番号" />

                <TextInput
                    id="tel"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.tel"
                    autocomplete="tel"
                />

                <InputError class="mt-2" :message="form.errors.tel" />
            </div>

            <div>
                <InputLabel for="gender" value="性別" />

                
                <input type="radio" id="gender" name="gender" v-model="form.gender" value="0">
                                    <label for="gender0" class="ml-2 mr-4">女</label>
                                    <input type="radio" id="gender" name="gender" v-model="form.gender" value="1">
                                    <label for="gender1" class="ml-2 mr-4">男</label>
                                    <input type="radio" id="gender" name="gender" v-model="form.gender" value="2">
                                    <label for="gender2" class="ml-2 mr-4">他</label>

                <InputError class="mt-2" :message="form.errors.gender" />
            </div>

            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
