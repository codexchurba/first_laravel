<template>
    <div class="p-2 container mx-auto">
        <section class="container mx-auto p-4">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="d-flex">
                    <div class="d-flex align-items-center ml-4">
                        <label for="paginate"> Show</label>
                        <select
                            v-model="paginate"
                            class="form-control form-control-sm select"
                        >
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <label for="paginate"> Entries</label>
                    </div>
                </div>
                <table class="w-full bg-blue-300 border-2 border-blue-300">
                    <thead>
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
                    </thead>
                    <tbody class="bg-blue-200">
                        <tr
                            v-for="item in activity"
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
                                    @click="remove(item, index)"
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
                    </tbody>
                </table>
            </div>
        </section>
        <div class="p-2 container mx-auto max-w-full">
            <ul>
                <li v-for="item in activity.data" :key="item.id">
                    {{ item.title }}
                </li>
            </ul>
            <pagination
                :data="activity"
                @pagination-change-page="getResults"
            ></pagination>
        </div>
    </div>
</template>

<script>
export default {
    props: ["activity"],
    data() {
        return {
            activityList: this.activity,
            form: {
                id: null,
                title: null,
                description: null,
                status: null,
                duedate: null
            }
        };
    },

    mounted() {
        this.getResults();
    },
    methods: {
        getResults(page = 1) {
            axios.get("/tabledata?page=" + page).then(response => {
                this.activity = response.data;
            });
        }
    }
};
</script>
