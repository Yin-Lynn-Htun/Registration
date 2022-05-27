<template>
    <tbody>
        <TableRow v-if="students.length" :students="students" />
        <tr v-if="!students.length" class="bg-gray-100 border-b">
            <td colspan="100%">Register a student to appear in the table.</td>
        </tr>
    </tbody>
</template>

<script>
import TableRow from "./tableRow.vue";

export default {
    name: "TableBody",
    props: ["students"],
    components: {
        TableRow,
    },
};
</script>
