<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/vue.js')}}"></script>
    <title>Document</title>
</head>
<body>
<div class="content">
    <input v-model="newTodo" v-on:keyup.enter="addTodo">
    <ul>
        <li v-for="todo in todos">
            <span>@{{ todo.text }}</span>
            <button v-on:click="removeTodo($index)">X</button>
        </li>
    </ul>
</div>
</body>
<script>
    new Vue({
        el: '.content',
        data: {
            newTodo: '',
            todos: [
                { text: '新增todos' }
            ]
        },
        methods: {
            addTodo: function () {
                var text = this.newTodo.trim()
                if (text) {
                    this.todos.push({ text: text })
                    this.newTodo = ''
                }
            },
            removeTodo: function (index) {
                this.todos.splice(index, 1)
            }
        }
    })
</script>
</html>