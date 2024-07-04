import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', function() {
    let el = document.querySelector('#sortable-table-crash tbody');
    let sortable = new Sortable(el, {
        animation: 150,
        onUpdate: function(evt) {
            let order = [];
            document.querySelectorAll('#sortable-table-crash tbody tr').forEach(function(row, index) {
                let postId = row.cells[0].innerText.trim(); // Получаем id поста из первой ячейки
                order.push({ id: parseInt(postId), position: index });
            });

            fetch('/api/admin/posts/sort', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ order: order })
            })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        }
    });



    document.querySelectorAll('.post-active').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            let postId = this.dataset.id;
            let isActive = this.checked ? 1 : 0;

            fetch(`/api/admin/posts/${postId}/active`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ active: isActive })
            })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
        });
    });
});
