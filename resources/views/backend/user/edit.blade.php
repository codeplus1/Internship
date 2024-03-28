<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-primary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store',$user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter your Name <span class="text-danger">*</span></label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Enter your Email <span class="text-danger">*</span></label>
                        <input id="email" class="form-control" type="text" name="email" {{ $user->email }}>
                    </div>
                    <div class="form-group">
                        <label for="usertype">Choose User Type <span class="text-danger">*</span></label>
                        <input id="usertype" class="form-control" type="text" name="usertype" placeholder="eg. Saroj Yadav">
                    </div>


                    <button type="submit" class="btn btn-success btn-sm">update Record</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
