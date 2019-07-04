<form method="get">
    <label for="exampleFormControlSelect1">Введите запрос:</label>
    <input name="search" class="m-3 form-control" type="text" placeholder="Search" value="<?=$search?>">

    <label for="exampleFormControlSelect1">Где искать:</label>
    <select name = "searchBy[]" class="ml-3 mb-3 form-control" multiple>
        <option value="id">ID</option>
        <option value="name">Name</option>
        <option value="age">Age</option>
        <option value="lang">Lang</option>
    </select>

    <label for="exampleFormControlSelect1">Сортировать по:</label>
    <select name = "sort" class="ml-3 mb-3 form-control" >
        <option value="1">ID UP</option>
        <option value="2">ID DOWN</option>
        <option value="3">Name UP</option>
        <option value="4">Name DOWN</option>
        <option value="5">Age UP</option>
        <option value="6">Age DOWN</option>
    </select>

    <button type="submit" class="btn btn-primary">Поиск!</button>
</form>