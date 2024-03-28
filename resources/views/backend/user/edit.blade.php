<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-primary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Enter your Name <span class="text-danger">*</span></label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Enter your Email <span class="text-danger">*</span></label>
                        <input id="email" class="form-control" type="text" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Enter New Password</label>
                        <input id="password" class="form-control" type="password" name="password" value="{{ $user->password }}">
                    </div>
                    <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">update Record</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
