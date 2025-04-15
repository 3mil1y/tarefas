document.addEventListener('DOMContentLoaded', function() {
    // Animação para remoção de tarefas
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const taskItem = this.closest('.task-item');
            taskItem.style.transition = 'opacity 0.3s ease-out';
            taskItem.style.opacity = '0';
            
            setTimeout(() => {
                this.closest('form').submit();
            }, 300);
        });
    });

    // Animação suave ao carregar tarefas
    const taskItems = document.querySelectorAll('.task-item');
    taskItems.forEach((item, index) => {
        item.style.opacity = '0';
        setTimeout(() => {
            item.style.transition = 'opacity 0.3s ease-in';
            item.style.opacity = '1';
        }, 100 * index);
    });
});