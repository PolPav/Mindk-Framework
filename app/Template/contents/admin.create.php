<div class="create-content">
    <div class="row">
        <div class="col-lg-12 create-admin">
            <ul>
                <h1>Create new user</h1>
                <a href="/admin"><button type="button" class="btn btn-info btn-c">Back to admin-panel</button></a>
                <form class="form-inline form-admin" action="/admin/create" method="post">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="text" name="login" class="form-control" id="exampleInputEmail3" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                    </div>
                    <div class="checkbox admin-checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default admin-button">Create</button>
                </form>
            </ul>
        </div>
    </div>
</div>