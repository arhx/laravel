<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @if($user->exists)
                        @lang('Editing user :name',['name' => $user->name])
                    @else
                        @lang('Creating user')
                    @endif
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin-user-save') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">@lang('Name')</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">@lang('Email')</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">
                            @if($user->exists)
                                @lang('New password')
                            @else
                                @lang('Password')
                            @endif
                        </label>
                        <input type="password" class="form-control" name="password" id="password" autocomplete="new-password" {{ attr_required(!$user->exists) }}>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role_id">@lang('Role')</label>
                        <select name="role_id" id="role_id" class="form-control" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ attr_selected($role->id == $user->role_id) }}>{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                        <div class="col-md-6 mb-2">
                            <button type="button" class="btn btn-warning btn-block" data-bs-dismiss="modal">@lang('Cancel')</button>
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="submit" class="btn btn-primary btn-block">@lang('Save')</button>
                        </div>


                </div>
            </form>
        </div>
    </div>
</div>
