import './bootstrap';

$(document).ready(function() {
    $('.display').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/article',
            type: 'GET'
        },
        columns: [
            { data: 'article_title', name: 'article_title' },
            { data: 'article_content', name: 'article_content' },
            { data: 'article_image', name: 'article_image' },
            // Add more columns as needed
        ]
    });
});