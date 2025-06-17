jQuery(document).ready(function ($) {
    $('#users-table').DataTable({
        ajax: '/api/users.php',
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/fr-FR.json',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'first_name' },
            { data: 'city' },
            { data: 'job' }
        ]
    });
});