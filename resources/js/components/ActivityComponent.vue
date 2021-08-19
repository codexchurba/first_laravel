<template>
    <div class="p-2 container mx-auto">
        <section class="container mx-auto p-4">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="grid grid-cols-7 mt-3 px-2">
                    <div class="d-flex align-items-center ml-4 col-span-2">
                        <label for="paginate" class="px-2 mt-2"> Show</label>
                        <select
                            v-model="paginate"
                            class="form-control form-control-sm select"
                            style="width: 70px"
                        >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <label class="px-2 mt-2"> Entries</label>
                    </div>
                    <div class="col-span-2"></div>
                    <div
                        class="d-flex align-items-center ml-4 col-span-3 py-1 px-2"
                    >
                        <input
                            v-model="search"
                            name="search"
                            type="text"
                            class="rounded p-1 w-full bg-white"
                            placeholder="Filter the table"
                        />
                    </div>
                </div>
                <table class="w-full bg-blue-300 border-2 border-blue-300">
                    <tr
                        class="
                                    text-md
                                    font-semibold
                                    tracking-wide
                                    text-left text-gray-900
                                "
                    >
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">
                            Description
                        </th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Due Date</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    <tr
                        v-for="item in activity.data"
                        :key="item.id"
                        class="text-gray-700"
                    >
                        <td class="px-4 py-3 border">
                            {{ item.id }}
                        </td>
                        <td
                            class="
                                        px-4
                                        py-3
                                        text-ms
                                        font-semibold
                                        border
                                    "
                        >
                            {{ item.title }}
                        </td>
                        <td class="px-4 py-3 text-xs border">
                            {{ item.description }}
                        </td>
                        <td class="px-4 py-3 text-sm border text-center">
                            {{ item.status }}
                        </td>
                        <td class="px-4 py-3 text-sm border text-center">
                            {{ item.duedate }}
                        </td>
                        <td class="px-4 py-3 text-sm border">
                            <button
                                class="
                                            bg-blue-400
                                            border-blue-800
                                            px-4
                                            py-1
                                            rounded-xl
                                        "
                            >
                                Edit
                            </button>

                            <button
                                @click="remove(item.id)"
                                class="
                                            bg-red-500
                                            border-red-900
                                            px-4
                                            py-1
                                            rounded-xl
                                        "
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </table>

                <div class="row mt-1">
                    <div class="col-sm-6 offset-5">
                        <pagination
                            :data="activity"
                            @pagination-change-page="getResults"
                        ></pagination>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            activity: {},
            paginate: 10,
            search: ""
        };
    },

    watch: {
        paginate: function() {
            this.getResults();
        },
        search: function() {
            this.getResults();
        }
    },

    methods: {
        getResults(page = 1) {
            axios
                .get(
                    "/api/table?page=" +
                        page +
                        "&paginate=" +
                        this.paginate +
                        "&search=" +
                        this.search
                )
                .then(response => {
                    this.activity = response.data;
                });
        },
        remove(activityId) {
            axios.delete("/api/table/delete/" + activityId).then(response => {
                alert("Activity Deleted Succesfully!");
                this.getResults();
            });
        }
    },

    mounted() {
        this.getResults();
    }
};
</script>
