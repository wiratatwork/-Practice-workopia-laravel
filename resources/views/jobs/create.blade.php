<form action="/jobs" method="POST">
    @csrf
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" placeholder="Title">
    </div>
    <div>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" placeholder="Description">
    </div>
    <button type="submit">Submit</button>
</form>
