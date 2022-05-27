<template>
    <div class="flex flex-col">
        <StudentRegisterModal
            v-on:fetchAgain="getStudents()"
            v-if="myModal"
            :closeModal="closeModal"
        />
        <div class="sm:-mx-6 lg:-mx-8 text-black max-w-full">
            <div class="py-2 inline-block sm:px-6 lg:px-8">
                <h1
                    class="text-4xl font-bold text-center gradient-text mt-10 mb-4"
                >
                    Enroll Now!
                </h1>
                <img src="/Logo.png" alt="Logo" width="150" class="mx-auto" />
                <button
                    @click="openModal"
                    class="hover:bg-black hover:text-white block cursor-pointer mx-auto w-max px-4 py-2 bg-[#EBE9E5] font-semibold rounded-md mt-5 mb-10"
                >
                    Register new student
                </button>

                <table class="rounded-md overflow-hidden">
                    <TableHeader />
                    <TableBody :students="students" />
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import TableHeader from "./TableHeader";
import TableBody from "./TableBody";
import axios from "axios";
import StudentRegisterModal from "./StudentRegisterModal";

export default {
    name: "studentListTable",
    components: {
        TableHeader,
        TableBody,
        StudentRegisterModal,
    },
    data: function () {
        return {
            myModal: false,
            students: [],
        };
    },
    methods: {
        openModal() {
            this.myModal = true;
        },
        closeModal() {
            this.myModal = false;
        },
        getStudents() {
            axios
                .get("api/students")
                .then((res) => (this.students = res.data))
                .catch((err) => console.log(err));
        },
    },
    created() {
        this.getStudents();
    },
};
</script>
