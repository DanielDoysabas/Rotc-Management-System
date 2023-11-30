const token = $('meta[name="csrf-token"]').attr("content");
const baseUrl = window.location.origin;
let pond;

$(() => {
    /** Attendance Report */
    if (window.location.href === route("student.attendances.index")) {
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
            route("student.attendances.index"),
            columns
        );
    }

    // Student Performance

    if (window.location.href === route("student.performances.index")) {
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
            route("student.performances.index"),
            columns
        );
    }
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
