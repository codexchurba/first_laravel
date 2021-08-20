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
                <table class="w-full  border-2 border-blue-300">
                    <tr
                        class=" bg-blue-300
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
                        class="text-gray-700 bg-blue-200"
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
                                @click="edit(item)"
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

                <div
                    class="modal fade"
                    id="editModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="exampleModalCenterTitle"
                    aria-hidden="true"
                >
                    <div
                        class="modal-dialog modal-dialog-centered"
                        role="document"
                    >
                        <div class="modal-content ">
                            <div class="modal-header bg-blue-100">
                                <h5
                                    class="modal-title"
                                    id="exampleModalLongTitle"
                                >
                                    Edit OJT Activity:
                                </h5>
                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-blue-100">
                                <div class="p-2 container mx-auto max-w-full">
                                    <div
                                        class="
                        p-4
                        bg-blue-200
                        border-2 border-blue-300
                        rounded-xl
                        m-auto
                    "
                                    >
                                        <div class="p-2">
                                            <div>
                                                <i
                                                    class="fa fa-tag p-1"
                                                    aria-hidden="true"
                                                ></i>
                                                <Label>Title:</Label>
                                            </div>
                                            <input
                                                v-model="form.title"
                                                name="title"
                                                type="text"
                                                class="rounded p-1 bg-blue-100 w-full"
                                            />
                                        </div>

                                        <div class="p-2">
                                            <div>
                                                <i class="fas fa-file-alt"></i>
                                                <Label>Description:</Label>
                                            </div>
                                            <textarea
                                                v-model="form.description"
                                                name="description"
                                                value=""
                                                class="rounded p-1 bg-blue-100 w-full"
                                            ></textarea>
                                        </div>

                                        <div class="px-2 pb-2">
                                            <div>
                                                <i
                                                    class="fa fa-tasks"
                                                    aria-hidden="true"
                                                ></i>
                                                <Label>Process:</Label>
                                            </div>
                                            <select
                                                v-model="form.status"
                                                name="status"
                                                value=""
                                                class="rounded p-1 bg-blue-100 w-full"
                                            >
                                                <option disabled selected>
                                                </option>
                                                <option value="new">New</option>
                                                <option value="open"
                                                    >Open</option
                                                >
                                                <option value="closed"
                                                    >Closed</option
                                                >
                                            </select>
                                        </div>

                                        <div class="px-2 pb-2">
                                            <div>
                                                <i class="fas fa-stopwatch"></i>
                                                <Label>Due Date:</Label>
                                            </div>
                                            <input
                                                v-model="form.duedate"
                                                name="duedate"
                                                type="date"
                                                class="rounded p-1 bg-blue-100 w-full"
                                            />
                                        </div>

                                        <button
                                            @click="save()"
                                            type="submit"
                                            class="
                                            bg-blue-400
                                            border-blue-800
                                            px-4
                                            py-1
                                            rounded-xl
                                             mx-10
                                            "
                                        >
                                            Update
                                        </button>
                                        <button
                                            type="button"
                                            class="
                                            bg-blue-300
                                            border-blue-600
                                            px-4
                                            py-1
                                            rounded-xl
                                            mx-10
                                            "
                                            data-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            search: "",
            form: {
                title: null,
                description: null,
                status: null,
                duedate: null
            },
            selectedId: null
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
        },
        edit(item) {
            this.form.title = item.title;
            this.form.description = item.description;
            this.form.status = item.status;
            this.form.duedate = item.duedate;
            this.selectedId = item.id;
            $("#editModal").modal("show");
        },
        save() {
            const vm = this;
            axios
                .put(`activities/${vm.selectedId}`, {
                    title: this.form.title,
                    description: this.form.description,
                    status: this.form.status,
                    duedate: this.form.duedate
                })
                .then(function(response) {
                    alert("Activity has been sucessfully updated");
                    $("#editModal").modal("hide");
                    vm.getResults();
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    },

    mounted() {
        this.getResults();
    }
};
</script>
