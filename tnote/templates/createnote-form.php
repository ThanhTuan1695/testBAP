<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Create New Notes</h3>
            <form method="POST" action="javascript:void(0)" id="formCreateNote">
                <div class="form-group">
                    <label for="user_signin">Title</label>
                    <input type="text" class="form-control" id="title_create_note">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Content</label>
                    <textarea class="form-control" id="body_create_note" rows="5"></textarea>
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Back
                </a>
                <input type="submit" class="btn btn-primary" id="submit_create_note" value="Create Notes" />
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>