function showType(type) {
    // Cambio stile bottoni
    document.querySelectorAll('.f-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(type + 'Btn').classList.add('active');

    // Filtro elementi
    const tasks = document.querySelectorAll('.task-element');
    const notes = document.querySelectorAll('.note-element');

    if (type === 'task') {
        tasks.forEach(t => t.style.display = 'block');
        notes.forEach(n => n.style.display = 'none');
    } else {
        tasks.forEach(t => t.style.display = 'none');
        notes.forEach(n => n.style.display = 'block');
    }
}

function deleteItem(btn) {
    if (confirm('Vuoi eliminare questo elemento?')) {
        btn.closest('.diary-card').remove();
        // Qui andrà la chiamata AJAX per il database
    }
}