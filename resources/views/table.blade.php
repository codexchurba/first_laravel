<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>First Laravel Mini Project</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <script src="https://use.fontawesome.com/b494c279b5.js"></script>
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
        />
        <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
        ></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap"
            rel="stylesheet"
        />
        <script
            src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit"
            async
            defer
        ></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"
        />

        <script
            type="text/javascript"
            charset="utf8"
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"
        ></script>
    </head>
    <body class="bg-blue-100">
        <div id="app">
            <app>
                <div class="p-2 container mx-auto mt-4">
                    <a
                        class="mx-auto bg-blue-400 border-blue-800 px-4 py-1 rounded-xl"
                        href="/"
                    >
                        Back
                    </a>
                </div>

                @if (session()->has('success'))
                <div class="p-4 container mx-auto max-w-full">
                    <div
                        x-data="{show:true}"
                        x-init="setTimeout(()=> show = false, 4000)"
                        x-show="show"
                        class="
                    bg-blue-500
                    border-2 border-blue-900
                    text-white
                    py-2
                    px-4
                    rounded-xl
                    text-base text-center
                    m-auto
                "
                    >
                        <p>{{ session("success") }}</p>
                    </div>
                </div>
                @endif

                <form
                    method="POST"
                    action="/create"
                    class="
                container
                mx-auto
                flex flex-col
                md:flex-row
                :justify-between
                justify-center
                max-w-md
            "
                >
                    @csrf
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
                            <p class="text-gray-800 px-2 text-left">
                                Enter your OJT Activity for today:
                            </p>
                            <div class="p-2">
                                <div>
                                    <i
                                        class="fa fa-tag p-1"
                                        aria-hidden="true"
                                    ></i>
                                    <Label>Title:</Label>
                                </div>
                                <input
                                    name="title"
                                    type="text"
                                    value="{{ old('title') }}"
                                    class="rounded p-1 bg-blue-100 w-full"
                                    placeholder="Enter Activity Title"
                                />
                                @error('title')
                                <p class="text-red-700 text-xs mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="p-2">
                                <div>
                                    <i class="fas fa-file-alt"></i>
                                    <Label>Description:</Label>
                                </div>
                                <textarea
                                    name="description"
                                    value="{{ old('description') }}"
                                    class="rounded p-1 bg-blue-100 w-full"
                                    placeholder="Enter Activity Description"
                                ></textarea>
                                @error('description')
                                <p class="text-red-700 text-xs mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
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
                                    name="status"
                                    id=""
                                    class="rounded p-1 bg-blue-100 w-full"
                                >
                                    <option disabled selected>Status</option>
                                    <option value="New">New</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                </select>
                                @error('status')
                                <p class="text-red-700 text-xs mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="px-2 pb-2">
                                <div>
                                    <i class="fas fa-stopwatch"></i>
                                    <Label>Due Date:</Label>
                                </div>
                                <input
                                    name="duedate"
                                    value="{{ old('duedate') }}"
                                    type="date"
                                    class="rounded p-1 bg-blue-100 w-full"
                                />
                                @error('duedate')
                                <p class="text-red-700 text-xs mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <button
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
                                Add
                            </button>
                        </div>
                    </div>
                </form>

                <div class="p-2 container mx-auto">
                    <section class="container mx-auto p-4">
                        <div
                            class="w-full mb-8 overflow-hidden rounded-lg shadow-lg"
                        >
                            <table
                                class="w-full bg-blue-300 border-2 border-blue-300"
                            >
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
                                        <div class="hidden sm:block">
                                            <th class="px-4 py-3">Title</th>
                                            <th class="px-4 py-3">
                                                Description
                                            </th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3">Due Date</th>
                                        </div>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-blue-200">
                                    @foreach ($activity as $value)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 border">
                                            {{$value->id}}
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
                                            {{$value->title}}
                                        </td>
                                        <td class="px-4 py-3 text-xs border">
                                            {{$value->description}}
                                        </td>
                                        <td
                                            class="px-4 py-3 text-sm border text-center"
                                        >
                                            {{$value->status}}
                                        </td>
                                        <td
                                            class="px-4 py-3 text-sm border text-center"
                                        >
                                            {{$value->duedate}}
                                        </td>
                                        <td class="px-4 py-3 text-sm border">
                                            <a
                                                href="{{route('activities.edit', $value->id)}}"
                                                class="
                                            bg-blue-400
                                            border-blue-800
                                            px-4
                                            py-1
                                            rounded-xl
                                        "
                                                >Edit</a
                                            >

                                            <a
                                                href="{{route('activities.destroy', $value->id)}}"
                                                class="
                                            bg-red-500
                                            border-red-900
                                            px-4
                                            py-1
                                            rounded-xl
                                        "
                                                >Delete</a
                                            >
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="p-2 container mx-auto max-w-full">
                                {!! $activity->links() !!}
                            </div>
                        </div>
                    </section>
                </div>
            </app>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
