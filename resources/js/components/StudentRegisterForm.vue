<template>
    <form @submit.prevent class="flex flex-col gap-5 w-80 my-5 z-10">
        <div class="flex flex-col gap-1">
            <label for="name">Name</label>
            <input
                class="input"
                type="text"
                id="name"
                name="name"
                v-model="name"
            />
            <div
                class="input-errors"
                v-for="error of v$.name.$errors"
                :key="error.$uid"
            >
                <div class="error-msg">{{ error.$message }}</div>
            </div>
        </div>
        <div class="flex flex-col gap-1">
            <label for="dob">Date of birth</label>
            <input
                class="input"
                type="date"
                name="dob"
                id="dob"
                v-model="dob"
            />
            <div
                class="input-errors"
                v-for="error of v$.dob.$errors"
                :key="error.$uid"
            >
                <div class="error-msg">{{ error.$message }}</div>
            </div>
        </div>

        <div class="flex flex-col gap-1">
            <label for="email">Email</label>
            <input
                class="input"
                type="text"
                name="email"
                id="email"
                v-model="email"
            />
            <div
                class="input-errors"
                v-for="error of v$.email.$errors"
                :key="error.$uid"
            >
                <div class="error-msg">{{ error.$message }}</div>
            </div>
        </div>

        <div class="flex flex-col gap-1">
            <label for="nrc">NRC</label>
            <input
                class="input"
                type="text"
                name="nrc"
                id="nrc"
                v-model="nrc"
            />
            <div
                class="input-errors"
                v-for="error of v$.nrc.$errors"
                :key="error.$uid"
            >
                <div class="error-msg">{{ error.$message }}</div>
            </div>
        </div>

        <div>
            <p class="text-lg font-bold">Courses</p>
            <div
                class="input-errors"
                v-for="error of v$.course.$errors"
                :key="error.$uid"
            >
                <div class="error-msg">
                    At least one course must be selected.
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="input-item">
                    <input
                        type="checkbox"
                        id="myanmar"
                        v-model="course"
                        value="1"
                    />
                    <label for="myanmar">Myanmar</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="english"
                        v-model="course"
                        value="2"
                    />
                    <label for="english">English</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="math"
                        v-model="course"
                        value="3"
                    />
                    <label for="math"> Maths</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="chemistry"
                        v-model="course"
                        value="4"
                    />
                    <label for="chemistry">Chemistry</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="physics"
                        v-model="course"
                        value="5"
                    />
                    <label for="physics">Physics</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="bio"
                        v-model="course"
                        value="6"
                    />
                    <label for="bio">Bio</label>
                </div>

                <div class="input-item">
                    <input
                        type="checkbox"
                        id="eco"
                        v-model="course"
                        value="7"
                    />
                    <label for="eco">Eco</label>
                </div>
            </div>
        </div>
        <button
            @click="register"
            class="bg-blue-500 text-white px-8 py-3 rounded-md"
        >
            Submit
        </button>
    </form>
</template>

<script>
import axios from "axios";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";

export default {
    name: "StudentRegisterForm",

    setup() {
        return { v$: useVuelidate() };
    },

    data: function () {
        return {
            name: "",
            email: "",
            dob: "",
            nrc: "",
            course: [],
        };
    },
    props: ["closeModal"],
    validations() {
        return {
            name: { required },
            email: { required, email },
            dob: { required },
            nrc: { required },
            course: {
                required,
            },
        };
    },
    methods: {
        async register() {
            const result = await this.v$.$validate();
            if (!result) {
                console.log("first");
                return;
            }

            axios
                .post("api/student/store", {
                    student: {
                        name: this.name,
                        email: this.email,
                        dob: this.dob,
                        nrc: this.nrc,
                        course: this.course,
                    },
                })
                .then((response) => {
                    console.log(response);
                    if (response.status === 201) {
                        this.$emit("fetchAgain");
                        this.closeModal();
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            console.log(this.student);
        },
    },
};
</script>
