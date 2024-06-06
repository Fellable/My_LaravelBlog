import Sortable from 'sortablejs';


document.addEventListener('DOMContentLoaded', function() {
    console.log('12');
    var el = document.querySelector('#sortable-table-crash tbody'); // выбираем тело таблицы
    new Sortable(el, {
        // Опции SortableJS
        animation: 150,
        // handle: '.handle', // Если бы хотели перетаскивать за значок какой-нибудь
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen',
        group: {
            name: 'items', // Имя группы, чтобы можно было перетаскивать между таблицами
            pull: 'clone', // Создавать копию при перетаскивании в другую таблицу
            put: true // Разрешить перетаскивание в эту таблицу
        },
        onUpdate: function(evt) {
            // Обработчик события изменения порядка элементов в таблице
            // Здесь можно отправить запрос на сервер для обновления порядка элементов в базе данных
            console.log('Изменен порядок элементов:', evt.oldIndex, evt.newIndex);
        }
    });
});


