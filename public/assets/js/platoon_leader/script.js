const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    // Activity Logs
    // if (window.location.href === route("platoon_leader.activity_logs.index")) {
    //     const columns = [
    //         {
    //             data: "id",
    //             render(data, type, row) {
    //                 return row.DT_RowIndex;
    //             },
    //         },
    //         { data: "description" },
    //         {
    //             data: "created_at",
    //             render(data) {
    //                 return formatDate(data, "datetime");
    //             },
    //         },
    //         { data: "properties.ip" },
    //     ];
    //     c_index(
    //         $(".activitylog_dt"),
    //         route("platoon_leader.activity_logs.index"),
    //         columns
    //     );
    // }

    /** Start Student Management */

    // Student
    if (window.location.href === route("platoon_leader.students.index")) {
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
                data: "created_at",
                render(data) {
                    return formatDate(data, "full");
                },
            },

            { data: "actions", orderable: false, searchable: false },
        ];
        c_index(
            $(".student_dt"),
            route("platoon_leader.students.index"),
            columns
        );
    }

    /** Attendance Monitoring */
    if (
        window.location.href ===
        route("platoon_leader.attendance-monitoring.index")
    ) {
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
        ];
        c_index(
            $(".attendance_dt"),
            route("platoon_leader.attendance-monitoring.index"),
            columns
        );
    }

    /** Attendance Report */
    if (window.location.href === route("platoon_leader.attendances.index")) {
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
        c_index(
            $(".attendance_dt"),
            route("platoon_leader.attendances.index"),
            columns
        );
    }

    // Student Performance

    if (window.location.href === route("platoon_leader.performances.index")) {
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
            route("platoon_leader.performances.index"),
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

function filterStudentByCourse(course) {
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
            data: "created_at",
            render(data) {
                return formatDate(data, "full");
            },
        },

        { data: "actions", orderable: false, searchable: false },
    ];
    c_index(
        $(".student_dt"),
        route("platoon_leader.students.index", {
            course: course.value,
        }),
        columns,
        null,
        true
    );
}
