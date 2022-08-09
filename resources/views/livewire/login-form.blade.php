<div>
    <div class="form-body">
        <div>
            <label for="email-field" class="dark:text-white">Email</label>
            <input id="email-field" type="email" wire:model="email" value="{{old('email')}}">
            @error('email')
                <div class="error-message" style="color: red">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="email-field" class="dark:text-white">Password</label>
            <input id="email-field" type="password" wire:model="password" >
            @error('password')
                <div class="error-message" style="color: red">{{$message}}</div>
            @enderror
        </div>
        <button wire:click="login">Sign in</button>
    </div>
</div>
