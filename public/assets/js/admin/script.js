const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    // Activity Logs
    if (window.location.href === route("admin.activity_logs.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "description" },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "datetime");
                },
            },
            { data: "properties.ip" },
        ];
        c_index(
            $(".activitylog_dt"),
            route("admin.activity_logs.index"),
            columns
        );
    }

    //Category;
    if (window.location.href === route("admin.categories.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "name" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".category_dt"), route("admin.categories.index"), columns);
    }

    // Patient
    if (window.location.href === route("admin.patients.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "first_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },

            {
                data: "middle_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "last_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "gender",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "full");
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".patient_dt"), route("admin.patients.index"), columns);
    }

    //User;
    if (window.location.href === route("admin.users.index")) {
        const columns = [
            { data: "id" },
            {
                data: "avatar",
                render(data) {
                    return handleNullAvatar(data);
                },
            },
            { data: "name" },
            {
                data: "email_verified_at",
                render(data) {
                    return isVerified(data);
                },
            },
            {
                data: "role",
                render(data) {
                    return `<span class='badge badge-primary'>${data}</span>`;
                },
            },
            {
                data: "is_activated",
                render(data) {
                    return isActivated(data);
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data.date, "full");
                },
            },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".user_dt"), route("admin.users.index"), columns);
    }

    /** Start Student Management */

    //Platoon;
    if (window.location.href === route("admin.platoons.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "name" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".platoon_dt"), route("admin.platoons.index"), columns);
    }

    // Department
    if (window.location.href === route("admin.departments.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "name" },
            { data: "abbreviation" },
            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".department_dt"), route("admin.departments.index"), columns);
    }

    // Course
    if (window.location.href === route("admin.courses.index")) {
        const column_data = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "name" },
            { data: "abbreviation" },
            {
                data: "department",
                render(data) {
                    return `<span class='text-capitalize'>${data.name}</span>`;
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".course_dt"), route("admin.courses.index"), column_data);
    }

    // Student
    if (window.location.href === route("admin.students.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row, meta) {
                    return row.DT_RowIndex;
                },
            },
            {
                data: "student_id",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "first_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },

            {
                data: "middle_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "last_name",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "sex",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "course",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "platoon",
                render(data) {
                    return `<span class='text-capitalize'>${data}</span>`;
                },
            },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "full");
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index($(".student_dt"), route("admin.students.index"), columns);
    }

    /** Attendance Report */
    if (window.location.href === route("admin.attendances.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "student_id" },
            { data: "student" },
            { data: "schedule" },
            {
                data: "date_time_in",
                render(data) {
                    return data ?? "";
                },
            },
            {
                data: "date_time_out",
                render(data) {
                    return data ?? "";
                },
            },
            { data: "status" },
        ];
        c_index($(".attendance_dt"), route("admin.attendances.index"), columns);
    }

    // Student Performance

    if (window.location.href === route("admin.performances.index")) {
        const columns = [
            {
                data: "id",
                render(data, type, row) {
                    return row.DT_RowIndex;
                },
            },
            { data: "student_id" },
            { data: "student" },
            { data: "course" },
            { data: "type" },
            { data: "points" },
            { data: "remark" },
            {
                data: "created_at",
                render(data) {
                    return formatDate(data, "datetime");
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".performance_dt"),
            route("admin.performances.index"),
            columns
        );
    }

    /** End Student Management */
});

//=========================================================
// Custom Functions()

document.addEventListener("DOMContentLoaded", function (event) {
    // initiate global glightbox

    setTimeout(() => {
        GLightbox({
            selector: ".glightbox",
        });
    }, 1000);
});

function filterStudentByPlatoon(platoon) {
    const columns = [
        {
            data: "id",
            render(data, type, row, meta) {
                return row.DT_RowIndex;
            },
        },
        {
            data: "student_id",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "first_name",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },

        {
            data: "middle_name",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "last_name",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "sex",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "course",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "platoon",
            render(data) {
                return `<span class='text-capitalize'>${data}</span>`;
            },
        },
        {
            data: "created_at",
            render(data) {
                return formatDate(data, "full");
            },
        },

        { data: "actions", orderable: false, searchable: false },
    ];
    c_index(
        $(".student_dt"),
        route("admin.students.index", {
            platoon: platoon.value,
        }),
        columns,
        null,
        true
    );
}
