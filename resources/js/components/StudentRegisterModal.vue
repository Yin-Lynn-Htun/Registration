<template>
    <div class="h-screen w-full grid place-items-center fixed top-0 left-0">
        <div class="bg-white p-5 rounded-md z-10 relative">
            <div
                @click="closeModal"
                class="cursor-pointer absolute w-10 h-10 bg-black top-3 right-3 text-white grid place-items-center rounded-full font-bold text-lg"
            >
                x
            </div>
            <h1 class="text-2xl font-bold text-center">Register Form</h1>
            <StudentRegisterForm
                v-on:fetchAgain="$emit('fetchAgain')"
                :closeModal="closeModal"
            />
        </div>
        <div
            class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-90"
            @click="closeModal"
        ></div>
    </div>
</template>

<script>
import StudentRegisterForm from "./StudentRegisterForm.vue";
export default {
    name: "StudentRegisterModal",
    props: ["closeModal"],
    components: {
        StudentRegisterForm,
    },
};
</script>
