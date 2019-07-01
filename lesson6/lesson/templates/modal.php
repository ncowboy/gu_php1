<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/engine/modal.php" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить нового студента</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
<!--                ------->

                <input name="name" type="text" class="m-3 form-control" placeholder="Имя пользователя" >
                <input name="age" type="text" class="m-3 form-control" placeholder="Возраст студента">
                <input name="lang" type="text" class="m-3 form-control" placeholder="Изучаемый язык" a>

<!--                ------>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-primary " type="submit">Добавить студента</button>

            </form>

            </div>
        </div>
    </div>
</div>