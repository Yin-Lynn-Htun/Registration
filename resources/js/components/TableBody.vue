<template>
    <tbody>
        <TableRow :students="students" />
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
