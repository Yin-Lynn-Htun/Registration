<template>
    <tr
        v-for="student in students"
        :key="student.id"
        class="bg-gray-100 border-b"
    >
        <td class="text-sm px-6 py-4 whitespace-nowrap">
            {{ student.name }}
        </td>
        <td class="text-sm px-6 py-4 whitespace-nowrap">
            {{ student.dob }}
        </td>
        <td class="text-sm px-6 py-4 whitespace-nowrap">
            {{ student.email }}
        </td>
        <td class="text-sm px-6 py-4 whitespace-nowrap">
            {{ student.nrc }}
        </td>
        <td class="text-sm flex flex-wrap gap-2 px-6 py-4 whitespace-nowrap">
            <span
                v-for="course in student.courses"
                :key="course"
                class="text-sm rounded-full border-2 px-2 py-1"
                >{{ course.name }}</span
            >
        </td>
    </tr>
</template>

<script>
export default {
    name: "TableRow",
    props: ["students"],
    data() {
        return {
            name: "Mg Lay",
        };
    },
};
</script>
