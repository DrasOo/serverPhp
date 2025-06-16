jQuery(document).ready(function ($) {
    $('#users-table').DataTable({
        ajax: '/api/users.php',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'first_name' },
            { data: 'city' },
            { data: 'job' }
        ]
    });
});