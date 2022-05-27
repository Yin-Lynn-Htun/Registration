<template>
    <div class="flex flex-col">
        <StudentRegisterModal
            v-on:fetchAgain="getStudents()"
            v-if="myModal"
            :closeModal="closeModal"
        />
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 text-black">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <h1 class="text-2xl font-bold text-center mt-10">
                        All Students
                    </h1>
                    <button
                        @click="openModal"
                        class="block cursor-pointer w-max px-4 py-2 bg-[#EBE9E5] font-semibold rounded-md mt-5 mb-10"
                    >
                        Register new student
                    </button>
                    <table class="min-w-full rounded-md overflow-hidden">
                        <TableHeader />
                        <TableBody :students="students" />
                    </table>
                </div>
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
