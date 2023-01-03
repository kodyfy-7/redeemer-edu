<div class="form-group">
    <input class="form-control @error('username') is-invalid @enderror"  type="text" placeholder="Username" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
<div class="form-group">
    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required>
    @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
</div>
<div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Login</button>
</div>