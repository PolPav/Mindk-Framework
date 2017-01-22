<div class="content">
    <div class="row">
        <div class="col-lg-8 admin">
            <ul>
                <h1><?= self::$error ?></h1>
                <h1>Enter to admin panel</h1>
                <form class="form-inline form-admin" action="/login" method="post">
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
                    <button type="submit" class="btn btn-default admin-button">Sign in</button>
                </form>
            </ul>
        </div>
    </div>
</div>