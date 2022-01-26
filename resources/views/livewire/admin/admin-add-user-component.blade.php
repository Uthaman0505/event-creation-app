<x-guest-layout>
    <main id="main" class="main-site left-sidebar">

        <div class="container" style="padding: 30px 0;">

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                <x-jet-validation-errors class="mb-4" />
                                <form class="form-stl" action="" name="frm-login" wire:submit.prevent="create_user"
                                    method="POST">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Create User</h3>
                                        <h4 class="form-subtitle">Personal infomation</h4>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Name*</label>
                                        <input type="text" id="frm-reg-lname" name="name" placeholder="Your name*"
                                            required autofocus autocomplete="name" wire:model="name">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input type="email" id="frm-reg-email" name="email" placeholder="Email address" wire:model="email">
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-role">Role*</label>
                                        <select name="role" id="frm-reg-role" wire:model="user_role">
                                            <option value="ADMIN">Admin</option>
                                            <option value="MANAGEMENT">Management</option>
                                            <option value="USER">User</option>
                                        </select>

                                    </fieldset>
                                    {{-- <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Stock</label>
                                        <div class="col-md-4">
                                            <select name="" id="" class="form-control" wire:model="stock_status">
                                                <option value="instock">In-Stock</option>
                                                <option value="outofstock">Out-of-Stock</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Login Information</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input type="password" id="frm-reg-pass" name="password" placeholder="Password"
                                            required autocomplete="new-password" wire:model="password">
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation" required
                                            autocomplete="new-password" placeholder="Confirm Password">
                                    </fieldset>
                                    <button type="submit" class="btn btn-sign" value="Register"
                                        name="register">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end main products area-->
                </div>
            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </main>
</x-guest-layout>
