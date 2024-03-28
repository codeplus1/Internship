<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter your Name <span class="text-danger">*</span></label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="eg. Saroj Yadav">
                    </div>

                    <div class="form-group">
                        <label for="email">Enter your Email <span class="text-danger">*</span></label>
                        <input id="email" class="form-control" type="text" name="email" placeholder="eg. vipcoding.np@gmail.com">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="usertype">Select Your Role</label>
                            <select id="usertype" class="form-control" name="usertype">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">Save Record</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
