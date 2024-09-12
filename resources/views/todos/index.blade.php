<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background-image: url('https://i.pinimg.com/736x/7c/d9/73/7cd97363260624caad604df35f320f25.jpg') ;
            background-repeat: no-repeat;
            background-attachment: fixed;
  background-size: 100% 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex: 20rem;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            border-radius: 1rem;
            margin-bottom: 1rem;
        }

        button[name= "delete" ]{
            background-color: red;
        }
        button[name="un-co"]{
            background-color:green;
        }
        

        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: blue;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: rgba(255,0,0,0.3);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        span {
            flex: 10rem;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    /* display: flex; */
    justify-content: space-between;
    border-radius: 1rem;
    margin-bottom: 2rem;
    flex: 1 1 0%;





    display: inline-block;
  width: 10em;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;


            flex: 10rem;
    border-radius: 30px;
    display: flex;
    border-radius: 1rem;

    margin-bottom: 20px;

        }
        .completed {
            text-decoration: line-through;
            color: gray;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: space-between;
            padding: 1rem;
            border-radius: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List by : Christina Maher</h1>
        <form action="/todos" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Add a new task" required>
            <button type="submit">Add</button>
        </form>
        <ul id="todo-list">
            @foreach ($todos as $index => $todo)
                <li class="{{ $todo['completed'] ? 'completed' : '' }}">
                    <span>{{ $todo['task'] }}</span>
                    <div class="action-buttons">
                        <form action="/todos/change/{{ $index }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" name="un-co">{{ $todo['completed'] ? 'Undo' : 'Complete' }}</button>
                        </form>
                        <form action="/todos/{{ $index }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <script>
        document.querySelectorAll('form[action^="/todos/"]').forEach(form => {
            form.addEventListener('submit', function (event) {
                if (form.method === 'DELETE') {
                    const confirmDelete = confirm("Are you sure you want to delete this task?");
                    if (!confirmDelete) {
                        event.preventDefault(); 
                    }
                }
            });
        });
    </script>
</body>
</html>
