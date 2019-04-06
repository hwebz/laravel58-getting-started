<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a project</title>
</head>
<body>
    <form action="/projects" method="post">
        @csrf
        <div>
                <input type="text" placeholder="Project title" name="title">
            </div>
            <div>
                <textarea name="description" placeholder="Describe your project"></textarea>
            </div>
            <button type="submit">Create</button>
        </form>
</body>
</html>
