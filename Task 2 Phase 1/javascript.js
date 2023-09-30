appTodoList = document.querySelector('.app-todo__list')
appNewForm = document.querySelector('.app-new__form')
appNewSubmit = document.querySelector('.app-new__submit')

function addTasks(e) {
    e.preventDefault();
    taskText = appNewForm.new_task.value.trim()
    html = `
        <li class="app-todo__item">
            <span class="app-todo__icon-tick material-icons">check_box_outline_blank</span>
            <span class="app-todo__text app-todo__task-text">${taskText}</span>
            <span class="app-todo__icon-delete material-icons">delete_outline</span>
        </li>
    `
    if (taskText.length > 0) {
        appTodoList.innerHTML += html
        appNewForm.reset()
    }
}
function deleteTasks(e) {
    if (e.target.className.includes('app-todo__icon-delete')) {
        e.target.parentElement.remove()
    }
}
function markDone(e) {
    if (e.target.classList.contains('app-todo__item')) {
        appTodoItem = e.target
    } else {
        appTodoItem = e.target.parentElement
    }
    appTodoItem.classList.toggle('done')
    if (appTodoItem.classList.contains('done')) {
        appTodoItem.querySelector('.app-todo__icon-tick').innerHTML = 'check_box'
        appTodoItem.querySelector('.app-todo__text').classList.add('crossed-out')
    } else {
        appTodoItem.querySelector('.app-todo__icon-tick').innerHTML = 'check_box_outline_blank'
        appTodoItem.querySelector('.app-todo__text').classList.remove('crossed-out')
    }
}

appTodoList.addEventListener('click', deleteTasks)
appTodoList.addEventListener('click', markDone)
appNewForm.addEventListener('submit', addTasks)
appNewSubmit.addEventListener('click', addTasks)
