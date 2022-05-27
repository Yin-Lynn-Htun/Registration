<template>
    <div class="w-full h-screen grid items-center px-10 py-10">
        <div class="mx-auto">
            <student-list-table />
        </div>
    </div>
</template>

<script>
import studentListTable from "./studentListTable";
export default {
    components: {
        studentListTable,
    },
};
</script>
